Feature: Create GuestBook Entry
  Scenario: Create a new guest book entry
    Given I am on "/"
    When I fill in "Name" with "Guest"
    And I fill in "Text" with "Some Text"
    And I press "Create"
    Then I should see "Some Text"