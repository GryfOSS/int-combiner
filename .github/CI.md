# Continuous Integration

This project uses GitHub Actions for continuous integration with the following features:

## Workflow Features

### 🧪 **Test Matrix**
- Runs on **Ubuntu Latest**
- Tests **PHP 8.2, 8.3, and 8.4**
- Uses **Xdebug** for coverage collection

### ✅ **Quality Gates**

1. **Unit Tests (PHPUnit)**
   - Runs complete test suite with coverage
   - Generates coverage reports (text + XML)
   - **Fails if any test fails**

2. **Coverage Requirement**
   - Enforces **exactly 100% line coverage**
   - Uses custom script for precise coverage validation
   - **Fails if coverage < 100%**

3. **Feature Tests (Behat)**
   - Executes all 43 BDD scenarios
   - Validates 220 test steps
   - **Fails if any scenario fails**

4. **Code Quality**
   - Validates `composer.json` with strict mode
   - Verifies all required project files exist
   - Dry-runs Behat scenarios for syntax validation

### 🚀 **Workflow Triggers**

- **Push** to `main` or `develop` branches
- **Pull Request** to `main` branch
- Manual dispatch available

### 📊 **Coverage Reporting**

- Uploads coverage to **Codecov** (optional)
- Generates local HTML coverage reports
- Preserves coverage artifacts

## Local Development

Run the exact same checks locally:

```bash
# Complete CI pipeline locally
composer ci-local

# Individual checks
composer validate --strict
composer check-coverage
composer behat
```

The workflow ensures that **every commit maintains 100% test coverage** and **all behavioral scenarios pass**.