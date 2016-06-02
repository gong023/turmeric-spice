<?php

namespace TurmericSpice;

use TurmericSpice\Example\ObjectWithValidation;

/**
 * @property ObjectWithValidation objectWithValidation
 */
class ValidationTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->objectWithValidation = new ObjectWithValidation([
            'one'          => 10,
            'point_one'    => 10.0,
            'name'         => 'Taro',
            'fruits_names' => ['red', 'green', 'yellow'],
            'flag'         => 'true',
            'datetime'     => new \DateTime('2015-01-01 00:00:00'),
            'datetime_arr' => [new \DateTime('2015-01-01 00:00:00')],
        ]);
    }

    public function testOneOrZero()
    {
        $this->assertSame(0, $this->objectWithValidation->getOneOrZero());
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetOneOrThrow()
    {
        $this->objectWithValidation->getOneOrThrow();
    }

    public function testPointOneOrZero()
    {
        $this->assertSame(0.0, $this->objectWithValidation->getPointOneOrZero());
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetPointOneOrThrow()
    {
        $this->objectWithValidation->getPointOneOrThrow();
    }

    public function testGetNameJohnOrEmptyString()
    {
        $this->assertSame('', $this->objectWithValidation->getNameJohnOrEmptyString());
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetNameJohnOrThrow()
    {
        $this->objectWithValidation->getNameJohnOrThrow();
    }

    public function testGetFruitsNamesOrEmptyArray()
    {
        $this->assertSame([], $this->objectWithValidation->getFruitsNamesOrEmptyArray());
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetFruitsNamesOrThrow()
    {
        $this->assertSame([], $this->objectWithValidation->getFruitsNamesOrThrow());
    }

    public function testIsFlagStrictlyTrueOrReturnsFalse()
    {
        $this->assertFalse($this->objectWithValidation->isFlagStrictlyTrueOrReturnsFalse());
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testIsFlagStrictlyTrueOrThrow()
    {
        $this->objectWithValidation->isFlagStrictlyTrueOrThrow();
    }

    public function testGetDateTime2014Null()
    {
        $this->assertNull($this->objectWithValidation->getDateTime2014OrNull());
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetDateTimeThrow()
    {
        $this->objectWithValidation->getDateTime2014OrThrow();
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetDateTimeArrayThrow()
    {
        $this->objectWithValidation->getDateTime2014ArrayOrThrow();
    }
}
