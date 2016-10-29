<?php

namespace spec\CodeKatas;

use CodeKatas\BowlingGame;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class BowlingGameSpec
 *
 * @package spec\CodeKatas
 */
class BowlingGameSpec extends ObjectBehavior
{

    /**
     *
     */
    public function it_is_initializable()
    {
        $this->shouldHaveType(BowlingGame::class);
    }

    /**
     *
     */
    public function it_score_0_in_a_gutter_game()
    {
        $this->rollPinsCertainTimes(0, 20);

        $this->score()->shouldBe(0);
    }

    /**
     *
     */
    public function it_sums_up_scores_for_default_rolls()
    {
        $this->roll(6);
        $this->roll(3);
        $this->rollPinsCertainTimes(0, 18);

        $this->score()->shouldBe(9);
    }

    /**
     *
     */
    public function it_sums_up_next_roll_for_a_spare()
    {
        $this->roll(8);
        $this->roll(2);
        $this->roll(7);
        $this->rollPinsCertainTimes(0, 17);

        $this->score()->shouldBe(24);
    }

    /**
     *
     */
    public function it_sums_up_2_next_rolls_for_a_strike()
    {
        $this->roll(10);
        $this->roll(8);
        $this->roll(1);
        $this->rollPinsCertainTimes(0, 16);

        $this->score()->shouldBe(28);
    }

    /**
     *
     */
    public function it_score_300_for_a_prefect_game()
    {
        $this->rollPinsCertainTimes(10, 12);

        $this->score()->shouldBe(300);
    }

    /**
     * @param $pins
     * @param $times
     */
    protected function rollPinsCertainTimes($pins, $times)
    {
        for ($i = 1; $i <= $times; $i++) {
            $this->roll($pins);
        }
    }
}
