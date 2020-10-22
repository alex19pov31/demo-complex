<?php

namespace DemoComplex\Exceptions;

use Exception;

class InvalidRealPart extends Exception
{

    private $value;

    public function __construct($value)
    {
        $this->value = $value;
        parent::__construct("Invalid complex real part: {$this->value}");
    }
}