<?php

namespace TurmericSpice;

use AssertChain\AssertChain;
use TurmericSpice\Example\ObjectWithOptionalValues;
use TurmericSpice\Example\ObjectWithRequiredValues;

class PlainGetterTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    public function testGetOptionalValues()
    {
        $optional = new ObjectWithOptionalValues([
            'one'             => 1,
            'point_one'       => 0.1,
            'string'          => 'string',
            'true'            => true,
            'array'           => [],
            'one_array'       => [1, 2, 3],
            'point_one_array' => [0.1, 0.2, 0.3],
            'string_array'    => ['a', 'b', 'c'],
            'true_array'      => [true, true, true]
        ]);

        $this->assert()
            ->same(1, $optional->getOne())
            ->same(0.1, $optional->getPointOne())
            ->same('string', $optional->getString())
            ->true($optional->getTrue())
            ->same([], $optional->getArray())
            ->same([1, 2, 3], $optional->getOneArray())
            ->same([0.1, 0.2, 0.3], $optional->getPointOneArray())
            ->same(['a', 'b', 'c'], $optional->getStringArray())
            ->same([true, true, true], $optional->getTrueArray());

        return $optional;
    }

    /**
     * @depends testGetOptionalValues
     * @param ObjectWithOptionalValues $optional
     */
    public function testOptionalValuesPropertyNameCache($optional)
    {
        $this->assert()
            ->same(1, $optional->getOne())
            ->same(0.1, $optional->getPointOne())
            ->same('string', $optional->getString())
            ->true($optional->getTrue())
            ->same([], $optional->getArray())
            ->same([1, 2, 3], $optional->getOneArray())
            ->same([0.1, 0.2, 0.3], $optional->getPointOneArray())
            ->same(['a', 'b', 'c'], $optional->getStringArray())
            ->same([true, true, true], $optional->getTrueArray());
    }

    public function testGetRequiredValues()
    {
        $required = new ObjectWithRequiredValues([
            'one'             => 1,
            'point_one'       => 0.1,
            'string'          => 'string',
            'true'            => true,
            'array'           => [],
            'one_array'       => [1, 2, 3],
            'point_one_array' => [0.1, 0.2, 0.3],
            'string_array'    => ['a', 'b', 'c'],
            'true_array'      => [true, true, true]
        ]);

        $this->assert()
            ->same(1, $required->getOne())
            ->same(0.1, $required->getPointOne())
            ->same('string', $required->getString())
            ->true($required->getTrue())
            ->same([], $required->getArray())
            ->same([1, 2, 3], $required->getOneArray())
            ->same([0.1, 0.2, 0.3], $required->getPointOneArray())
            ->same(['a', 'b', 'c'], $required->getStringArray())
            ->same([true, true, true], $required->getTrueArray());

        return $required;
    }

    /**
     * @depends testGetRequiredValues
     * @param ObjectWithRequiredValues $required
     */
    public function testRequiredValuesPropertyNameCache($required)
    {
        $this->assert()
            ->same(1, $required->getOne())
            ->same(0.1, $required->getPointOne())
            ->same('string', $required->getString())
            ->true($required->getTrue())
            ->same([], $required->getArray())
            ->same([1, 2, 3], $required->getOneArray())
            ->same([0.1, 0.2, 0.3], $required->getPointOneArray())
            ->same(['a', 'b', 'c'], $required->getStringArray())
            ->same([true, true, true], $required->getTrueArray());
    }
}
