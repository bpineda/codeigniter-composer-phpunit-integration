# CodeIgniter, Composer, PHPUnit Integration

CodeIgniter is inherently difficult to test with PHPUnit. The same happens with dependencies included with Composer. Based on examples on [https://github.com/kenjis/ci-phpunit-test](https://github.com/kenjis/ci-phpunit-test "PHPUnit Hack") , and [http://codesamplez.com/development/composer-with-codeigniter](http://codesamplez.com/development/composer-with-codeigniter "PHPUnit Hack") I've managed to create and example testable application. 

##Setup
Upon cloning or downloading the source code, we need to do the following:

+ CD to the root application directory.

+ Install dependencies with composer 
	
		composer install
+ Run migrations for the tests suite.

		./migrate
		
+ Run migrations for the main web application. Open a brower and open the migrate controller:

		http://localhost/path-to-my-app/index.php/migrate/


+ Make sure tests run correctly with:
		
		vendor/phpunit/phpunit/phpunit
		