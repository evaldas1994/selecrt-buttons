<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-17
 */

if (!function_exists('newrecord')) {
    function newrecord()
    {
        return collect(\Illuminate\Support\Facades\DB::select('select newrecord() as value'))->first()->value;
    }
}
if (!function_exists('counter')) {
    function counter($counterId)
    {
        return collect(
            \Illuminate\Support\Facades\DB::select('select counter(?) as value', [$counterId])
        )->first()->value;
    }
}
