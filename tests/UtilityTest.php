<?php

namespace TurmericSpice;

use TurmericSpice\Example\ObjectUsingUtility;

/**
 * @property ObjectUsingUtility object_using_utility
 */
class UtilityTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->object_using_utility = new ObjectUsingUtility([
            'created' => '2015-01-01 00:00:00',
        ]);
    }

    public function testCreatedCastedToDatetime()
    {
        $created = $this->object_using_utility->getCreated();
        $this->assertInstanceOf('\\Datetime', $created);
        $this->assertSame('2015-01-01', $created->format('Y-m-d'));
    }

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testGetCreatedThrows()
    {
        // raw created is only string. so exception occurs.
        $this->object_using_utility->getCreatedDatetimeOrThrow();
    }

    public function testGetRaw()
    {
        $expected = [
            'created' => '2015-01-01 00:00:00',
        ];

        $this->assertSame($expected, $this->object_using_utility->getRaw());
    }

    public function testToArray()
    {
        $expected = [
            'created' => new \DateTime('2015-01-01 00:00:00'),
        ];

        $this->assertEquals($expected, $this->object_using_utility->toArray());
    }
}
