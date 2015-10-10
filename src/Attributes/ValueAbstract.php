<?php

namespace TurmericSpice\Attributes;

abstract class ValueAbstract
{
    protected $key;
    protected $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @param callable|null $validate
     * @return string
     */
    abstract public function asString(callable $validate = null);

    /**
     * @param callable|null $validate
     * @return int
     */
    abstract public function asInteger(callable $validate = null);

    /**
     * @param callable|null $validate
     * @return float
     */
    abstract public function asFloat(callable $validate = null);

    /**
     * @param callable|null $validate
     * @return bool
     */
    abstract public function asBoolean(callable $validate = null);

    /**
     * @param callable|null $validate
     * @return array
     */
    abstract public function asArray(callable $validate = null);

    /**
     * @param string $className
     * @param callable|null $validate
     * @return mixed
     */
    abstract public function asInstance($className, callable $validate = null);
}
