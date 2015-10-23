<?php

namespace TurmericSpice;

use AssertChain\AssertChain;
use TurmericSpice\Example\ObjectWithOptionalValues;

class OptionalCastedTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    public function testCasted()
    {
        $optional = new ObjectWithOptionalValues([
            'one'             => '1',
            'point_one'       => '0.1',
            'string'          => 1,
            'true'            => 'true',
            'array'           => false,
            'one_array'       => ['1', '2', '3'],
            'point_one_array' => ['0.1', '0.2', '0.3'],
            'string_array'    => [1, 2, 3],
            'true_array'      => ['true', 'true', 'true']
        ]);

        $this->assert()
            ->same(1, $optional->getOne())
            ->same(0.1, $optional->getPointOne())
            ->same('1', $optional->getString())
            ->true($optional->getTrue())
            ->same([], $optional->getArray())
            ->same([1, 2, 3], $optional->getOneArray())
            ->same([0.1, 0.2, 0.3], $optional->getPointOneArray())
            ->same(['1', '2', '3'], $optional->getStringArray())
            ->same([true, true, true], $optional->getTrueArray());
    }

    public function testCastedWithUndefined()
    {
        $optional = new ObjectWithOptionalValues([]);

        $this->assert()
            ->same(0, $optional->getOne())
            ->same(0.0, $optional->getPointOne())
            ->same('', $optional->getString())
            ->same([], $optional->getArray())
            ->same([], $optional->getArray())
            ->same([], $optional->getOneArray())
            ->same([], $optional->getPointOneArray())
            ->same([], $optional->getStringArray())
            ->same([], $optional->getTrueArray());
    }

    /**
     * @dataProvider emptyValueProvider
     * @param $emptyValue
     */
    public function testCastedWithEmptyValue($emptyValue)
    {
        $optional = new ObjectWithOptionalValues([
            'one'            => $emptyValue,
            'point_one'      => $emptyValue,
            'string_or_null' => $emptyValue,
            'array_or_null'  => $emptyValue,
            'true'           => $emptyValue,
        ]);

        $this->assert()
            ->same(0, $optional->getOne())
            ->same(0.0, $optional->getPointOne())
            ->same('', $optional->getString())
            ->same([], $optional->getArray())
            ->same([], $optional->getArray())
            ->same([], $optional->getOneArray())
            ->same([], $optional->getPointOneArray())
            ->same([], $optional->getStringArray())
            ->same([], $optional->getTrueArray());
    }

    public function emptyValueProvider()
    {
        return [
            [0], [''], [null], [false]
        ];
    }
}
