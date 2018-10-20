<?php 
	// Sistema de Errores Only Develop
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once '../vendor/autoload.php';

	session_start();

	use Aura\Router\RouterContainer;
	use Illuminate\Database\Capsule\Manager as Capsule;

	//Usamos encapsulacion de datos privador
	$dotenv = new Dotenv\Dotenv(__DIR__.'/..');//Concatenacion
	$dotenv->load();

	
	$capsule = new Capsule;
	$capsule->addConnection([
		'driver'    => 'mysql',
		'host'      => getenv('DB_HOST'),
		'database'  => getenv('DB_NAME'),
		'username'  => getenv('DB_USER'),
		'password'  => getenv('DB_PASSWORD'),
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
	$map->get('addJob','/job/add',[
		'controller' => 'App\Controllers\JobController',
		'action' => 'getAddJobAction',
		'auth' => true
	]);
	$map->post('saveJob','/job/add',[
		'controller' => 'App\Controllers\JobController',
		'action' => 'postAddJobAction',
		'auth' => true
	]);
	$map->get('addUser','/user/add',[
		'controller' => 'App\Controllers\UserController',
		'action' => 'getAddUserAction',
		'auth' => true

	]);
	$map->post('saveUser','/user/add',[
		'controller' => 'App\Controllers\UserController',
		'action' => 'postAddUserAction',
		'auth' => true
	]);

	$map->get('loginForm','/login',[
		'controller' => 'App\Controllers\AuthController',
		'action' => 'getLogin'
	]);
	$map->post('auth','/auth',[
		'controller' => 'App\Controllers\AuthController',
		'action' => 'postLogin'
	]);
	$map->get('logout','/logout',[
		'controller' => 'App\Controllers\AuthController',
		'action' => 'getLogout'
	]);

	$map->get('admin','/admin',[
		'controller' => 'App\Controllers\AdminController',
		'action' => 'getIndex',
		'auth' => true
	]);
	$map->get('userData','/user/{id}',[
		'controller' => 'App\Controllers\AdminController',
		'action' => 'getUserData',
		'auth' => true
	]);
	

	$matcher = $routerContainer->getMatcher();
	$route = $matcher->match($request);


	if (!$route) {
		echo "No route";
	} else {
		$handlerData = $route->handler;
		// var_dump($handlerData);

		$needsAuth = $handlerData['auth'] ?? false; // si no esta definido asgna FALSE
		$sessionUserId = $_SESSION['userId'] ?? null; // si no esta definido asgna NULL

		if ($needsAuth && !$sessionUserId) {
			// echo "Ruta Protegida";
			$controllerName = 'App\Controllers\AuthController';
			$actionName = 'getLogout' ;
			
		} else{
			$controllerName = $handlerData['controller'];
			$actionName = $handlerData['action'];
		}
		 
		// Obtiene los atributos que se envian en la ruta ej. /ruta/{param}
		foreach ($route->attributes as $key => $val) {
   			$request = $request->withAttribute($key, $val);
		}	

		$controller = new $controllerName;
		$response = $controller->$actionName($request);// Peticion $Response

		foreach ($response->getHeaders() as $name => $values) {
			foreach ($values as $value) {
				header(sprintf('%s: %s', $name, $value), false);
			}
		}
		http_response_code($response->getStatusCode());

		//Enviamos la respuesta al Cliente PSR7
		echo $response->getBody();
	}
		

?>