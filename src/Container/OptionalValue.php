<?php

namespace TurmericSpice\Container;

class OptionalValue extends ValueAbstract
{
    /**
     * @param callable|null $validate
     * @return string
     */
    public function asString(callable $validate = null)
    {
        if (empty($this->value)) {
            return '';
        }

        if ($validate !== null && ! $validate($this->value)) {
            return '';
        }

        return (string)$this->value;
    }

    /**
     * @param callable|null $validate
     * @return int
     */
    public function asInteger(callable $validate = null)
    {
        if (empty($this->value)) {
            return 0;
        }

        if ($validate !== null && ! $validate($this->value)) {
            return 0;
        }

        return (int)$this->value;
    }

    /**
     * @param callable|null $validate
     * @return float
     */
    public function asFloat(callable $validate = null)
    {
        if (empty($this->value)) {
            return 0.0;
        }

        if ($validate !== null && ! $validate($this->value)) {
            return 0.0;
        }

        return (float)$this->value;
    }

    /**
     * @param callable|null $validate
     * @return bool
     */
    public function asBoolean(callable $validate = null)
    {
        if ($this->value === null) {
            return false;
        }

        if ($validate !== null && ! $validate($this->value)) {
            return false;
        }

        return (bool)$this->value;
    }

    /**
     * @param callable|null $validate
     * @return array
     */
    public function asArray(callable $validate = null)
    {
        if (! is_array($this->value)) {
            return [];
        }

        if ($validate !== null && ! $validate($this->value)) {
            return [];
        }

        return $this->value;
    }

    /**
     * If validation result is false, this function returns null.
     *
     * @param string $className
     * @param callable|null $validate
     * @return mixed|null
     */
    public function asInstanceOf($className, callable $validate = null)
    {
        if (! $this->value instanceof $className) {
            return new $className($this->value);
        }

        if ($validate !== null && ! $validate($this->value)) {
            return null;
        }

        return $this->value;
    }

    /**
     * Only OptionalValue value is allowed to return null
     *
     * @return mixed|null
     */
    public function value()
    {
        return $this->value;
    }
}
