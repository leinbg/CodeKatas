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

    public function it_is_initializable()
    {
        $this->shouldHaveType(NumbersInWords::class);
    }

    public function it_converts_integer_less_than_10()
    {
        $this->convert(1)->shouldBe('yi');
        $this->convert(5)->shouldBe('wu');
    }

    public function it_converts_integer_less_than_100()
    {
        $this->convert(43)->shouldBe('si shi san');
        $this->convert(14)->shouldBe('shi si');
    }

    public function it_converts_integer_less_than_1000()
    {
        $this->convert(198)->shouldBe('yi bai jiu shi ba');
        $this->convert(423)->shouldBe('si bai er shi san');
    }

    public function it_converts_integer_less_than_10000()
    {
        $this->convert(1111)->shouldBe('yi qian yi bai yi shi yi');
        $this->convert(3456)->shouldBe('san qian si bai wu shi liu');
    }

    public function it_converts_float_more_than_1()
    {
        $this->convert(1.23)->shouldBe('yi dian er san');
        $this->convert(23.01)->shouldBe('er shi san dian ling yi');
    }
}
