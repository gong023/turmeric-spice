<?php

namespace TurmericSpice\Container;

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
    abstract public function asInstanceOf($className, callable $validate = null);

    /**
     * @param callable $validate
     * @return \string[]
     */
    public function asStringArray(callable $validate = null)
    {
        return $this->castArray($this->asArray(), 'asString', [$validate]);
    }

    /**
     * @param callable $validate
     * @return \int[]
     */
    public function asIntegerArray(callable $validate = null)
    {
        return $this->castArray($this->asArray(), 'asInteger', [$validate]);
    }

    /**
     * @param callable $validate
     * @return \float[]
     */
    public function asFloatArray(callable $validate = null)
    {
        return $this->castArray($this->asArray(), 'asFloat', [$validate]);
    }

    /**
     * @param callable $validate
     * @return \bool[]
     */
    public function asBooleanArray(callable $validate = null)
    {
        return $this->castArray($this->asArray(), 'asBoolean', [$validate]);
    }

    /**
     * @param $className
     * @param callable $validate
     * @return \mixed[]
     */
    public function asInstanceArray($className, callable $validate = null)
    {
        return $this->castArray($this->asArray(), 'asInstanceOf', [$className, $validate]);
    }

    private function castArray($rawArray, $castedType, $arg = [])
    {
        $castedArray = [];
        foreach ($rawArray as $rawValue) {
            $castedArray[] = call_user_func_array([(new static($this->key, $rawValue)), $castedType], $arg);
        }

        return $castedArray;
    }
}
