<?php

namespace spec\CodeKatas;

use CodeKatas\RomanNumbers;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RomanNumbersSpec
 *
 * @package spec\CodeKatas
 */
class RomanNumbersSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(RomanNumbers::class);
    }

    function it_throws_exception_when_argument_not_integer()
    {
        $this->shouldThrow(new \InvalidArgumentException('Not an Integer'))->during('convert', ['a']);
    }

    function it_convert_1_to_I()
    {
        $this->convert(1)->shouldBe('I');
    }

    function it_convert_2_to_II()
    {
        $this->convert(2)->shouldBe('II');
    }

    function it_convert_4_to_IV()
    {
        $this->convert(4)->shouldBe('IV');
    }

    function it_convert_5_to_V()
    {
        $this->convert(5)->shouldBe('V');
    }

    function it_convert_6_to_VI()
    {
        $this->convert(6)->shouldBe('VI');
    }

    function it_convert_9_to_IX()
    {
        $this->convert(9)->shouldBe('IX');
    }

    function it_convert_10_to_X()
    {
        $this->convert(10)->shouldBe('X');
    }

    function it_convert_18_to_XVIII()
    {
        $this->convert(18)->shouldBe('XVIII');
    }

    function it_convert_37_to_XXXVII()
    {
        $this->convert(37)->shouldBe('XXXVII');
    }

    function it_convert_48_to_XLVIII()
    {
        $this->convert(48)->shouldBe('XLVIII');
    }

    function it_convert_99_to_XCIX()
    {
        $this->convert(99)->shouldBe('XCIX');
    }
}

