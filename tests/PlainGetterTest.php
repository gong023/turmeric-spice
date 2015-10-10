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
            'one'       => 1,
            'point_one' => 0.1,
            'string'    => 'string',
            'true'      => true,
            'array'     => [],
        ]);

        $this->assert()
            ->same(1, $optional->getOne())
            ->same(0.1, $optional->getPointOne())
            ->same('string', $optional->getString())
            ->true($optional->getTrue())
            ->same([], $optional->getArray());

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
            ->same([], $optional->getArray());
    }

    public function testGetRequiredValues()
    {
        $required = new ObjectWithRequiredValues([
            'one'       => 1,
            'point_one' => 0.1,
            'string'    => 'string',
            'true'      => true,
            'array'     => [],
        ]);

        $this->assert()
            ->same(1, $required->getOne())
            ->same(0.1, $required->getPointOne())
            ->same('string', $required->getString())
            ->true($required->getTrue())
            ->same([], $required->getArray());

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
            ->same([], $required->getArray());
    }
}
