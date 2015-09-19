<?php

//GET routes

$app->get('/usuario/:name', $authenticate($app, 'guest'), function ($name) use ($app){

	$user = R::findOne('user',' username = :param ',
	           array(':param' => $name )
	         );
	$data;
	if($user){
		$data = array('name' => $name);
	}
	$app->view()->appendData($data);
    $app->render('usuario.html.twig');
});

$app->get('/usuario', $authenticate($app, 'guest'), function() use ($app){
	$env = $app->environment();
	$user = R::findOne('user',' username = :param ',
	           array(':param' => $_SESSION['nombre'] )
	         );

	if($user){
		if($user->role=='guest'){
			$app->redirect($env['rootUri'].'usuario/'.$user->username);
		}else{
			$app->redirect($env['rootUri'].$user->role);
		}
	}else{
		$app->flash('danger','Error. Usuario no registrado.');
		$app->redirect($env['rootUri']);
	}
});

//POST routes

$app->post('/usuario', $authenticate($app, 'admin'), function() use ($app){
	$env = $app->environment();
	$post = (object)$app->request()->post();

	$user = R::findOne('user',' email = :param ',
       	array(':param' => $post->email )
    );

	if($user){
		$app->flash('danger', 'Ya existe el usuario.' );
	}else{
		$user = R::dispense("user");
		$user->username 	= $post->username;
		$user->email 		= $post->email;
		$user->password 	= md5($post->password);

		R::store($user);

		$app->flash('success', 'Usuario: '.$user->username.' registrado exitosamente.' );
	}
	
	$app->redirect($env['rootUri']);
});

?>