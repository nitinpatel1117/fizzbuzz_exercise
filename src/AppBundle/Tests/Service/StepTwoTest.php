<?php

namespace AppBundle\Tests\Service;

use AppBundle\Service\StepTwo;
use PHPUnit\Framework\TestCase;

class StepTwoTest extends TestCase
{
    public function testFizzIsRetrieved()
    {
        $fizzbuzz = new StepTwo();

        $this->assertEquals('fizz', $fizzbuzz->calcFizzbuzz(6));
        $this->assertEquals('fizz', $fizzbuzz->calcFizzbuzz(9));
    }

    public function testFizzIsNotRetrieved()
    {
        $fizzbuzz = new StepTwo();
        $this->assertNotEquals('fizz', $fizzbuzz->calcFizzbuzz(4));
    }

    public function testBuzzIsRetrieved()
    {
        $fizzbuzz = new StepTwo();

        $this->assertEquals('buzz', $fizzbuzz->calcFizzbuzz(5));
        $this->assertEquals('buzz', $fizzbuzz->calcFizzbuzz(10));
    }

    public function testBuzzIsNotRetrieved()
    {
        $fizzbuzz = new StepTwo();
        $this->assertNotEquals('buzz', $fizzbuzz->calcFizzbuzz(9));
    }

    public function testFizzBuzzIsRetrieved()
    {
        $fizzbuzz = new StepTwo();

        $this->assertEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(15));
        $this->assertEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(45));
    }

    public function testFizzBuzzIsNotRetrieved()
    {
        $fizzbuzz = new StepTwo();

        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(3));
        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(5));
        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(13));
    }

    /**
     * @dataProvider testOriginalValueIsReturnedDataProvider
     */
    public function testOriginalValueIsReturned($expected, $value)
    {
        $fizzbuzz = new StepTwo();

        $this->assertEquals($expected, $fizzbuzz->calcFizzbuzz($value));
    }

    public function testOriginalValueIsReturnedDataProvider()
    {
        return [
            [1, 1],
            [2, 2],
            [11, 11],
            [17, 17],
        ];
    }

    public function testCorrectRangeIsRetrieved()
    {
        $fizzbuzz = new StepTwo();
        $fizzbuzz->run(6);
        
        $this->assertCount(6, $fizzbuzz->getResult());
    }

    public function testLuckyIsRetrieved()
    {
        $fizzbuzz = new StepTwo();

        $this->assertEquals('lucky', $fizzbuzz->calcFizzbuzz(3));
        $this->assertEquals('lucky', $fizzbuzz->calcFizzbuzz(23));
        $this->assertEquals('lucky', $fizzbuzz->calcFizzbuzz(30));
    }

    public function testLuckyIsNotRetrieved()
    {
        $fizzbuzz = new StepTwo();

        $this->assertNotEquals('lucky', $fizzbuzz->calcFizzbuzz(12));
    }
}