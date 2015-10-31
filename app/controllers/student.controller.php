<?php
/*
	Admin dashboard
*/
$app->group('/student', $authenticate($app, 'student'), function() use ($app){ // Add authentication middleware
	//GET
	$app->get('/', function() use ($app){
		$app->redirect($app->urlFor('student_dashboard'));
	});
	$app->get('/dashboard', function() use ($app){
		$app->render('dashboard.html.twig', ['isAdmin' => false]);
	})->name('student_dashboard');

	$app->get('/profile', function() use ($app){
		$app->render('dashboard.html.twig', ['isAdmin' => false]);
	})->name('student_profile');

	$app->get('/settings', function() use ($app){
		$app->render('dashboard.html.twig', ['isAdmin' => false]);
	})->name('student_settings');
	//POST
	//PUT
	//DELETE
	//OPTIONS
	//PATCH
});

?>
