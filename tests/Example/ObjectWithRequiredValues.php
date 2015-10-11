<?php

namespace TurmericSpice\Example;

use TurmericSpice\ReadableAttributes;

class ObjectWithRequiredValues
{
    use ReadableAttributes {
        mustHaveAsInt as public getOne;
        mustHaveAsFloat as public getPointOne;
        mustHaveAsString as public getString;
        mustHaveAsBoolean as public getTrue;
        mustHaveAsArray as public getArray;
    }
}
