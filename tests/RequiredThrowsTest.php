<?php

namespace TurmericSpice;

use TurmericSpice\Example\ObjectWithRequiredValues;

class RequiredThrowsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetOneThrowsWithUndefined()
    {
        $required = new ObjectWithRequiredValues([]);
        $required->getOne();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetOneThrowsWithNull()
    {
        $required = new ObjectWithRequiredValues(['One' => null]);
        $required->getOne();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetPointOneThrowsWithUndefined()
    {
        $required = new ObjectWithRequiredValues([]);
        $required->getPointOne();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetPointOneThrowsWithNull()
    {
        $required = new ObjectWithRequiredValues(['point_one' => null]);
        $required->getPointOne();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetTrueThrowsWithUndefined()
    {
        $required = new ObjectWithRequiredValues([]);
        $required->getTrue();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetTrueThrowsWithNull()
    {
        $required = new ObjectWithRequiredValues(['true' => null]);
        $required->getTrue();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetStringThrowsWithUndefined()
    {
        $required = new ObjectWithRequiredValues([]);
        $required->getString();
    }

    /**
     * @dataProvider emptyValueProvider
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     * @param $emptyValue
     */
    public function testGetStringThrowsWithEmptyValues($emptyValue)
    {
        $required = new ObjectWithRequiredValues(['string' => $emptyValue]);
        $required->getString();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetArrayThrowsWithUndefined()
    {
        $required = new ObjectWithRequiredValues([]);
        $required->getArray();
    }

    /**
     * @dataProvider emptyValueProvider
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     * @param $emptyValue
     */
    public function testArrayThrowsWithEmptyValues($emptyValue)
    {
        $required = new ObjectWithRequiredValues(['array' => $emptyValue]);
        $required->getArray();
    }

    public function emptyValueProvider()
    {
        return [
            [0], [''], [null], [false]
        ];
    }
}
