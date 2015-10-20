<?php

namespace TurmericSpice\Example;

use TurmericSpice\ReadableAttributes;

/**
 * These functions are only helper.
 * You should not expect too much.
 */
class ObjectUsingUtility
{
    use ReadableAttributes;

    public function getCreated()
    {
        return $this->attributes->mayHave('created')->asInstanceOf('\\Datetime');
    }

    public function getCreatedDatetimeOrThrow()
    {
        return $this->attributes->mustHave('created')->asInstanceOf('\\Datetime');
    }

    public function getRaw()
    {
        return $this->attributes->getRaw();
    }
}
