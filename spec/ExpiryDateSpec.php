<?php

namespace spec;

use ExpiryDate;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExpiryDateSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromMonthAndYear', ['10', '2017']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ExpiryDate::class);
    }
}
