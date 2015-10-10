<?php

namespace TurmericSpice;

use TurmericSpice\Example\Plain;

class PlainExampleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Plain
     */
    private $example;

    public function setUp()
    {
        $this->example = new Plain([
            'one' => 1,
            'two' => 2,
        ]);
    }

    public function testFirst()
    {
        $this->assertSame(1, $this->example->getOne());
        $this->assertSame(2, $this->example->getTwo());
    }
}
