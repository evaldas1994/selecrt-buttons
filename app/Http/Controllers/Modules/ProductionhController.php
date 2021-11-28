<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\Template;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\Productionh;
use App\Models\ProductionGroup;
use App\Models\StockOperationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductionhStoreUpdateRequest;

class ProductionhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $allProductionsh = Productionh::simplePaginate();

        return view('modules.productionh.index', compact('allProductionsh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $productionGroups = ProductionGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $todayDate = Carbon::today();

        return view('modules.productionh.create', compact('stores', 'templates', 'productionGroups', 'stockOperationGroups', 'todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductionhStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ProductionhStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        try {
            $data = $request->validated();
            $data = Arr::add($data, 'f_docno', counter('Y'));

            $productionsh = Productionh::create($data);

        } catch (\Exception) {
            return redirect()->route('productionsh.index');
        }

        return $this->checkButtonAction($request, $productionsh, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Productionh $productionsh
     * @return View
     */
    public function edit(Productionh $productionsh)
    {
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $productionGroups = ProductionGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.productionh.edit', compact('productionsh', 'stores', 'templates', 'productionGroups', 'stockOperationGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductionhStoreUpdateRequest $request
     * @param Productionh $productionsh
     * @return RedirectResponse
     */
    public function update(ProductionhStoreUpdateRequest $request, Productionh $productionsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $productionsh);
        }

        try {
            $productionsh->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('productionsh.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $productionsh, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Productionh $productionsh
     * @return RedirectResponse
     */
    public function destroy(Productionh $productionsh)
    {
        try {
            $productionsh->delete();

            return redirect()->route('productionsh.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('productionsh.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(ProductionhStoreUpdateRequest $request, Productionh $productionsh = null, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'productiond-create':
                return redirect()->route('productionsd.create', $productionsh);
        }

        return redirect()->route('productionsh.index')->withSuccess(trans($message));
    }

    /**
     * @param ProductionhStoreUpdateRequest $request
     * @param Productionh|null $productionsh
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(ProductionhStoreUpdateRequest $request, Productionh $productionsh = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('productionsh.index');

            case 'select-production-group':
                dd('route to production group.index', $actionWithoutValidation[1]);

            case 'select-template-1':
                dd('route to template.index', $actionWithoutValidation[1]);

            case 'select-template-2':
                dd('route to template.index', $actionWithoutValidation[1]);

            case 'select-stock-operation-group-1':
                dd('route to stock operation group.index', $actionWithoutValidation[1]);

            case 'select-stock-operation-group-2':
                dd('route to stock operation group.index', $actionWithoutValidation[1]);

            case 'select-store':
                dd('route to store.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('productionsh.index')->withSuccess(trans($message));
    }
}
