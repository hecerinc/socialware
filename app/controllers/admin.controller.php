<?php
/*
	Admin dashboard
*/
$app->group('/admin', function() use ($app){ // Add authentication middleware
	//GET
	$app->get('/', function() use ($app){
		$app->redirect($app->urlFor('admin_dashboard'));
	});
	$app->get('/dashboard', function() use ($app){
		$app->render('dashboard.html.twig', ['isAdmin' => true]);
	})->name('admin_dashboard');
	//POST
	//PUT
	//DELETE
	//OPTIONS
	//PATCH
});

?>
