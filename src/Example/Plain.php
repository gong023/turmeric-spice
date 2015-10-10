<?php

namespace TurmericSpice\Example;

use TurmericSpice\Getter;

class Plain
{
    use Getter {
        mayHaveAsInt as public getOne;
        mustHaveAsInt as public getTwo;
        mayHaveAsFloat as public getPointOne;
        mustHaveAsFloat as public getPointTwo;
        mayHaveAsString as public getStringOrNull;
        mustHaveAsString as public getString;
        mayHaveAsBoolean as public getTrue;
        mustHaveAsBoolean as public getFalse;
        mayHaveAsArray as public getArrayOrNull;
        mustHaveAsArray as public getArray;
    }
}
