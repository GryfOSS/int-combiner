# IntCombiner

![Tests](https://github.com/GryfOSS/int-combiner/workflows/Tests%20and%20Coverage/badge.svg)
![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-blue)
![Coverage](https://img.shields.io/badge/Coverage-100%25-brightgreen)

Allows easy concatenation of ints without conversion through strings.

## Installation

```bash
composer install
```

## Usage

```php
use GryfOSS\Formatter\IntCombiner;

// Combine two positive integers
$result = IntCombiner::combine(123, 456); // Returns: 123456

// Handle edge case where second number is zero
$result = IntCombiner::combine(123, 0); // Returns: 1230 (123 * 10)

// Both numbers must be non-negative
IntCombiner::combine(-1, 5); // Throws InvalidArgumentException
```

## Testing

This project includes comprehensive testing with both **PHPUnit** (unit tests) and **Behat** (behavior-driven testing) to ensure 100% code coverage and validate all behavioral scenarios.

### Unit Testing with PHPUnit

Run PHPUnit tests with the following commands:

```bash
# Run unit tests
composer test

# Run tests with coverage report
composer test-coverage

# Generate HTML coverage report
composer test-coverage-html
```

### Behavior-Driven Testing with Behat

Run Behat tests to validate behavioral scenarios:

```bash
# Run all Behat scenarios
composer behat

# Dry run to validate feature files
composer behat-dry

# Run both PHPUnit and Behat tests
composer test-all
```

### Test Coverage Details

**PHPUnit Unit Tests** cover:
- ✅ Normal integer combination scenarios
- ✅ Edge case when second number is zero (special multiplication logic)
- ✅ Edge case when first number is zero
- ✅ Single digit and multi-digit number combinations
- ✅ Large number combinations
- ✅ Error handling for negative numbers (both first and second parameter)
- ✅ Digit counting logic verification (log10 calculations)
- ✅ Power of 10 calculations for proper concatenation
- ✅ Boundary conditions and edge cases

**Behat BDD Scenarios** cover:
- 🎯 **43 scenarios** with **220 steps** testing real-world usage patterns
- 🔍 **Mathematical properties validation** with digit counting verification
- ⚡ **Performance testing** with large number combinations
- 🚫 **Error scenarios** with comprehensive exception handling
- 📊 **Boundary value testing** with edge cases
- 🧮 **Advanced mathematical logic verification** with documented formulas

### Continuous Integration

This project includes a comprehensive GitHub Actions workflow that:

- ✅ **Multi-PHP Testing** - Tests on PHP 8.2, 8.3, and 8.4
- 🧪 **Unit Tests** - Runs PHPUnit tests with Xdebug coverage
- 🎯 **Feature Tests** - Executes all Behat BDD scenarios
- 📊 **Coverage Enforcement** - **Fails if coverage is not 100%**
- 🔍 **Code Quality** - Validates composer files and project structure
- 🚀 **Codecov Integration** - Optional coverage reporting

### Local CI Testing

```bash
# Run the same checks as GitHub Actions locally
composer ci-local

# Or individual steps
composer validate --strict    # Validate composer.json
composer check-coverage       # Verify 100% coverage requirement
composer behat                # Run feature tests
```

**Current Coverage: 100% (1/1 classes, 1/1 methods, 6/6 lines)**

## Contributing

We welcome contributions from everyone! Whether you want to report a bug, suggest a feature, or submit code improvements, your input is valuable.

### How to Contribute

#### 🐛 **Report Issues**
- Found a bug? [Open an issue](https://github.com/GryfOSS/int-combiner/issues/new)
- Include steps to reproduce and expected vs actual behavior
- Provide PHP version and relevant environment details

#### 💡 **Suggest Features**
- Have an idea for improvement? [Create a feature request](https://github.com/GryfOSS/int-combiner/issues/new)
- Explain the use case and expected behavior
- Consider backward compatibility implications

#### 🔧 **Submit Pull Requests**
- Fork the repository and create a feature branch
- Make your changes with appropriate tests
- Ensure **100% test coverage is maintained**
- Run `composer ci-local` to verify all checks pass
- Submit a pull request with clear description of changes

### Development Guidelines

- **All code must have 100% test coverage** (both PHPUnit and Behat scenarios)
- Follow existing code style and conventions
- Add tests for new functionality or bug fixes
- Update documentation as needed
- Ensure all GitHub Actions checks pass

### Questions or Discussion

- Open an [issue](https://github.com/GryfOSS/int-combiner/issues) for questions
- Tag with appropriate labels (question, enhancement, bug, etc.)

Every contribution, no matter how small, helps improve the project for everyone! 🎉