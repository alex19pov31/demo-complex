<?php

use PHPUnit\Framework\TestCase;
use DemoComplex\Complex;
use DemoComplex\Exceptions\InvalidRealPart;
use DemoComplex\Exceptions\InvalidImaginaryPart;

class ComplexTest extends TestCase
{
    public function testInvalidArgs()
    {
        try {
            new Complex('test', 4);
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof InvalidRealPart);
        }

        try {
            new Complex(1, '77');
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof InvalidImaginaryPart);
        }
    }

    public function testAdd()
    {
        $complex1 = new Complex(4, 3);
        $complex2 = new Complex(5, -6);
        $result = $complex1->add($complex2);

        $this->assertEquals('9 + (-3)i', (string)$result);
    }

    public function testSub()
    {
        $complex1 = new Complex(4, 3);
        $complex2 = new Complex(5, -6);
        $result = $complex1->sub($complex2);

        $this->assertEquals('-1 + 9i', (string)$result);
    }

    public function testMul()
    {
        $complex1 = new Complex(4, 3);
        $complex2 = new Complex(5, -6);
        $result = $complex1->mul($complex2);

        $this->assertEquals('38 + (-9)i', (string)$result);
    }

    public function testDiv()
    {
        $complex1 = new Complex(1, 2);
        $complex2 = new Complex(2, 1);
        $result = $complex1->div($complex2);

        $this->assertEquals('0.8 + 0.6i', (string)$result);
    }
}