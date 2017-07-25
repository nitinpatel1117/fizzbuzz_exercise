<?php
namespace AppBundle\Service;

class StepThree
{
    /**
     * @var array
     */
    protected $result = [];

    /**
     * @var array
     */
    protected $stats = [];

    
    public function __construct()
    { 
        $this->setupStats();
    }

    /*
     * Function initialises the stat counters
     */
    public function setupStats()
    {
        $this->stats = [
            'fizz'     => 0,
            'buzz'     => 0,
            'fizzbuzz' => 0,
            'lucky'    => 0,
            'integer'  => 0,
        ];
    }

    /**
     * Function does fizzbuzz up to given number
     *
     * @param integer $range The number to go to
     * @return void
     */
    public function run($range)
    { 
        for ($x = 1; $range >= $x; $x++) {
            $this->result[] = $this->calcFizzbuzz($x);
        }
    }

    /**
     * Function calculates the fizz buzz value for the given number
     *
     * @param integer $x The value used for Fizz Buzz
     * @return string
     */
    public function calcFizzbuzz($x)
    {
        $value = '';

        if (false !== strpos((string) $x, '3')) {
            $this->incrementLucky();
            return 'lucky';
        }

        if (0 == $x % 15) {
            $this->incrementFizzBuzz();
            return 'fizzbuzz';
        }

        if (0 == $x % 3) {
            $this->incrementFizz();
            return 'fizz';
        }

        if (0 == $x % 5) {
            $this->incrementBuzz();
            return 'buzz';
        }

        $this->incrementInteger();
        return $x;
    }

    public function getResult() {
        return $this->result;
    }

    public function getStats() {
        return $this->stats;
    }

    public function incrementFizz() {
        $this->stats['fizz']++;
    }

    public function incrementBuzz() {
        $this->stats['buzz']++;
    }

    public function incrementFizzBuzz() {
        $this->stats['fizzbuzz']++;
    }

    public function incrementInteger() {
        $this->stats['integer']++;
    }

    public function incrementLucky() {
        $this->stats['lucky']++;
    }

}
