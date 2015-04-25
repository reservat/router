<?php

namespace Reservat\Router;

class Router
{
	protected $driver = null;

    public function __construct($driver = 'Klein')
    {

        $driver = '\Reservat\Router\Drivers\\' . $driver;

        if (!class_exists($driver)) {
            throw new \InvalidArgumentException('The Driver ' . $driver . ' could not be found');
        }

        $this->driver = new $driver();

        return $this;

    }

    public function get($uri, $handler, $params)
    {
    	$this->driver->get($uri, $handler, $params);
    }

    public function put($uri, $handler, $params)
    {
    	$this->driver->put($uri, $handler, $params);
    }

    public function delete($uri, $handler, $params)
    {
    	$this->driver->delete($uri, $handler, $params);
    }

    public function post($uri, $handler, $params)
    {
    	$this->driver->post($uri, $handler, $params);
    }

    public function getProvider()
    {
    	return $this->driver->getProvider();
    }

}
