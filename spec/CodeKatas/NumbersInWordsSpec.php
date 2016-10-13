<?php

namespace spec\CodeKatas;

use CodeKatas\NumbersInWords;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class NumbersInWordsSpec
 *
 * @package spec\CodeKatas
 */
class NumbersInWordsSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(NumbersInWords::class);
    }

    function it_converts_one_digit_integer()
    {
        $this->convert(1)->shouldBe('yi');
        $this->convert(5)->shouldBe('wu');
    }

    function it_converts_integer_under_100()
    {
        $this->convert(43)->shouldBe('si shi san');
        $this->convert(14)->shouldBe('shi si');
    }

    function it_converts_integer_under_1000()
    {
        $this->convert(198)->shouldBe('yi bai jiu shi ba');
        $this->convert(423)->shouldBe('si bai er shi san');
    }

    function it_converts_integer_under_10000()
    {
        $this->convert(1111)->shouldBe('yi qian yi bai yi shi yi');
        $this->convert(3456)->shouldBe('san qian si bai wu shi liu');
    }
}
