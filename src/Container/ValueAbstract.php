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
     * @return string[]
     */
    public function asStringArray()
    {
        return $this->castRecursively($this->asArray(), 'asString');
    }

    /**
     * @return int[]
     */
    public function asIntegerArray()
    {
        return $this->castRecursively($this->asArray(), 'asInteger');
    }

    /**
     * @return float[]
     */
    public function asFloatArray()
    {
        return $this->castRecursively($this->asArray(), 'asFloat');
    }

    /**
     * @return bool[]
     */
    public function asBooleanArray()
    {
        return $this->castRecursively($this->asArray(), 'asBoolean');
    }

    /**
     * @param $className
     * @return mixed[]
     */
    public function asInstanceArray($className)
    {
        return $this->castRecursively($this->asArray(), 'asInstanceOf', [$className]);
    }

    private function castRecursively($arr, $castedType, $arg = [])
    {
        return array_map(function ($val) use ($castedType, $arg) {
            if (is_array($val)) {
                return $this->castRecursively($val, $castedType, $arg);
            }
            return call_user_func([(new static($this->key, $val)), $castedType], $arg);
        }, $arr);
    }
}
