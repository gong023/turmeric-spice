<?php

namespace TurmericSpice;

use AssertChain\AssertChain;
use TurmericSpice\Example\ObjectWithOptionalValues;

class OptionalCastedTest extends \PHPUnit_Framework_TestCase
{
    use AssertChain;

    public function testCastedWithUndefined()
    {
        $optional = new ObjectWithOptionalValues([]);

        $this->assert()
            ->same(0, $optional->getOne())
            ->same(0.0, $optional->getPointOne())
            ->same('', $optional->getString())
            ->same([], $optional->getArray())
            ->false($optional->getTrue());
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
            ->false($optional->getTrue());
    }

    public function emptyValueProvider()
    {
        return [
            [0], [''], [null], [false]
        ];
    }
}
