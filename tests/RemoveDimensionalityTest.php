<?php

namespace Didacelgueta\Test;

use PHPUnit\Framework\TestCase;
use Didacelgueta\FlattenMultidimensionalArray;

class RemoveDimensionalityTest extends TestCase
{
    public function test_reduce_two_dimensional_array_into_one_dimension()
    {
        $two_dimansional_array = array(
            'a' => 1,
            'b' => array('c' => 2, 'd' => 3)
        );

        $multidim_to_unidim = new FlattenMultidimensionalArray();

        $one_dimansion_array = $multidim_to_unidim::array_flatten($two_dimansional_array);

        $this->assertEquals(count($two_dimansional_array), 2);
        $this->assertEquals(count($one_dimansion_array), 3);
    }

    public function test_reduce_three_dimensional_array_into_one_dimension()
    {
        $three_dimansional_array = array(
            'a' => 1,
            'b' => array(
                'c' => 2,
                'd' => array('e' => 3, 'f' => 4)
            )
        );

        $multidim_to_unidim = new FlattenMultidimensionalArray();

        $one_dimansion_array = $multidim_to_unidim::array_flatten($three_dimansional_array);

        $this->assertEquals(count($three_dimansional_array), 2);
        $this->assertEquals(count($one_dimansion_array), 4);
    }
}
