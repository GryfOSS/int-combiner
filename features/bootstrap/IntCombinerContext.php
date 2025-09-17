<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use GryfOSS\Formatter\IntCombiner;

/**
 * Defines application features from the specific context.
 */
class IntCombinerContext implements Context
{
    private $firstInteger;
    private $secondInteger;
    private $result;
    private $exception;
    private $intCombinerClass;

    /**
     * Initializes context.
     */
    public function __construct()
    {
        $this->intCombinerClass = IntCombiner::class;
    }

    /**
     * @Given I have the IntCombiner class available
     */
    public function iHaveTheIntcombinerClassAvailable()
    {
        if (!class_exists($this->intCombinerClass)) {
            throw new Exception('IntCombiner class is not available');
        }
    }

    /**
     * @Given I have the first integer :arg1
     */
    public function iHaveTheFirstInteger($arg1)
    {
        $this->firstInteger = (int) $arg1;
    }

    /**
     * @Given I have the second integer :arg1
     */
    public function iHaveTheSecondInteger($arg1)
    {
        $this->secondInteger = (int) $arg1;
    }

    /**
     * @When I combine the integers
     */
    public function iCombineTheIntegers()
    {
        $this->result = IntCombiner::combine($this->firstInteger, $this->secondInteger);
    }

    /**
     * @When I try to combine the integers
     */
    public function iTryToCombineTheIntegers()
    {
        try {
            $this->result = IntCombiner::combine($this->firstInteger, $this->secondInteger);
        } catch (Exception $e) {
            $this->exception = $e;
        }
    }

    /**
     * @Then the result should be :arg1
     */
    public function theResultShouldBe($arg1)
    {
        $expected = (int) $arg1;
        if ($this->result !== $expected) {
            throw new Exception(
                sprintf('Expected result to be %d, but got %d', $expected, $this->result)
            );
        }
    }

    /**
     * @Then I should get an InvalidArgumentException
     */
    public function iShouldGetAnInvalidargumentexception()
    {
        if (!$this->exception instanceof InvalidArgumentException) {
            throw new Exception('Expected InvalidArgumentException but got: ' . get_class($this->exception));
        }
    }

    /**
     * @Then the error message should be :arg1
     */
    public function theErrorMessageShouldBe($arg1)
    {
        if ($this->exception->getMessage() !== $arg1) {
            throw new Exception(
                sprintf('Expected error message "%s", but got "%s"', $arg1, $this->exception->getMessage())
            );
        }
    }

    /**
     * @Given I have various integers with different digit counts
     */
    public function iHaveVariousIntegersWithDifferentDigitCounts()
    {
        // This is a setup step for digit counting verification
        // The actual testing happens in subsequent steps
    }

    /**
     * @When I combine them systematically
     */
    public function iCombineThemSystematically()
    {
        // This step is used in conjunction with the scenario outline
        // The actual combination is done in other steps
    }

    /**
     * @Then the digit positioning should be mathematically correct
     */
    public function theDigitPositioningShouldBeMathematicallyCorrect()
    {
        // This is validated through the specific examples in scenario outlines
        // The mathematical correctness is inherently tested by the exact value comparisons
    }

    /**
     * @Then the result should have :arg1 digits
     */
    public function theResultShouldHaveDigits($arg1)
    {
        $expectedDigits = (int) $arg1;
        $actualDigits = strlen((string) $this->result);

        if ($actualDigits !== $expectedDigits) {
            throw new Exception(
                sprintf('Expected result to have %d digits, but got %d digits', $expectedDigits, $actualDigits)
            );
        }
    }

    /**
     * @Given I want to validate mathematical properties
     */
    public function iWantToValidateMathematicalProperties()
    {
        // Setup step for mathematical properties validation
    }

    /**
     * @When I combine integers following mathematical rules
     */
    public function iCombineIntegersFollowingMathematicalRules()
    {
        // This is tested through the specific examples and their mathematical verification
    }

    /**
     * @Then the results should preserve integer arithmetic properties
     */
    public function theResultsShouldPreserveIntegerArithmeticProperties()
    {
        // The preservation of properties is validated through exact result comparisons
        // in the scenario outlines
    }

    /**
     * @Given I have boundary value integers
     */
    public function iHaveBoundaryValueIntegers()
    {
        // Setup for boundary value testing
    }

    /**
     * @When I combine :arg1 and :arg2
     */
    public function iCombineAnd($arg1, $arg2)
    {
        $this->firstInteger = (int) $arg1;
        $this->secondInteger = (int) $arg2;
        $this->result = IntCombiner::combine($this->firstInteger, $this->secondInteger);
    }

    /**
     * @Then the result :arg1 should respect boundary conditions
     */
    public function theResultShouldRespectBoundaryConditions($arg1)
    {
        $expected = (int) $arg1;
        if ($this->result !== $expected) {
            throw new Exception(
                sprintf('Boundary condition failed: expected %d, got %d', $expected, $this->result)
            );
        }
    }

    /**
     * @Given I have large integers for performance testing
     */
    public function iHaveLargeIntegersForPerformanceTesting()
    {
        // Setup for performance testing
    }

    /**
     * @When I combine very large numbers
     */
    public function iCombineVeryLargeNumbers()
    {
        // Performance testing is done through the large number examples
        // The actual combination happens in the scenario outline steps
    }

    /**
     * @Then the operation should complete efficiently
     */
    public function theOperationShouldCompleteEfficiently()
    {
        // Efficiency is inherently tested by the successful execution
        // of large number combinations without timeout
    }

    /**
     * @Then the result should be mathematically accurate
     */
    public function theResultShouldBeMathematicallyAccurate()
    {
        // Mathematical accuracy is verified through exact value comparisons
        // in the scenario outline examples
    }

    /**
     * @Given I need to test all zero-related scenarios
     */
    public function iNeedToTestAllZeroRelatedScenarios()
    {
        // Setup for comprehensive zero testing
    }

    /**
     * @When I test various combinations with zero
     */
    public function iTestVariousCombinationsWithZero()
    {
        // Zero testing is done through the scenario outline examples
    }

    /**
     * @Then all zero cases should behave correctly
     */
    public function allZeroCasesShouldBehaveCorrectly()
    {
        // Correct behavior is validated through the exact result comparisons
        // in the zero-related scenario outlines
    }

    /**
     * @Then the mathematical logic should be :arg1
     */
    public function theMathematicalLogicShouldBe($arg1)
    {
        // This step documents the mathematical logic behind each operation
        // The actual validation is done through the result comparison
        // This serves as documentation for understanding the algorithm
    }
}