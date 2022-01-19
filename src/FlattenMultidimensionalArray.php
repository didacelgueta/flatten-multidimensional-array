<?php

namespace Didacelgueta;

class FlattenMultidimensionalArray
{
    /**
     * Returns one dimensional array given a multidimensional array
     * All the keys will be nested with the separator specified
     *
     * @param array $arg
     * @param string $key_sep
     * @param string $key_input
     *
     * @return array
     */

    public static function array_flatten($arg, $key_sep = '.', $key_input = '')
    {
        $result = array();

        foreach ($arg as $key => $value) {
            if ($key_input != '') {
                $key_custom = $key_input . $key_sep . $key;
            } else {
                $key_custom = $key;
            }

            if (is_array($value) && count($value) > 0) {
                $result = array_merge($result, self::array_flatten($value, $key_sep, $key_custom));
            } else {
                array_push($result, array($key_custom => $value));
            }
        }

        return $result;
    }
}
