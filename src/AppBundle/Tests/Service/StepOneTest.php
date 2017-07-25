<?php

namespace AppBundle\Tests\Service;

use AppBundle\Service\StepOne;
use PHPUnit\Framework\TestCase;

class StepOneTest extends TestCase
{
    public function testFizzIsRetrieved()
    {
        $fizzbuzz = new StepOne();

        $this->assertEquals('fizz', $fizzbuzz->calcFizzbuzz(3));
        $this->assertEquals('fizz', $fizzbuzz->calcFizzbuzz(6));
    }

    public function testFizzIsNotRetrieved()
    {
        $fizzbuzz = new StepOne();
        $this->assertNotEquals('fizz', $fizzbuzz->calcFizzbuzz(4));
    }

    public function testBuzzIsRetrieved()
    {
        $fizzbuzz = new StepOne();

        $this->assertEquals('buzz', $fizzbuzz->calcFizzbuzz(5));
        $this->assertEquals('buzz', $fizzbuzz->calcFizzbuzz(10));
    }

    public function testBuzzIsNotRetrieved()
    {
        $fizzbuzz = new StepOne();
        $this->assertNotEquals('buzz', $fizzbuzz->calcFizzbuzz(9));
    }

    public function testFizzBuzzIsRetrieved()
    {
        $fizzbuzz = new StepOne();

        $this->assertEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(15));
        $this->assertEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(30));
    }

    public function testFizzBuzzIsNotRetrieved()
    {
        $fizzbuzz = new StepOne();

        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(3));
        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(5));
        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(13));
    }

    /**
     * @dataProvider testOriginalValueIsReturnedDataProvider
     */
    public function testOriginalValueIsReturned($expected, $value)
    {
        $fizzbuzz = new StepOne();

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
        $fizzbuzz = new StepOne();
        $fizzbuzz->run(6);
        
        $this->assertCount(6, $fizzbuzz->getResult());
    }
}