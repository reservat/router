<?php

namespace Reservat\Router\Drivers;

use Reservat\Router\Interfaces\DriverInterface;
use Reservat\Router\Container\RouteParameters;

class Klein implements DriverInterface
{

	protected $klein;

	public function __construct()
	{
		$this->klein = new \Klein\Klein();
	}

	public function get($uri, $handler, $params)
	{	
		$this->klein->respond('GET', $uri, function($req, $res, $service, $app) use($handler){
			$handler(new RouteParameters($req, $res, $service, $app));
		});
	}

	public function post($uri, $handler, $params)
	{
		
	}

	public function put($uri, $handler, $params)
	{
		
	}

	public function delete($uri, $handler, $params)
	{
		
	}

	public function getProvider()
	{
		return $this->klein;
	}

}