<?php

namespace spec;

use CardNumber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CardNumberSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromNumber', [123]);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(CardNumber::class);
    }
}
