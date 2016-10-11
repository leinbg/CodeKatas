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

    function it_calc_with_no_discounts()
    {
        $this->calc([1])->shouldBe(8);
        $this->calc([1, 1])->shouldBe(16);
        $this->calc([1, 1, 1])->shouldBe(24);
    }

    function it_calc_without_buying_the_same_book()
    {
        $this->calc([1, 2])->shouldBe(15.2);
        $this->calc([1, 2, 3])->shouldBe(21.6);
        $this->calc([1, 2, 3, 4])->shouldBe(25.6);
        $this->calc([1, 2, 3, 4, 5])->shouldBe(30.0);
    }

    function it_calc_with_same_books()
    {
        $this->calc([1, 2, 1])->shouldBe(23.2);
        $this->calc([1, 2, 3, 1, 2])->shouldBe(36.8);
        $this->calc([1, 2, 3, 1, 2, 1, 1])->shouldBe(52.8);
        $this->calc([1, 2, 3, 4, 5, 1])->shouldBe(38.0);
        $this->calc([1, 2, 3, 4, 5, 1, 2])->shouldBe(45.2);
    }

    function it_calc_with_magic_combinations()
    {
        $this->calc([1,2,3,4,5,1,2,3])->shouldBe(51.2);
    }
}
