<?php

namespace TurmericSpice;

use TurmericSpice\Container\InvalidAttributeException;
use TurmericSpice\Example\ObjectWithSetter;

class PlainSetterTest extends \PHPUnit_Framework_TestCase
{
    public function testSetOptionalValue()
    {
        $objectWithSetter = new ObjectWithSetter(['name' => null]);
        $objectWithSetter->setName('John');

        $this->assertSame('John', $objectWithSetter->getName());
    }

    public function testSetRequiredValue()
    {
        $objectWithSetter = new ObjectWithSetter(['id' => null]);

        try {
            $objectWithSetter->getId();
            $this->fail('expected exception is not raised');
        } catch (InvalidAttributeException $e) {
            $this->assertTrue(true, 'exception raises correctly');
        }

        $objectWithSetter->setId(1);
        $this->assertSame(1, $objectWithSetter->getId());
    }
}
