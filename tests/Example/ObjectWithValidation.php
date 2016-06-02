<?php

namespace TurmericSpice\Example;

use TurmericSpice\ReadableAttributes;

class ObjectWithValidation
{
    use ReadableAttributes;

    public function getOneOrZero()
    {
        return $this->attributes->mayHave('one')->asInteger(function ($value) {
            return $value === 1;
        });
    }

    public function getOneOrThrow()
    {
        $this->attributes->mustHave('one')->asInteger(function ($value) {
            return $value === 1;
        });
    }

    public function getPointOneOrZero()
    {
        return $this->attributes->mayHave('point_one')->asFloat(function ($value) {
            return $value === 0.1;
        });
    }

    public function getPointOneOrThrow()
    {
        return $this->attributes->mustHave('point_one')->asFloat(function ($value) {
            return $value === 0.1;
        });
    }

    public function getNameJohnOrEmptyString()
    {
        return $this->attributes->mayHave('name')->asString(function ($value) {
            return $value === 'John';
        });
    }

    public function getNameJohnOrThrow()
    {
        return $this->attributes->mustHave('name')->asString(function ($value) {
            return $value === 'John';
        });
    }

    public function getFruitsNamesOrEmptyArray()
    {
        return $this->attributes->mayHave('fruits_names')->asArray(function ($value) {
            foreach (array_values($value) as $fruits_name) {
                if (! in_array($fruits_name, ['apple', 'muscat', 'banana'])) {
                    return false;
                }
            }
            return true;
        });
    }

    public function getFruitsNamesOrThrow()
    {
        return $this->attributes->mustHave('fruits_names')->asArray(function ($value) {
            foreach (array_values($value) as $fruits_name) {
                if (! in_array($fruits_name, ['apple', 'muscat', 'banana'])) {
                    return false;
                }
            }
            return true;
        });
    }

    public function isFlagStrictlyTrueOrReturnsFalse()
    {
        return $this->attributes->mayHave('flag')->asBoolean(function ($value) {
            return $value === true;
        });
    }

    public function isFlagStrictlyTrueOrThrow()
    {
        return $this->attributes->mustHave('flag')->asBoolean(function ($value) {
            return $value === true;
        });
    }

    public function getDateTime2014OrNull()
    {
        return $this->attributes->mayHave('datetime')->asInstanceOf('\\Datetime', function ($value) {
            return $value === new \DateTime('2014-01-01 00:00:00');
        });
    }

    public function getDateTime2014OrThrow()
    {
        return $this->attributes->mustHave('datetime')->asInstanceOf('\\Datetime', function ($value) {
            return $value === new \DateTime('2014-01-01 00:00:00');
        });
    }

    public function getDateTime2014ArrayOrThrow()
    {
        return $this->attributes->mustHave('datetime_arr')->asInstanceArray('\\Datetime', function ($value) {
            return $value === new \DateTime('2014-01-01 00:00:00');
        });
    }
}
