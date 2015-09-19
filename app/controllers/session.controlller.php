<?php

//GET routes

$app->get("/logout", function () use ($app) {
  $env = $app->environment();
 	unset($_SESSION['user']);
 	$app->view()->setData('user', null);
 	$app->redirect($env['rootUri']);
});

$app->get("/login", function () use ($app) {


  if (isset($_SESSION['urlRedirect'])) {
     $urlRedirect = $_SESSION['urlRedirect'];
  }

  $app->render('login.html.twig');

});

//POST routes

$app->post("/login", function () use ($app) {
	$env = $app->environment();

	$post = (object)$app->request()->post();

	$usuario 		= $post->usuario;
	$password 	=	$post->password;

	$errors = array();

	/*
	*	Logica de login
	*/

  $user = R::findOne('user',' username = :param ',
             array(':param' => $usuario )
           );

	  if (!$user) {
        $errors['usuario'] = "Usuario no registrado.";
    } else if (md5($password) != $user->password) {
        $app->flash('email', $email);
        $errors['password'] = "Password incorrecto.";
    }

    if (count($errors) > 0) {
        $app->flash('errors', $errors);
        $app->redirect('/login');
    }

    $_SESSION['user']   = $usuario;
    $_SESSION['role']   = $user->role;
    $_SESSION['nombre'] = $user->username;

  	if (isset($_SESSION['urlRedirect'])) {
       	$tmp = $_SESSION['urlRedirect'];
       	unset($_SESSION['urlRedirect']);
       	$app->redirect($env['rootUri'].substr($tmp,1));
    }

    $app->redirect("/admin");

});

?>
