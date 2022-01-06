<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
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
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('production-cards.index');

            case 'select-stock':
                dd('route to stocks.index', $actionWithoutValidation[1]);

            case 'production-card-component-edit':
                $componentId = $actionWithoutValidation[1];
                return redirect()->route('production-card-components.edit', [$productionCard, $componentId]);
        }

        return redirect()->route('production-cards.index')->withSuccess(trans($message));
    }
}
