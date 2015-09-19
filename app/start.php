<?php

/*
|--------------------------------------------------------------------------
| Crear instancia del SLIM
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Slim application instance
| which serves as the "glue" for all the components of RedSlim.
|
*/

\Slim\Slim::registerAutoloader();

// Instantiate application
$app = new \Slim\Slim(require_once ROOT . 'app/config/app.php');
//Nombre del sitio:
$app->setName('Site-Template');


// For native PHP session
session_cache_limiter(false);
session_start();

// For encrypted cookie session 
//*/
$app->add(new \Slim\Middleware\SessionCookie(array(
            'expires' => '20 minutes',
            'path' => '/',
            'domain' => null,
            'secure' => false,
            'httponly' => false,
            'name' => 'app_session_name',
            'secret' => md5('site-template'),
            'cipher' => MCRYPT_RIJNDAEL_256,
            'cipher_mode' => MCRYPT_MODE_CBC
        )));
//*/

/*
|--------------------------------------------------------------------------
| Autenticacion de usuarios
|--------------------------------------------------------------------------
|
| Funcion $authentitace
| Recibe:  $app, $role
|   $app:  SLIM $app
|   $role: El role o nivel del usuario
|
*/

$authenticate = function ($app, $role) {
    return function () use ($app, $role) {
        $env = $app->environment();
        if (!isset($_SESSION['user'])) {
            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
            $app->flash('danger', 'Necesitas iniciar sesion.');
            $app->redirect($env['rootUri'].'login');
        }else if($role == 'admin'){
            if($_SESSION['role']!='admin'){
                $app->flash('danger', 'Necesitas iniciar sesion como administrador.');
                $app->redirect($env['rootUri']);
            }
        }
    };
};


//crea variable $user y se la agrega a todos los views para facil deteccion de sesiones
$app->hook('slim.before.dispatch', function() use ($app) { 
   $user = Array();
   if (isset($_SESSION['user'])) {
        $user['email']=$_SESSION['user'];
        $user['nombre']=$_SESSION['nombre'];
   }
   $app->view()->setData('user', $user);
});

/*
 * SET some globally available view data
 */
$resourceUri = $_SERVER['REQUEST_URI'];
//Uri del sitio desde el root del dominio
$rootUri = '/';
//Uri de los contenidos publicos
$assetUri = $rootUri.'web/';

$env = $app->environment();
$env['rootUri'] = $rootUri;

$app->view()->appendData(
		array(		'app' => $app,
				'rootUri' => $rootUri,
				'assetUri' => $assetUri,
				'resourceUri' => $resourceUri
));

foreach(glob(ROOT . 'app/controllers/*.php') as $router) {
	include $router;
}

/*
|--------------------------------------------------------------------------
| Configure Twig
|--------------------------------------------------------------------------
|
| The application uses Twig as its template engine. This script configures 
| the template paths and adds some extensions.
|
*/

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => ROOT . 'app/storage/cache/twig',
    'auto_reload' => true,
    //'strict_variables' => true
);


// $view->parserExtensions = array(
//     new \Slim\Views\TwigExtension(),
// );

/*
|--------------------------------------------------------------------------
| Create Redbean DAO
|--------------------------------------------------------------------------
|
| Create the loader class R to read the connection parameters and setup
| the connection.
|
*/
//Cambiar el archivo database.example.php a database.php y ajustar valores
require_once ROOT . 'app/config/database.php';

// Disable fluid mode in production environment
$app->configureMode(SLIM_MODE_PRO, function () use ($app) {
    // note, transactions will be auto-committed in fluid mode
    R::freeze(true);  
});
      

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
