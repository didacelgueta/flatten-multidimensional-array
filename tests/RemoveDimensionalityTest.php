<?php

namespace Didacelgueta\Test;

use PHPUnit\Framework\TestCase;
use Didacelgueta\FlattenMultidimensionalArray;

class RemoveDimensionalityTest extends TestCase
{
    public function test_set_one_dimensional_array_as_parameter()
    {
        $arg = array('a' => 1, 'b' => 2);

        $result = FlattenMultidimensionalArray::array_flatten($arg);

        $this->assertEquals($result, [['a' => 1], ['b' => 2]]);
    }

    public function test_reduce_two_dimensional_array_into_one_dimension()
    {
        $two_dimansional_array = array(
            'a' => 1,
            'b' => array('c' => 2, 'd' => 3)
        );

        $result = FlattenMultidimensionalArray::array_flatten($two_dimansional_array);

        $this->assertEquals(count($two_dimansional_array), 2);
        $this->assertEquals(count($result), 3);
        $this->assertEquals(
            $result,
            [
                ['a' => 1],
                ['b.c' => 2],
                ['b.d' => 3]
            ]
        );
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

        $result =  FlattenMultidimensionalArray::array_flatten($three_dimansional_array);

        $this->assertEquals(count($three_dimansional_array), 2);
        $this->assertEquals(count($result), 4);
        $this->assertEquals(
            $result,
            [
                ['a' => 1],
                ['b.c' => 2],
                ['b.d.e' => 3],
                ['b.d.f' => 4]
            ]
        );
    }

    public function test_invalid_first_parameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        FlattenMultidimensionalArray::array_flatten('bad_argument');
    }

    public function test_invalid_second_parameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        $arg = array('a' => 1, 'b' => 2);

        FlattenMultidimensionalArray::array_flatten($arg, 1);
    }

    public function test_invalid_third_parameter()
    {
        $this->expectException(\InvalidArgumentException::class);

        $arg = array('a' => 1, 'b' => 2);

        FlattenMultidimensionalArray::array_flatten($arg, '_', false);
    }

    public function test_key_separator()
    {
        $arg = array('a' => 1, 'b' => ['c' => 2, 'd' => 3]);

        $result = FlattenMultidimensionalArray::array_flatten($arg, '%');

        $this->assertEquals(
            $result,
            [
                ['a' => 1],
                ['b%c' => 2],
                ['b%d' => 3]
            ]
        );
    }
}
