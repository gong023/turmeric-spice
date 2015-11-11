<?php

namespace TurmericSpice;

/**
 * @method int mayHaveAsInt(callable $validate = null)
 * @method string mayHaveAsString(callable $validate = null)
 * @method float mayHaveAsFloat(callable $validate = null)
 * @method bool mayHaveAsBoolean(callable $validate = null)
 * @method array mayHaveAsArray(callable $validate = null)
 * @method int mustHaveAsInt(callable $validate = null)
 * @method string mustHaveAsString(callable $validate = null)
 * @method float mustHaveAsFloat(callable $validate = null)
 * @method bool mustHaveAsBoolean(callable $validate = null)
 * @method array mustHaveAsArray(callable $validate = null)
 */
trait ReadWriteAttributes
{
    use ReadableAttributes;

    /**
     * @param mixed $value
     * @return $this
     */
    private function setValue($value)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->calledPropertyName();
        }

        $this->attributes->set($propertyName, $value);

        return $this;
    }
}
