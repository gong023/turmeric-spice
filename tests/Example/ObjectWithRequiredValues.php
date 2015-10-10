<?php

namespace TurmericSpice\Example;

use TurmericSpice\AttributesGetter;

class ObjectWithRequiredValues
{
    use AttributesGetter {
        mustHaveAsInt as public getOne;
        mustHaveAsFloat as public getPointOne;
        mustHaveAsString as public getString;
        mustHaveAsBoolean as public getTrue;
        mustHaveAsArray as public getArray;
    }
}
