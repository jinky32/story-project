Feature: Homepage Test
  In order to learn BDD
  As a newbie
  I need to be able to do a basic homepage test

  Scenario: Go to login page
    Given I am on "/"
    When I click "login"
    Then I should see "Username"