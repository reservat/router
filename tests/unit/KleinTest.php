<?php

namespace Klein\Tests;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../vendor/klein/klein/tests/Klein/Tests/AbstractKleinTest.php';
require_once __DIR__ . '/../../vendor/klein/klein/tests/Klein/Tests/Mocks/MockRequestFactory.php';

use Klein\App;
use Klein\DataCollection\RouteCollection;
use Klein\Exceptions\DispatchHaltedException;
use Klein\Exceptions\HttpException;
use Klein\Exceptions\RoutePathCompilationException;
use Klein\Klein;
use Klein\Request;
use Klein\Response;
use Klein\Route;
use Klein\ServiceProvider;
use Klein\Tests\Mocks\HeadersEcho;
use Klein\Tests\Mocks\HeadersSave;
use Klein\Tests\Mocks\MockRequestFactory;

use Reservat\Router\Router;

/**
 * RoutingTest
 */
class RoutingTest extends AbstractKleinTest
{

	protected $router = null;
	protected $di = null;

	public function setUp()
	{
		$this->router = new Router('Klein');
		$this->di = ['test' => 'data'];
	}

	public function testGet()
	{
		$this->expectOutputString('data');
		$di = $this->di;

		$this->router->get('/test', function($data) use($di){
			echo $di['test'];
		}, []);

		$this->router->getProvider()->dispatch(
            MockRequestFactory::create('/test')
        );

	}

}