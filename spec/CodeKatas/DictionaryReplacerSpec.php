<?php

namespace spec\CodeKatas;

use CodeKatas\DictionaryReplacer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class DictionaryReplacerSpec
 *
 * @package spec\CodeKatas
 */
class DictionaryReplacerSpec extends ObjectBehavior
{

    public function let()
    {
        $dict = [
            'dummy' => 'foo',
        ];
        $this->beConstructedWith($dict);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DictionaryReplacer::class);
    }

    public function it_replace_single_word_in_string()
    {
        $testString = '*dummy*';

        $this->replace($testString)->shouldBe('foo');
    }

    public function it_replace_repeated()
    {
        $testString = '*dummy*, *dummy*';

        $this->replace($testString)->shouldBe('foo, foo');
    }
}
