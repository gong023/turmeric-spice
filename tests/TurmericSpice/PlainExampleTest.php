<?php

namespace TurmericSpice;

use TurmericSpice\Example\Plain;

/**
 * @property Plain plain
 */
class PlainExampleTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->plain = new Plain([
            'one'            => 1,
            'two'            => 2,
            'point_one'      => 0.1,
            'point_two'      => 0.2,
            'string_or_null' => 'string_or_null',
            'string'         => 'string',
            'true'           => true,
            'false'          => false,
            'array_or_null'  => [],
            'array'          => []
        ]);
    }

    public function testProperties()
    {
        $this->assertSame(1, $this->plain->getOne());
        $this->assertSame(2, $this->plain->getTwo());
        $this->assertSame(0.1, $this->plain->getPointOne());
        $this->assertSame(0.2, $this->plain->getPointTwo());
        $this->assertSame('string_or_null', $this->plain->getStringOrNull());
        $this->assertSame('string', $this->plain->getString());
        $this->assertTrue($this->plain->getTrue());
        $this->assertFalse($this->plain->getFalse());
        $this->assertSame([], $this->plain->getArrayOrNull());
        $this->assertSame([], $this->plain->getArray());

        return $this->plain;
    }

    /**
     * @depends testProperties
     * @param Plain $plain
     */
    public function testPropertyNameCache($plain)
    {
        $this->assertSame(1, $plain->getOne());
        $this->assertSame(2, $plain->getTwo());
        $this->assertSame(0.1, $plain->getPointOne());
        $this->assertSame(0.2, $plain->getPointTwo());
        $this->assertSame('string_or_null', $plain->getStringOrNull());
        $this->assertSame('string', $plain->getString());
        $this->assertTrue($plain->getTrue());
        $this->assertFalse($plain->getFalse());
        $this->assertSame([], $plain->getArrayOrNull());
        $this->assertSame([], $plain->getArray());
    }
}
