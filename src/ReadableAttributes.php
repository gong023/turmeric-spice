<?php

namespace TurmericSpice;

trait ReadableAttributes
{
    public function __construct(array $attributes)
    {
        $this->attributes = new Container($attributes);
    }

    private function mustHaveAsInt(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mustHave($propertyName)->asInteger($validate);
    }

    private function mustHaveAsString(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mustHave($propertyName)->asString($validate);
    }

    private function mustHaveAsFloat(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mustHave($propertyName)->asFloat($validate);
    }

    private function mustHaveAsBoolean(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mustHave($propertyName)->asBoolean($validate);
    }

    private function mustHaveAsArray(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mustHave($propertyName)->asArray($validate);
    }

    private function mayHaveAsInt(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mayHave($propertyName)->asInteger($validate);
    }

    private function mayHaveAsString(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mayHave($propertyName)->asString($validate);
    }

    private function mayHaveAsFloat(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mayHave($propertyName)->asFloat($validate);
    }

    private function mayHaveAsBoolean(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mayHave($propertyName)->asBoolean($validate);
    }

    private function mayHaveAsArray(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mayHave($propertyName)->asArray($validate);
    }

    public function toArray()
    {
        $array = [];
        foreach (array_keys($this->attributes->getRaw()) as $keyName) {
            $getterFuncName = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $keyName)));
            if (is_callable([$this, $getterFuncName])) {
                $array[$keyName] = call_user_func([$this, $getterFuncName]);
            }
        }

        return $array;
    }

    /*
     * @return string
     */
    public function getCalledPropertyName()
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];

        return strtolower(preg_replace(
            '/[A-Z0-9]/',
            '_$0',
            lcfirst(preg_replace('/^(get|set)/', '', $backtrace))
        ));
    }
}
