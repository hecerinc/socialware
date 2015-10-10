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
})->name('login');

//POST routes

$app->post("/login", function () use ($app) {
	$env = $app->environment();

	$post = (object)$app->request()->post();

	// Get variables from POST request
	$usuario = $post->usuario;
	$password =	$post->password;

	$errors = array();

	/*
	 *	Logica de login
	 */
	$user = R::findOne('user',' username = :param ', array(':param' => $usuario ));

	if (!$user) {
		$errors['usuario'] = "Usuario no registrado.";
	}
	else if (md5($password) != $user->password) { // Change this to BlowFish encryption
		$app->flash('email', $email);
		$errors['password'] = "Contraseña incorrecto.";
	}

	if (count($errors) > 0) {
		$app->flash('errors', $errors);
		return $app->redirect('login');
	}
	else{

		$_SESSION['user']   = $usuario;
		$_SESSION['role']   = $user->role;
		$_SESSION['nombre'] = $user->username;

		if (isset($_SESSION['urlRedirect'])) {
			$tmp = $_SESSION['urlRedirect'];
			unset($_SESSION['urlRedirect']);
			$app->redirect($env['rootUri'].substr($tmp,1));
		}

		$app->redirect("/admin");
	}
});

?>
