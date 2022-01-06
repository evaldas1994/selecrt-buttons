<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\ProductionCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\ProductionCardComponent;
use App\Http\Requests\ProductionCardStoreUpdateRequest;

class ProductionCardController extends Controller
{
    protected $gridFormName = 'productionCard.index';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $grid = new \App\Helpers\Classes\Grid($this->gridFormName);

        $productionCards = ProductionCard::sortable($grid->getSortableDefaultColumn())->simplePaginate();
        $gridColumns = $grid->getGridColumns('App\Models\ProductionCard');

        return view('modules.productionCard.index', compact('productionCards', 'gridColumns'))->withForm($this->gridFormName);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stocks = Stock::all();

        return view('modules.productionCard.create', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductionCardStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ProductionCardStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $data = $request->validated();

        $productionCard = ProductionCard::create($data);

        return $this->checkButtonAction($request, $productionCard, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductionCard $productionCard
     * @return View
     */
    public function edit(ProductionCard $productionCard)
    {
        $stocks = Stock::all();

        $productionCardComponents = $productionCard->components;

        $types = ProductionCardComponent::$types;

        return view(
            'modules.productionCard.edit',
            compact('productionCard', 'stocks', 'productionCardComponents', 'types')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductionCardStoreUpdateRequest $request
     * @param ProductionCard $productionCard
     * @return RedirectResponse
     */
    public function update(ProductionCardStoreUpdateRequest $request, ProductionCard $productionCard)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $productionCard);
        }

        try {
            $productionCard->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('production-cards.index')->withError(trans('global.update_failed'));
        }
        return $this->checkButtonAction($request, $productionCard, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductionCard $productionCard
     * @return RedirectResponse
     */
    public function destroy(ProductionCard $productionCard)
    {
        try {
            $productionCard->delete();

            return redirect()->route('production-cards.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('production-cards.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(
        ProductionCardStoreUpdateRequest $request,
        ProductionCard $productionCard,
        string $message = 'global.empty'
    ) {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'production-card-component-create':
                return redirect()->route('production-cards.edit', $productionCard);
        }

        return redirect()->route('production-cards.index')->withSuccess(trans($message));
    }

    /**
     * @param ProductionCardStoreUpdateRequest $request
     * @param ProductionCard|null $productionCard
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(
        ProductionCardStoreUpdateRequest $request,
        ProductionCard $productionCard = null,
        string $message = 'global.empty'
    ): RedirectResponse {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));

        switch (Arr::first($actionWithoutValidation)) {
            case 'close':
                return redirect()->route('production-cards.index');

            case 'select-stock':
                $data = $this->getQueueOfActionsSessionData($this->getPrevRoute(), $request->input(), 'stocks.index', [], 'f_stockid');

                // push session
                session()->push('queue_of_actions', $data);

                // redirect
                return redirect()->route(Arr::get($data,'route-next.route'), Arr::get($data,'route-next.data'));
        }

        return redirect()->route('production-cards.index')->withSuccess(trans($message));
    }

    private function getPrevRoute(): string
    {
        return app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
    }

    private function getQueueOfActionsSessionData($prevRoute, $prevData, $nextRoute, $nextData, $field): array
    {
        $data = Arr::add([], 'route-prev.route', $prevRoute);
        $data = Arr::add($data, 'route-prev.data', $prevData);
        $data = Arr::add($data, 'route-next.route', $nextRoute);
        $data = Arr::add($data, 'route-next.data', $nextData);
        $data = Arr::add($data, 'route-prev.target_field', $field);

        return $data;
    }
}
