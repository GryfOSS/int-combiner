Feature: Integer Combination
  As a developer
  I want to combine two integers without string conversion
  So that I can efficiently concatenate numbers

  Background:
    Given I have the IntCombiner class available

  Scenario: Combining two positive single-digit integers
    Given I have the first integer 1
    And I have the second integer 2
    When I combine the integers
    Then the result should be 12

  Scenario: Combining two positive multi-digit integers
    Given I have the first integer 123
    And I have the second integer 456
    When I combine the integers
    Then the result should be 123456

  Scenario: Combining integers with different digit counts
    Given I have the first integer 5
    And I have the second integer 789
    When I combine the integers
    Then the result should be 5789

  Scenario: Combining when first integer is zero
    Given I have the first integer 0
    And I have the second integer 123
    When I combine the integers
    Then the result should be 123

  Scenario: Combining when second integer is zero (edge case)
    Given I have the first integer 123
    And I have the second integer 0
    When I combine the integers
    Then the result should be 1230

  Scenario: Combining when both integers are zero
    Given I have the first integer 0
    And I have the second integer 0
    When I combine the integers
    Then the result should be 0

  Scenario: Combining large integers
    Given I have the first integer 12345
    And I have the second integer 67890
    When I combine the integers
    Then the result should be 1234567890

  Scenario: Combining with powers of ten
    Given I have the first integer 100
    And I have the second integer 200
    When I combine the integers
    Then the result should be 100200

  Scenario Outline: Combining various integer pairs
    Given I have the first integer <first>
    And I have the second integer <second>
    When I combine the integers
    Then the result should be <expected>

    Examples:
      | first | second | expected |
      | 1     | 9      | 19       |
      | 12    | 34     | 1234     |
      | 99    | 88     | 9988     |
      | 1000  | 1      | 10001    |
      | 42    | 0      | 420      |
      | 7     | 777    | 7777     |
      | 999   | 111    | 999111   |

  Scenario: Attempting to combine with negative first integer
    Given I have the first integer -5
    And I have the second integer 10
    When I try to combine the integers
    Then I should get an InvalidArgumentException
    And the error message should be "Both integers must be non-negative."

  Scenario: Attempting to combine with negative second integer
    Given I have the first integer 5
    And I have the second integer -10
    When I try to combine the integers
    Then I should get an InvalidArgumentException
    And the error message should be "Both integers must be non-negative."

  Scenario: Attempting to combine with both integers negative
    Given I have the first integer -5
    And I have the second integer -10
    When I try to combine the integers
    Then I should get an InvalidArgumentException
    And the error message should be "Both integers must be non-negative."