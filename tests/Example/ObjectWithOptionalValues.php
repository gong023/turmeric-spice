<?php

namespace TurmericSpice\Example;

use TurmericSpice\AttributesGetter;

class ObjectWithOptionalValues
{
    use AttributesGetter {
        mayHaveAsInt as public getOne;
        mayHaveAsFloat as public getPointOne;
        mayHaveAsString as public getString;
        mayHaveAsBoolean as public getTrue;
        mayHaveAsArray as public getArray;
    }
}
