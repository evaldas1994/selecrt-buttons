<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-17
 */

if (!function_exists('newrecord')) {
    function newrecord()
    {
        return collect(\Illuminate\Support\Facades\DB::select('select newrecord() as nv'))->first()->nv;
    }
}
