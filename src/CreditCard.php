<?php

class CreditCard
{
    private function __construct()
    {
    }

    public static function fromNumberExpiryDataAndCCV(CardNumber $argument1,ExpiryDate $argument2,Ccv $argument3)
    {
        $creditCard = new CreditCard();

        // TODO: write logic here

        return $creditCard;
    }
}
