Feature: Paying with a card
  In order to be able to pay for goods and services online
  As a buyer
  I want to be able to make payments using my credit card

  Scenario: Paying with a credit card
    Given the payment gateway has credit card payments enabled 
    And I have credit card 4444333322221111 with expiry date "11/2017" and CCV 123
    When I make a payment of £42 with that credit card 
    And the payment is approved for the credit card
    Then the payment should be captured

  Scenario: Failing to pay with a credit card with the wrong CCV
    Given the payment gateway has credit card payments enabled
    And I have a credit card with the wrong CCV
    When I make a payment of £42 with that credit card
    And the payment is refused due incorrect CCV
    Then the payment should not be captured
