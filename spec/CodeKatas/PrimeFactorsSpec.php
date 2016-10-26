<?php

namespace spec\CodeKatas;

use CodeKatas\PrimeFactors;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrimeFactorsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PrimeFactors::class);
    }

    public function it_throws_exception_when_parameter_is_not_an_positive_integer()
    {
        $invalids = [
            0, 'a', -1, 2.34, null, ['3'], '2', 1
        ];
        foreach ($invalids as $invalid) {
            $this->shouldThrow(\InvalidArgumentException::class)->during('getFactors', [$invalid]);

        }
    }

    public function it_get_factors_of_2()
    {
        $this->getFactors(2)->shouldBe([2]);
    }

    public function it_get_factors_of_10()
    {
        $this->getFactors(10)->shouldBe([2,5]);
    }

    public function it_get_factors_of_60()
    {
        $this->getFactors(60)->shouldBe([2,3,5]);
    }

    public function it_get_factors_of_494()
    {
        $this->getFactors(494)->shouldBe([2,13,19]);
    }
}
