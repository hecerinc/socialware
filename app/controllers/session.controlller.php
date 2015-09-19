<?php

//GET routes

$app->get("/logout", function () use ($app) {
  $env = $app->environment();
 	unset($_SESSION['user']);
 	$app->view()->setData('user', null);
 	$app->redirect($env['rootUri']);
});

$app->get("/login", function () use ($app) {
	$env = $app->environment();

  $flash = $app->view()->getData('flash');

  $error = '';
  if (isset($flash['danger'])) {
     $error = $flash['danger'];
  }

  $urlRedirect = $env['rootUri'];

  if ($app->request()->get('r') && $app->request()->get('r') != '/logout' && $app->request()->get('r') != '/login') {
     $_SESSION['urlRedirect'] = $app->request()->get('r');
  }

  if (isset($_SESSION['urlRedirect'])) {
     $urlRedirect = $_SESSION['urlRedirect'];
  }

  $email_value = $email_error = $password_error = '';

  if (isset($flash['email'])) {
    $email_value = $flash['email'];
  }

  if (isset($flash['errors']['email'])) {
     $email_error = $flash['errors']['email'];
  }

  if (isset($flash['errors']['password'])) {
     $password_error = $flash['errors']['password'];
  }

  $app->render('login.html.twig', 
  	array(
  		'error' => $error, 
  		'email_value' => $email_value, 
  		'email_error' => $email_error, 
  		'password_error' => $password_error, 
  		'urlRedirect' => $urlRedirect
  	)
	);

});

//POST routes

$app->post("/login", function () use ($app) {
	$env = $app->environment();

	$post = (object)$app->request()->post();

	$email 		= 	$post->email;
	$password 	=	$post->password;

	$errors = array();

	/*
	*	Logica de login
	*/

  $user = R::findOne('user',' email = :param ',
             array(':param' => $email )
           );

	  if (!$user) {
        $errors['email'] = "Email no registrado.";
    } else if (md5($password) != $user->password) {
        $app->flash('email', $email);
        $errors['password'] = "Password incorrecto.";
    }

    if (count($errors) > 0) {
        $app->flash('errors', $errors);
        $app->redirect($env['rootUri'].'login');
    }

    $_SESSION['user']   = $email;
    $_SESSION['role']   = $user->role;
    $_SESSION['nombre'] = $user->username;

  	if (isset($_SESSION['urlRedirect'])) {
       	$tmp = $_SESSION['urlRedirect'];
       	unset($_SESSION['urlRedirect']);
       	$app->redirect($env['rootUri'].substr($tmp,1));
    }

    $app->redirect($env['rootUri']);

});

?>