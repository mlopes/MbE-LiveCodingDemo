<?php

interface PaymentGateway
{
    public function hasCreditCardPaymentsEnabled();

    public function MakePaymentOfAmountWithCreditCard(Amount $amount, CreditCard $creditCard);

    public function isPaymentApprovedForCreditCard(Payment $payment, CreditCard $card);

    public function capture(Payment $payment);
}