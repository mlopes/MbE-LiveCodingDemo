<?php

class FakePaymentGateway implements PaymentGateway
{

    public function hasCreditCardPaymentsEnabled()
    {
        return true;
    }

    public function MakePaymentOfAmountWithCreditCard(Amount $amount, CreditCard $creditCard)
    {
        return new Payment();
    }

    public function isPaymentApprovedForCreditCard(Payment $payment, CreditCard $card)
    {
        return true;
    }

    public function capture(Payment $payment)
    {
        // TODO: Implement capture() method.
    }
}