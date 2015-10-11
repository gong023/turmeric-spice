<?php

namespace TurmericSpice\Example;

use TurmericSpice\ImmutableAttributes;

class ObjectWithRequiredValues
{
    use ImmutableAttributes {
        mustHaveAsInt as public getOne;
        mustHaveAsFloat as public getPointOne;
        mustHaveAsString as public getString;
        mustHaveAsBoolean as public getTrue;
        mustHaveAsArray as public getArray;
    }
}
