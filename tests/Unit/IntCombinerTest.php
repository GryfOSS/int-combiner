<?php

namespace GryfOSS\Formatter\Tests\Unit;

use GryfOSS\Formatter\IntCombiner;
use PHPUnit\Framework\TestCase;

class IntCombinerTest extends TestCase
{
    /**
     * Test combining two positive integers - normal case
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testCombinePositiveIntegers(): void
    {
        // Test basic combination
        $result = IntCombiner::combine(12, 34);
        $this->assertEquals(1234, $result);

        // Test with different digit counts
        $result = IntCombiner::combine(1, 2);
        $this->assertEquals(12, $result);

        $result = IntCombiner::combine(123, 456);
        $this->assertEquals(123456, $result);

        $result = IntCombiner::combine(5, 789);
        $this->assertEquals(5789, $result);
    }

    /**
     * Test combining integers when first number is zero
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testCombineWithFirstNumberZero(): void
    {
        $result = IntCombiner::combine(0, 123);
        $this->assertEquals(123, $result);

        $result = IntCombiner::combine(0, 5);
        $this->assertEquals(5, $result);
    }

    /**
     * Test edge case when second number is zero
     * This tests the special condition: if ($b === 0)
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testCombineWithSecondNumberZero(): void
    {
        $result = IntCombiner::combine(123, 0);
        $this->assertEquals(1230, $result); // a * 10

        $result = IntCombiner::combine(5, 0);
        $this->assertEquals(50, $result); // a * 10

        $result = IntCombiner::combine(0, 0);
        $this->assertEquals(0, $result); // 0 * 10 = 0
    }

    /**
     * Test combining with single digit numbers
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testCombineSingleDigitNumbers(): void
    {
        $result = IntCombiner::combine(1, 2);
        $this->assertEquals(12, $result);

        $result = IntCombiner::combine(9, 8);
        $this->assertEquals(98, $result);

        $result = IntCombiner::combine(0, 7);
        $this->assertEquals(7, $result);
    }

    /**
     * Test combining with multi-digit numbers
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testCombineMultiDigitNumbers(): void
    {
        $result = IntCombiner::combine(12, 345);
        $this->assertEquals(12345, $result);

        $result = IntCombiner::combine(1000, 2000);
        $this->assertEquals(10002000, $result);

        $result = IntCombiner::combine(999, 111);
        $this->assertEquals(999111, $result);
    }

    /**
     * Test large numbers to ensure proper handling
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testCombineLargeNumbers(): void
    {
        $result = IntCombiner::combine(12345, 67890);
        $this->assertEquals(1234567890, $result);

        $result = IntCombiner::combine(100000, 999999);
        $this->assertEquals(100000999999, $result);
    }

    /**
     * Test exception when first number is negative
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testThrowsExceptionWhenFirstNumberIsNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Both integers must be non-negative.');

        IntCombiner::combine(-1, 5);
    }

    /**
     * Test exception when second number is negative
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testThrowsExceptionWhenSecondNumberIsNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Both integers must be non-negative.');

        IntCombiner::combine(5, -1);
    }

    /**
     * Test exception when both numbers are negative
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testThrowsExceptionWhenBothNumbersAreNegative(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Both integers must be non-negative.');

        IntCombiner::combine(-5, -10);
    }

    /**
     * Test digit counting logic with various numbers
     * This ensures the log10 calculation works correctly
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testDigitCountingLogic(): void
    {
        // Single digit (1 digit): log10(1) = 0, floor(0) + 1 = 1
        $result = IntCombiner::combine(100, 1);
        $this->assertEquals(1001, $result);

        // Two digits (10): log10(10) = 1, floor(1) + 1 = 2
        $result = IntCombiner::combine(100, 10);
        $this->assertEquals(10010, $result);

        // Three digits (100): log10(100) = 2, floor(2) + 1 = 3
        $result = IntCombiner::combine(100, 100);
        $this->assertEquals(100100, $result);

        // Four digits (1000): log10(1000) = 3, floor(3) + 1 = 4
        $result = IntCombiner::combine(100, 1000);
        $this->assertEquals(1001000, $result);
    }

    /**
     * Test power of 10 calculation with various scenarios
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testPowerOfTenCalculation(): void
    {
        // 10^1 = 10 (for single digit b)
        $result = IntCombiner::combine(5, 7);
        $this->assertEquals(57, $result);

        // 10^2 = 100 (for two digit b)
        $result = IntCombiner::combine(5, 77);
        $this->assertEquals(577, $result);

        // 10^3 = 1000 (for three digit b)
        $result = IntCombiner::combine(5, 777);
        $this->assertEquals(5777, $result);
    }

    /**
     * Test boundary conditions
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testBoundaryConditions(): void
    {
        // Test with minimum valid values
        $result = IntCombiner::combine(0, 1);
        $this->assertEquals(1, $result);

        // Test numbers that are powers of 10 minus 1
        $result = IntCombiner::combine(9, 9);
        $this->assertEquals(99, $result);

        $result = IntCombiner::combine(99, 99);
        $this->assertEquals(9999, $result);

        // Test numbers that are powers of 10
        $result = IntCombiner::combine(10, 10);
        $this->assertEquals(1010, $result);

        $result = IntCombiner::combine(100, 100);
        $this->assertEquals(100100, $result);
    }

    /**
     * Test overflow exception when result exceeds PHP_INT_MAX
     *
     * @covers GryfOSS\Formatter\IntCombiner::combine
     */
    public function testThrowsOverflowExceptionWhenResultExceedsMaxLimit(): void
    {
        $this->expectException(\OverflowException::class);
        $this->expectExceptionMessage('The combined integer exceeds the maximum limit.');

        // Use large numbers that when combined will exceed PHP_INT_MAX
        // PHP_INT_MAX is typically 9223372036854775807 on 64-bit systems
        // Let's use numbers that will definitely cause overflow
        $largeA = PHP_INT_MAX;
        $largeB = 1;

        IntCombiner::combine($largeA, $largeB);
    }
}