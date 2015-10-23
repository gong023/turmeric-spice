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
            'updated_histories' => [
                '2016-01-01 00:00:00',
                '2017-01-01 00:00:00',
                '2018-01-01 00:00:00',
            ]
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

    /**
     * @expectedException \TurmericSpice\Container\InvalidAttributeException
     */
    public function testUpdatedHistoriesThrows()
    {
        $this->object_using_utility->getUpdatedHistoriesOrThrow();
    }

    public function testGetRaw()
    {
        $expected = [
            'created' => '2015-01-01 00:00:00',
            'updated_histories' => [
                '2016-01-01 00:00:00',
                '2017-01-01 00:00:00',
                '2018-01-01 00:00:00',
            ]
        ];

        $this->assertSame($expected, $this->object_using_utility->getRaw());
    }

    public function testToArray()
    {
        $expected = [
            'created' => new \DateTime('2015-01-01 00:00:00'),
            'updated_histories' => [
                new \Datetime('2016-01-01 00:00:00'),
                new \Datetime('2017-01-01 00:00:00'),
                new \Datetime('2018-01-01 00:00:00'),
            ]
        ];

        $this->assertEquals($expected, $this->object_using_utility->toArray());
    }
}
