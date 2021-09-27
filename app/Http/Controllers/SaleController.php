<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockhStoreRequest;
use App\Models\Sales;
use App\Models\Stockh;
use App\Repositories\Interfaces\StockhRepositoryInterface;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $stockhRepository;

    public function __construct(StockhRepositoryInterface $stockhRepository)
    {
        $this->stockhRepository = $stockhRepository;
    }

    public function index()
    {
        $sales = Stockh::sales()->with(['stockd'])->select('f_docno', 'f_id')->paginate(25);
        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
        $this->stockhRepository->create($request->input());
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
