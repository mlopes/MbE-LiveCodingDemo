<?php

namespace spec;

use Amount;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AmountSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedThrough('fromNumber', [123]);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(Amount::class);
    }
}
