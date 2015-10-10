<?php

namespace TurmericSpice;

trait Getter
{
    public function __construct(array $attributes)
    {
        $this->attributes = new Attributes($attributes);
    }

    private function mustHaveAsInt(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mayHave($propertyName)->asInteger($validate);
    }

    private function mayHaveAsInt(callable $validate = null)
    {
        static $propertyName;
        if ($propertyName === null) {
            $propertyName = $this->getCalledPropertyName();
        }

        return $this->attributes->mustHave($propertyName)->asInteger($validate);
    }

    /*
     * @return string
     */
    protected function getCalledPropertyName()
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];

        return strtolower(preg_replace(
            '/[A-Z0-9]/',
            '_$0',
            lcfirst(preg_replace('/^(get|set)/', '', $backtrace))
        ));
    }
}
