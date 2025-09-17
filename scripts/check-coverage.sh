#!/bin/bash

# Script to check if PHPUnit coverage meets 100% requirement
# This script parses PHPUnit coverage output and fails if coverage is not 100%

echo "🔍 Checking code coverage..."

# Run PHPUnit with coverage and capture output
coverage_output=$(XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-text --colors=never 2>&1)
echo "$coverage_output"

# Extract coverage percentage - look for "Lines:" followed by percentage
line_coverage=$(echo "$coverage_output" | grep -oP 'Lines:\s+\K[\d.]+(?=%)' | tail -1)

if [ -z "$line_coverage" ]; then
    echo "❌ Could not extract coverage percentage from output"
    exit 1
fi

echo "📊 Line coverage detected: $line_coverage%"

# Check if coverage is exactly 100%
if [ "$line_coverage" = "100.00" ] || [ "$line_coverage" = "100" ]; then
    echo "✅ Code coverage requirement met: $line_coverage% = 100%"
    exit 0
else
    echo "❌ Code coverage requirement NOT met: $line_coverage% (required: 100%)"
    echo "🔧 Please ensure all code paths are covered by tests"
    exit 1
fi