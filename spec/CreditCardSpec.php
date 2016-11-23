<?php

namespace spec;

use CardNumber;
use Ccv;
use CreditCard;
use ExpiryDate;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreditCardSpec extends ObjectBehavior
{
    function let(CardNumber $cardNumber, ExpiryDate $expiryDate, Ccv $ccv)
    {
        $this->beConstructedThrough('fromNumberExpiryDataAndCCV', [$cardNumber, $expiryDate, $ccv]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreditCard::class);
    }
}
