@extends('layouts.app')

@section('content')
{{--    <a href="{{ route('prices.create', [$stock, 'P']) }}" class="btn btn-primary float-end m-1"><i class="fas fa-plus"></i> @lang('modules/price.btn_purch')</a>--}}
{{--    <a href="{{ route('prices.createByStockAndType', [$stock, 'P']) }}" class="btn btn-primary float-end m-1"><i class="fas fa-plus"></i> @lang('modules/price.btn_purch')</a>--}}
{{--    <a href="{{ route('prices.createByStockAndType', [$stock, 'S']) }}" class="btn btn-primary float-end m-1"><i class="fas fa-plus"></i> @lang('modules/price.btn_sale')</a>--}}
    <div class="mb-3">
        <h1>@lang('modules/stock.h1')</h1>
    </div>
@endsection

