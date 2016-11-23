<?php

namespace spec;

use Payment;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaymentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Payment::class);
    }
}
