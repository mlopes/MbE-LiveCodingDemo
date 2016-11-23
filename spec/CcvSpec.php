<?php

namespace spec;

use Ccv;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CcvSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromNumber', [123]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Ccv::class);
    }
}
