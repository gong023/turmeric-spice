<?php

namespace TurmericSpice\Container;

class RequiredValue extends ValueAbstract
{
    /**
     * @param callable|null $validate
     * @return string
     * @throws InvalidAttributeException
     */
    public function asString(callable $validate = null)
    {
        if (empty($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
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
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
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
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
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
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        return (bool)$this->value;
    }

    /**
     * @param string $className
     * @param callable|null $validate
     * @return mixed
     * @throws InvalidAttributeException
     */
    public function asInstanceOf($className, callable $validate = null)
    {
        if (! $this->value instanceof $className) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
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
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        if ($validate !== null && ! $validate($this->value)) {
            throw new InvalidAttributeException($this->key . ' is invalid:' . var_export($this->value, true));
        }

        return $this->value;
    }
}
