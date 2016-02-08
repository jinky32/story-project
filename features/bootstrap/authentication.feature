Feature: authentication
  In order to be able to create a story
  As a normal site user
  I have to be able to log in and out

  Scenario: Loggin In
    Given I am on "/"
    When I follow "login"
    And I fill in "Username" with "john"
    And I fill in "Password" with "manchester"
    And I press "Log in"
    Then I should see "john"

 //set up some scenarios to test whether an authenticated user can see a list of their children
    and whether a non authenticated user can
