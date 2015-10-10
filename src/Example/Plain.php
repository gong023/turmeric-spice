<?php

namespace TurmericSpice\Example;

use TurmericSpice\Getter;

class Plain
{
    use Getter {
        mayHaveAsInt as public getOne;
        mustHaveAsInt as public getTwo;
    }
}
