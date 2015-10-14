<?php

namespace TurmericSpice;

use TurmericSpice\Container\InvalidAttributeException;
use TurmericSpice\Container\OptionalValue;
use TurmericSpice\Container\RequiredValue;

class Container
{
    /**
     * @var array
     */
    private $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function mayHave($key)
    {
        if (! isset($this->attributes[$key])) {
            return new OptionalValue($key, null);
        }

        return new OptionalValue($key, $this->attributes[$key]);
    }

    public function mustHave($key)
    {
        if (! isset($this->attributes[$key])) {
            throw new InvalidAttributeException("$key is not set.");
        }

        return new RequiredValue($key, $this->attributes[$key]);
    }

    public function mayHaveInstanceCollection($key, $className)
    {
        $collection = [];
        foreach ($this->mayHave($key)->asArray() as $value) {
            $collection[] = (new OptionalValue($key, $value))->asInstanceOf($className);
        }

        return $collection;
    }

    public function mustHaveInstanceCollection($key, $className)
    {
        $collection = [];
        foreach ($this->mustHave($key)->asArray() as $value) {
            $collection[] = (new RequiredValue($key, $value))->asInstanceOf($className);
        }

        return $collection;
    }

    public function set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    public function getRaw()
    {
        return $this->attributes;
    }
}
