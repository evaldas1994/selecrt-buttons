<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-10-12
 */


if (!function_exists('selected')) {
    function selected($field, $value)
    {
        return ($value == old($field)) ? 'selected' : '';
    }
}
