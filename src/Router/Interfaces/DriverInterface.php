<?php

namespace Reservat\Router\Interfaces;

interface DriverInterface {

	public function get($uri, $handler, $params);
	public function post($uri, $handler, $params);
	public function put($uri, $handler, $params);
	public function delete($uri, $handler, $params);

}