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
    private $optionalValue;
    private $requiredValue;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        $this->optionalValue = new OptionalValue();
        $this->requiredValue = new RequiredValue();
    }

    public function mayHave($key)
    {
        $this->optionalValue->key = $key;
        if (! isset($this->attributes[$key])) {
            $this->optionalValue->value = null;

            return $this->optionalValue;
        }
        $this->optionalValue->value = $this->attributes[$key];

        return $this->optionalValue;
    }

    public function mustHave($key)
    {
        if (! isset($this->attributes[$key])) {
            throw new InvalidAttributeException("$key is not set.");
        }
        $this->requiredValue->key = $key;
        $this->requiredValue->value = $this->attributes[$key];

        return $this->requiredValue;
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
