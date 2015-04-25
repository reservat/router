<?php

namespace Reservat\Router\Container;

class RouteParameters
{

	public $req = null;
	public $res = null;
	public $ext = null;

	public function __construct($req, $res, ...$ext)
	{
		$this->req = $req;
		$this->res = $res;
		$this->ext = array_splice($ext, 0, 2);
	}

}