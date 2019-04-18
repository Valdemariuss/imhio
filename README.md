# Development

Up server with PHP on /web directory

# Unit test

```bash
cd unit-tests
composer install
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/EmailControllerTest
```