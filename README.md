# Flatten multidimensional array

Convert multidimensional array to unidimensional array concatenating the keys

## Install

Via [composer](http://getcomposer.org):

```shell
composer require rogervila/array-diff-multidimensional
```

## Usage
```php
use Didacelgueta\FlattenMultidimensionalArray;

$two_dimansional_array = array(
    'a' => 1,
    'b' => array('c' => 2, 'd' => 3)
);

// Reduce the dimensionality by calling 'array_flatten' class method
$result = FlattenMultidimensionalArray::array_flatten($two_dimansional_array)

var_dump($result);
```

The result will return a new array with just one dimension:
```php
[
	'a' => 1,
    'b_c' => 2,
    'b_d' => 3
]
```

## License

Flatten Multidimensional Array is an open-sourced package licensed under the [MIT license](http://opensource.org/licenses/MIT).
