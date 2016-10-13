<?php

namespace CodeKatas;

/**
 * Class NumbersInWords
 *
 * @package CodeKatas
 */
class NumbersInWords
{

    protected $mapping = [
        0 => 'ling',
        1 => 'yi',
        2 => 'er',
        3 => 'san',
        4 => 'si',
        5 => 'wu',
        6 => 'liu',
        7 => 'qi',
        8 => 'ba',
        9 => 'jiu',
    ];

    protected $units = [
        1000 => 'qian',
        100 => 'bai',
        10 => 'shi',
    ];

    /**
     * @param numbers
     *
     * @return string
     */
    public function convert($number)
    {

        $aRest = $this->iterateIntegerPart($number);
        $words = $aRest['words'];
        $words = $this->applySpecialRules($words);

        return $words;
    }

    /**
     * @param $number
     *
     * @return array
     */
    protected function iterateIntegerPart($number)
    {
        $words = '';
        foreach ($this->units as $unitInt => $unitWord) {
            if ($number > $unitInt) {
                $unitDigit = (int) floor($number / $unitInt);
                $words .= $this->getMappingOf($unitDigit);
                $words .= $this->getUnitBy($unitWord);
                $number = $number - $unitDigit * $unitInt;
            }
        }

        $words .= $this->getMappingOf($number);
        $number = $number - floor($number);

        return [
            'words' => $words,
            'number' => $number,
        ];
    }

    protected function iterateDecimalPart()
    {

    }

    /**
     * @param $unitWord
     *
     * @return string
     */
    protected function getUnitBy($unitWord)
    {
        return ' ' . $unitWord . ' ';
    }

    /**
     * @param $number
     *
     * @return mixed
     */
    protected function getMappingOf($number)
    {
        if (is_int($number) == false || $number < 0 || $number > 9) {
            throw new \InvalidArgumentException('not an integer between 0 and 9.');
        }

        return $this->mapping[$number];
    }

    /**
     * @param $words
     *
     * @return string
     */
    protected function applySpecialRules($words)
    {
        $words = $this->ruleYiShi($words);

        return $words;
    }

    /**
     * @param $words
     *
     * @return string
     */
    protected function ruleYiShi($words)
    {
        $invalid = 'yi shi';
        if (substr($words, 0, strlen($invalid)) === $invalid) {
            $words = substr($words, 3);
        }

        return $words;
    }
}
