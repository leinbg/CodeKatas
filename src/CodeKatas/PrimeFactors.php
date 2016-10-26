<?php

namespace CodeKatas;

/**
 * Class PrimeFactors
 *
 * @package CodeKatas
 */
class PrimeFactors
{
    /**
     * @param $int
     *
     * @return array
     */
    public function getFactors($int)
    {
        if (!is_int($int) || $int < 2) {
            throw new \InvalidArgumentException('not an Integer greater than 1');
        }

        $factors = [];
        $candidate = 2;

        while ($candidate <= $int) {
            while ($int % $candidate == 0) {
                if (!in_array($candidate, $factors, true)) {
                    $factors[] = $candidate;
                }
                $int /= $candidate;
            }
            $candidate++;
        }

        return $factors;
    }
}
