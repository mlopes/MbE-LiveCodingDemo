<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;

class PaymentsContext implements Context
{
    private $paymentGateway;
    private $creditCard;
    private $payment;

    /**
     * @Transform :aCardNumber
     */
    public function fromNumberToCardNumber($cardNumber)
    {
        return CardNumber::fromNumber($cardNumber);
    }

    /**
     * @Transform :anExpiryDate
     */
    public function fromStringToExpiryDate($date)
    {
        $date = explode("/", $date);
        return ExpiryDate::fromMonthAndYear($date[0], $date[1]);
    }

    /**
     * @Transform :aCCV
     */
    public function fromNumberToCCV($number)
    {
        return Ccv::fromNumber($number);
    }

    /**
     * @Transform :anAmount
     */
    public function fromNumberToAmount($number)
    {
        return Amount::fromNumber($number);
    }

    /**
     * @Given the payment gateway has credit card payments enabled 
     */
    public function thePaymentGatewayHasCreditCardPaymentsEnabled()
    {
        $this->paymentGateway = new FakePaymentGateway();
        expect($this->paymentGateway->hasCreditCardPaymentsEnabled())->toBe(true);
    }

    /**
     * @Given I have credit card :aCardNumber with expiry date :anExpiryDate and CCV :aCCV
     */
    public function iHaveCreditCardWithExpiryDateAndCcv2(CardNumber $aCardNumber, ExpiryDate $anExpiryDate, Ccv $aCCV)
    {
        $this->creditCard = CreditCard::fromNumberExpiryDataAndCCV($aCardNumber, $anExpiryDate, $aCCV);
    }


    /**
     * @When I make a payment of £:anAmount with that credit card 
     */
    public function iMakeAPaymentOfPsWithThatCreditCard(Amount $anAmount)
    {
        $this->payment = $this->paymentGateway->MakePaymentOfAmountWithCreditCard($anAmount, $this->creditCard);
    }

    /**
     * @When the payment is approved for the credit card
     */
    public function thePaymentIsApprovedForTheCreditCard()
    {
        expect(
            $this->paymentGateway->isPaymentApprovedForCreditCard($this->payment, $this->creditCard)
        )->toBe(true);
    }

    /**
     * @Then the payment can be captured
     */
    public function thePaymentCanBeCaptured()
    {
        $this->paymentGateway->capture($this->payment);
    }
}
