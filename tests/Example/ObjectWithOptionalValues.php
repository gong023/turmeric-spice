<?php

namespace TurmericSpice\Example;

use TurmericSpice\ImmutableAttributes;

class ObjectWithOptionalValues
{
    use ImmutableAttributes {
        mayHaveAsInt as public getOne;
        mayHaveAsFloat as public getPointOne;
        mayHaveAsString as public getString;
        mayHaveAsBoolean as public getTrue;
        mayHaveAsArray as public getArray;
    }
}
