<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-10-12
 */


if (!function_exists('selected')) {
    function selected($field, $value, $value2=null)
    {
        if (old($field)!== null) {
            if ($value == old($field)) {
                return 'selected';
            }
        } else {
            if ($value == $value2) {
                return 'selected';
            }
        }

        return '';
    }
}
