<?php

namespace TurmericSpice\Attributes;

class Required extends ValueAbstract
{
    /**
     * @param callable|null $validate
     * @return string
     * @throws InvalidAttributeException
     */
    public function asString(callable $validate = null)
    {
        if (empty($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        return (string)$this->value;
    }

    /**
     * @param callable|null $validate
     * @return int
     * @throws InvalidAttributeException
     */
    public function asInteger(callable $validate = null)
    {
        if ($this->value === null) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        return (int)$this->value;
    }

    /**
     * @param callable|null $validate
     * @return float
     * @throws InvalidAttributeException
     */
    public function asFloat(callable $validate = null)
    {
        if ($this->value === null) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        return (float)$this->value;
    }

    /**
     * @param callable|null $validate
     * @return bool
     * @throws InvalidAttributeException
     */
    public function asBoolean(callable $validate = null)
    {
        if ($this->value === null) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        return (bool)$this->value;
    }

    /**
     * @param string $className
     * @param callable|null $validate
     * @return mixed
     * @throws InvalidAttributeException
     */
    public function asInstance($className, callable $validate = null)
    {
        if (! $this->value instanceof $className) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException(get_class($this->value));
        }

        return $this->value;
    }

    /**
     * @param callable|null $validate
     * @return array
     * @throws InvalidAttributeException
     */
    public function asArray(callable $validate = null)
    {
        if (! is_array($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . $this->value);
        }

        if ($validate !== null && ! $validate($this->value)) {
            // Exception class cannot take array at first argument.
            throw new InvalidAttributeException($this->value[0]);
        }

        return $this->value;
    }
}
