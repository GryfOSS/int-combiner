Feature: Advanced Integer Combination Scenarios
  As a mathematician or advanced developer
  I want to verify complex integer combination behaviors
  So that I can trust the mathematical correctness of the operations

  Background:
    Given I have the IntCombiner class available

  Scenario: Digit counting verification
    Given I have various integers with different digit counts
    When I combine them systematically
    Then the digit positioning should be mathematically correct

  Scenario Outline: Verifying digit count logic
    Given I have the first integer <first>
    And I have the second integer <second>
    When I combine the integers
    Then the result should have <expected_digits> digits
    And the result should be <expected>

    Examples:
      | first | second | expected | expected_digits |
      | 1     | 1      | 11       | 2              |
      | 10    | 1      | 101      | 3              |
      | 1     | 10     | 110      | 3              |
      | 100   | 1      | 1001     | 4              |
      | 1     | 100    | 1100     | 4              |
      | 999   | 999    | 999999   | 6              |

  Scenario: Mathematical properties validation
    Given I want to validate mathematical properties
    When I combine integers following mathematical rules
    Then the results should preserve integer arithmetic properties

  Scenario Outline: Boundary value testing
    Given I have boundary value integers
    When I combine <first> and <second>
    Then the result <expected> should respect boundary conditions

    Examples:
      | first | second | expected |
      | 1     | 9      | 19       |
      | 9     | 1      | 91       |
      | 10    | 9      | 109      |
      | 9     | 10     | 910      |
      | 99    | 1      | 991      |
      | 1     | 99     | 199      |

  Scenario: Performance validation with large numbers
    Given I have large integers for performance testing
    When I combine very large numbers
    Then the operation should complete efficiently
    And the result should be mathematically accurate

  Scenario Outline: Large number combinations
    Given I have the first integer <first>
    And I have the second integer <second>
    When I combine the integers
    Then the result should be <expected>

    Examples:
      | first   | second  | expected      |
      | 123456  | 789012  | 123456789012  |
      | 1000000 | 1       | 10000001      |
      | 1       | 1000000 | 11000000      |
      | 999999  | 111111  | 999999111111  |

  Scenario: Zero handling comprehensive test
    Given I need to test all zero-related scenarios
    When I test various combinations with zero
    Then all zero cases should behave correctly

  Scenario Outline: Zero edge cases
    Given I have the first integer <first>
    And I have the second integer <second>
    When I combine the integers
    Then the result should be <expected>
    And the mathematical logic should be "<logic>"

    Examples:
      | first | second | expected | logic                    |
      | 0     | 0      | 0        | 0 * 10 = 0              |
      | 5     | 0      | 50       | 5 * 10 = 50             |
      | 10    | 0      | 100      | 10 * 10 = 100           |
      | 0     | 5      | 5        | 0 * 10^1 + 5 = 5        |
      | 0     | 123    | 123      | 0 * 10^3 + 123 = 123    |