<?php

namespace TurmericSpice\Example;

use TurmericSpice\Getter;

class ObjectWithOptionalValues
{
    use Getter {
        mayHaveAsInt as public getOne;
        mayHaveAsFloat as public getPointOne;
        mayHaveAsString as public getString;
        mayHaveAsBoolean as public getTrue;
        mayHaveAsArray as public getArray;
    }
}
