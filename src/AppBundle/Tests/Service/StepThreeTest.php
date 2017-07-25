<?php

namespace AppBundle\Tests\Service;

use AppBundle\Service\StepThree;
use PHPUnit\Framework\TestCase;

class StepThreeTest extends TestCase
{
    public function testFizzIsRetrieved()
    {
        $fizzbuzz = new StepThree();

        $this->assertEquals('fizz', $fizzbuzz->calcFizzbuzz(6));
        $this->assertEquals('fizz', $fizzbuzz->calcFizzbuzz(9));
    }

    public function testFizzIsNotRetrieved()
    {
        $fizzbuzz = new StepThree();
        $this->assertNotEquals('fizz', $fizzbuzz->calcFizzbuzz(4));
    }

    public function testBuzzIsRetrieved()
    {
        $fizzbuzz = new StepThree();

        $this->assertEquals('buzz', $fizzbuzz->calcFizzbuzz(5));
        $this->assertEquals('buzz', $fizzbuzz->calcFizzbuzz(10));
    }

    public function testBuzzIsNotRetrieved()
    {
        $fizzbuzz = new StepThree();
        $this->assertNotEquals('buzz', $fizzbuzz->calcFizzbuzz(9));
    }

    public function testFizzBuzzIsRetrieved()
    {
        $fizzbuzz = new StepThree();

        $this->assertEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(15));
        $this->assertEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(45));
    }

    public function testFizzBuzzIsNotRetrieved()
    {
        $fizzbuzz = new StepThree();

        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(3));
        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(5));
        $this->assertNotEquals('fizzbuzz', $fizzbuzz->calcFizzbuzz(13));
    }

    /**
     * @dataProvider testOriginalValueIsReturnedDataProvider
     */
    public function testOriginalValueIsReturned($expected, $value)
    {
        $fizzbuzz = new StepThree();

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
        $fizzbuzz = new StepThree();
        $fizzbuzz->run(6);
        
        $this->assertCount(6, $fizzbuzz->getResult());
    }

    public function testLuckyIsRetrieved()
    {
        $fizzbuzz = new StepThree();

        $this->assertEquals('lucky', $fizzbuzz->calcFizzbuzz(3));
        $this->assertEquals('lucky', $fizzbuzz->calcFizzbuzz(23));
        $this->assertEquals('lucky', $fizzbuzz->calcFizzbuzz(30));
    }

    public function testLuckyIsNotRetrieved()
    {
        $fizzbuzz = new StepThree();

        $this->assertNotEquals('lucky', $fizzbuzz->calcFizzbuzz(12));
    }

    public function testIncrementLuckyIsCalled()
    {
        $mock = $this->getMock('AppBundle\Service\StepThree', array('incrementLucky'));
        $mock->expects($this->once())->method('incrementLucky');
        $mock->calcFizzbuzz(13);
    }

    public function testIncrementFizzBuzzIsCalled()
    {
        $mock = $this->getMock('AppBundle\Service\StepThree', array('incrementFizzBuzz'));
        $mock->expects($this->once())
             ->method('incrementFizzBuzz');
        $mock->calcFizzbuzz(15);
    }

    public function testIncrementFizzIsCalled()
    {
        $mock = $this->getMock('AppBundle\Service\StepThree', array('incrementFizz'));
        $mock->expects($this->once())->method('incrementFizz');
        $mock->calcFizzbuzz(6);
    }

    public function testIncrementBuzzIsCalled()
    {
        $mock = $this->getMock('AppBundle\Service\StepThree', array('incrementBuzz'));
        $mock->expects($this->once())->method('incrementBuzz');
        $mock->calcFizzbuzz(10);
    }

    public function testIncrementIntegerIsCalled()
    {
        $mock = $this->getMock('AppBundle\Service\StepThree', array('incrementInteger'));
        $mock->expects($this->once())->method('incrementInteger');
        $mock->calcFizzbuzz(7);
    }

    public function testStats()
    {
        $fizzbuzz = new StepThree();
        
        $fizzbuzz->incrementLucky();
        $fizzbuzz->incrementFizz();
        $fizzbuzz->incrementBuzz();
        $fizzbuzz->incrementInteger();
        $fizzbuzz->incrementBuzz();
        $fizzbuzz->incrementFizz();
        $fizzbuzz->incrementInteger();
        $fizzbuzz->incrementFizzBuzz();
        $fizzbuzz->incrementFizz();
        $fizzbuzz->incrementBuzz();
        $fizzbuzz->incrementFizz();
        
        $expected = [
            'fizz'     => 4,
            'buzz'     => 3,
            'fizzbuzz' => 1,
            'lucky'    => 1,
            'integer'  => 2,
        ];
        
        $this->assertEquals($expected, $fizzbuzz->getStats());
    }
}