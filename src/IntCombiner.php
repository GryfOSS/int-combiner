<?php

namespace GryfOSS\Formatter;

class IntCombiner
{
    public static function combine(int $a, int $b) : int {
        if ($a < 0 || $b < 0) {
            throw new \InvalidArgumentException('Both integers must be non-negative.');
        }

        if ($b === 0) {
            //edge case
            return $a * 10;
        }
        $numDigits = floor(log10($b)) + 1; // Count the digits in the second integer
        $result = $a * (10 ** $numDigits) + $b; // Shift the first integer and add the second
        if ($result < 0 || $result > PHP_INT_MAX) {
            throw new \OverflowException('The combined integer exceeds the maximum limit.');
        }

        return intval($result);
    }
}