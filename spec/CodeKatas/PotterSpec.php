<?php

namespace spec\CodeKatas;

use CodeKatas\Potter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class PotterSpec
 *
 * @package spec\CodeKatas
 */
class PotterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Potter::class);
    }

    public function it_throws_exception_when_setting_books_not_as_array()
    {
        $others = [
            null,
            true,
            1,
            [],
        ];
        foreach ($others as $other) {
            $this->shouldThrow('\InvalidArgumentException')->duringCalc($other);
        }
    }

    public function it_calc_with_no_discounts()
    {
        $this->calc([1])->shouldBe(8);
        $this->calc([1, 1])->shouldBe(16);
        $this->calc([1, 1, 1])->shouldBe(24);
    }

    public function it_calc_without_buying_the_same_book()
    {
        $this->calc([1, 2])->shouldBe(15.2); // 8 * 2 * .95
        $this->calc([1, 2, 3])->shouldBe(21.6); // 8 * 3 * .9
        $this->calc([1, 2, 3, 4])->shouldBe(25.6); // 8 * 4 * .8
        $this->calc([1, 2, 3, 4, 5])->shouldBe(30.0); // 8 * 5 * .75
    }

    public function it_calc_with_same_books()
    {
        $this->calc([1, 2, 1])->shouldBe(23.2); // 15.2 + 8
        $this->calc([1, 2, 3, 1, 2])->shouldBe(36.8); // 21.6 + 15.2
        $this->calc([1, 2, 3, 1, 2, 1, 1])->shouldBe(52.8); // 21.6 + 15.2 + 8 + 8
        $this->calc([1, 2, 3, 4, 5, 1])->shouldBe(38.0); // 30 + 8
        $this->calc([1, 2, 3, 4, 5, 1, 2])->shouldBe(45.2); // 30 + 15.2
    }

    public function it_calc_with_magic_combinations()
    {
        $this->calc([1,2,3,4,5,1,2,3])->shouldBe(51.2); // not 51.6
        $this->calc([1,2,3,4,5,1,2,3,4,5,1,2,3])->shouldBe(81.2); // not 81.6
    }
}
