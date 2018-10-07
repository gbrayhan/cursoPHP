<?php 
	// Sistema de Errores Only Develop
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once '../vendor/autoload.php';

	use Aura\Router\RouterContainer;
	use Illuminate\Database\Capsule\Manager as Capsule;

	$capsule = new Capsule;
	$capsule->addConnection([
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'cursophp',
		'username'  => 'root',
		'password'  => '',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	]);
	// Make this Capsule instance available globally via static methods... (optional)
	$capsule->setAsGlobal();
	// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
	$capsule->bootEloquent();


	$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
		$_SERVER,
		$_GET,
		$_POST,
		$_COOKIE,
		$_FILES
	);
	
	// var_dump($request->getUri()->getPath());
	
	$routerContainer = new RouterContainer();

	$map = $routerContainer->getMap(); 
	$map->get('index','/', [
		'controller' => 'App\Controllers\IndexController',
		'action' => 'indexAction'
	]);
	$map->get('addJob','/job/add','../addJob.php');

	$matcher = $routerContainer->getMatcher();

	$route = $matcher->match($request);

	if (!$route) {
		echo "No route";
	} else {
		$handlerData = $route->handler;

		var_dump($handlerData);

		$controllerName = $handlerData['controller'];
		$actionName = $handlerData['action'];

		$controller = new $controllerName;

		$controller->$actionName();

		
	}
	
	
	

?>