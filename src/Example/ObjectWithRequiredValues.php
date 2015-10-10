<?php

namespace TurmericSpice\Example;

use TurmericSpice\Getter;

class ObjectWithRequiredValues
{
    use Getter {
        mustHaveAsInt as public getOne;
        mustHaveAsFloat as public getPointOne;
        mustHaveAsString as public getString;
        mustHaveAsBoolean as public getTrue;
        mustHaveAsArray as public getArray;
    }
}
