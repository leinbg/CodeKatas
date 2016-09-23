<?php

namespace CodeKatas;

/**
 * Class RomanNumbers
 *
 * @package CodeKatas
 */
class RomanNumbers
{

    protected $units = [
        'C' => '100',
        'XC' => '90',
        'L' => '50',
        'XL' => '40',
        'X' => '10',
        'IX' => '9',
        'V' => '5',
        'IV' => '4',
        'I' => '1',
    ];

    /**
     * @param int $integer int
     *
     * @return string
     */
    public function convert($integer)
    {
        if (is_int($integer) == false) {
            throw new \InvalidArgumentException('Not an Integer');
        }

        $romanNumber = '';

        foreach ($this->units as $unit => $number) {
            while ($integer >= $number) {
                $romanNumber .= $unit;
                $integer -= $number;
            }
        }

        return $romanNumber;
    }
}
