<?php 
class paths
{
	public function __construct()
	{
		spl_autoload_register(function ($class){
			$models = './models/' . $class . '.php';
			$controllers = './controllers/' . $class . '.php';
			if( file_exists($models) )  require_once($models);
			if( file_exists($controllers) )  require_once($controllers);
		});
	}


}