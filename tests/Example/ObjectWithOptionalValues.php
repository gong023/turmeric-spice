<?php

namespace TurmericSpice\Example;

use TurmericSpice\ReadableAttributes;

class ObjectWithOptionalValues
{
    use ReadableAttributes {
        mayHaveAsInt as public getOne;
        mayHaveAsFloat as public getPointOne;
        mayHaveAsString as public getString;
        mayHaveAsBoolean as public getTrue;
        mayHaveAsArray as public getArray;
    }
}
