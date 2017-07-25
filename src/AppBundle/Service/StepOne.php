<?php
namespace AppBundle\Service;

class StepOne
{
    /**
     * @var array
     */
    protected $result = [];

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

        if (0 == $x % 3) {
            $value .= 'fizz';
        }
        if (0 == $x % 5) {
            $value .= 'buzz';
        }
        if (empty($value)) {
            $value = $x;
        }

        return $value;
    }

    public function getResult()
    {
        return $this->result;
    }
}
