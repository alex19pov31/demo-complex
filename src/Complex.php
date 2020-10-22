<?php

namespace DemoComplex;

use DemoComplex\Exceptions\InvalidRealPart;
use DemoComplex\Exceptions\InvalidImaginaryPart;

class Complex
{
    /**
     * @var float|int
     */
    private $real;
    /**
     * @var float|int
     */
    private $imaginary;

    /**
     * Complex constructor.
     * @param int|float $real
     * @param int|float $imaginary
     */
    public function __construct($real, $imaginary = 0)
    {
        if (!is_int($real) && !is_float($real)) {
            throw new InvalidRealPart($real);
        }

        if (!is_int($imaginary) && !is_float($imaginary)) {
            throw new InvalidImaginaryPart($imaginary);
        }

        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    /**
     * @return float|int
     */
    public function getReal()
    {
        return $this->real;
    }

    /**
     * @return float|int
     */
    public function getImaginary()
    {
        return $this->imaginary;
    }

    /**
     * @param Complex $complex
     * @return Complex
     */
    public function add(Complex $complex): Complex
    {
        return new Complex(
            ($this->real + $complex->getReal()),
            ($this->imaginary + $complex->getImaginary())
        );
    }

    /**
     * @param Complex $complex
     * @return Complex
     */
    public function sub(Complex $complex): Complex
    {
        return new Complex(
            ($this->real - $complex->getReal()),
            ($this->imaginary - $complex->getImaginary())
        );
    }

    /**
     * @param Complex $complex
     * @return Complex
     */
    public function div(Complex $complex): Complex
    {
        $divider = pow($complex->getReal(), 2) + pow($complex->getImaginary(), 2);
        $real = (($this->real*$complex->real) + ($this->imaginary*$complex->imaginary))/$divider;
        $imaginary = (($complex->getReal()*$this->imaginary) - ($this->real*$complex->getImaginary()))/$divider;
        return new Complex(
            $real,
            $imaginary
        );
    }

    /**
     * @param Complex $complex
     * @return Complex
     */
    public function mul(Complex $complex): Complex
    {
        $real = ($this->real*$complex->real) - ($this->imaginary*$complex->imaginary);
        $imaginary = ($this->real*$complex->imaginary) + ($this->imaginary*$complex->getReal());
        return new Complex(
            ($real),
            ($imaginary)
        );
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $imaginary = $this->imaginary >= 0 ? $this->imaginary : "({$this->imaginary})";
        return "{$this->real} + {$imaginary}i";
    }
}