<?php

namespace TurmericSpice\Example;

use TurmericSpice\MutableAttributes;

class ObjectWithSetter
{
    use MutableAttributes {
        mustHaveAsInt as public getId;
        mayHaveAsString as public getName;
        setValue as public setId;
        setValue as public setName;
    }
}
