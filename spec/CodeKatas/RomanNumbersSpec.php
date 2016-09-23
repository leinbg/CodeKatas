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

    /**
     * init test
     */
    function it_is_initializable()
    {
        $this->shouldHaveType(RomanNumbers::class);
    }
}
