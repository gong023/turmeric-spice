<?php

namespace TurmericSpice\Example;

use TurmericSpice\ReadWriteAttributes;

class ObjectWithSetter
{
    use ReadWriteAttributes {
        mustHaveAsInt as public getId;
        mayHaveAsString as public getName;
        setValue as public setId;
        setValue as public setName;
    }
}
