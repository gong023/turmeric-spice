<?php

namespace TurmericSpice;

use TurmericSpice\Attributes\InvalidAttributeException;
use TurmericSpice\Attributes\Optional;
use TurmericSpice\Attributes\Required;

class Attributes
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
        if (empty($this->attributes[$key])) {
            return new Optional($key, null);
        }

        return new Optional($key, $this->attributes[$key]);
    }

    public function mustHave($key)
    {
        if (empty($this->attributes[$key])) {
            throw new InvalidAttributeException("$key is not set.");
        }

        return new Required($key, $this->attributes[$key]);
    }

    public function getRaw()
    {
        return $this->attributes;
    }
}
