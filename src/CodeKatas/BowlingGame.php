<?php

namespace CodeKatas;

/**
 * Class BowlingGame
 *
 * @package CodeKatas
 */
class BowlingGame
{

    /**
     * @var array
     */
    protected $pins = [];

    protected $allPins = 10;

    /**
     *
     */
    public function score()
    {
        $score = 0;
        $roll = 0;
        for ($frame = 1; $frame <= $this->allPins; $frame++) {
            if ($this->isStrike($roll)) {
                $score += $this->scoreStrike($roll);
                $roll ++;
            } elseif ($this->isSpare($roll)) {
                $score += $this->scoreSpare($roll);
                $roll += 2;
            } else {
                $score += $this->scoreDefault($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    /**
     * @param $pins
     */
    public function roll($pins)
    {
        $this->pins[] = $pins;
    }

    /**
     * @param $roll
     *
     * @return mixed
     */
    protected function scoreDefault($roll)
    {
        return $this->pins[$roll] + $this->pins[$roll + 1];
    }

    /**
     * @param $roll
     *
     * @return bool
     */
    protected function isSpare($roll)
    {
        return $this->pins[$roll] + $this->pins[$roll + 1] == $this->allPins;
    }

    /**
     * @param $roll
     *
     * @return int
     */
    protected function scoreSpare($roll)
    {
        return $this->allPins + $this->pins[$roll + 2];
    }

    /**
     * @param $roll
     *
     * @return bool
     */
    protected function isStrike($roll)
    {
        return $this->pins[$roll] == 10;
    }

    /**
     * @param $roll
     *
     * @return int
     */
    protected function scoreStrike($roll)
    {
        return 10 + $this->pins[$roll + 1] + $this->pins[$roll + 2];
    }
}
