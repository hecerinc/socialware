<?php
/*
	Admin dashboard
*/
$app->group('/admin', $authenticate($app, 'admin'), function() use ($app){ // Add authentication middleware
	//GET
	$app->get('/', function() use ($app){
		$app->redirect($app->urlFor('admin_dashboard'));
	});
	$app->get('/dashboard', function() use ($app){
		$app->render('dashboard.html.twig', ['isAdmin' => true]);
	})->name('admin_dashboard');
	
	$app->get('/profile', function() use ($app){
		$app->render('dashboard.html.twig', ['isAdmin' => true]);
	})->name('admin_profile');
	
	$app->get('/settings', function() use ($app){
		$app->render('dashboard.html.twig', ['isAdmin' => true]);
	})->name('admin_settings');
	//POST
	//PUT
	//DELETE
	//OPTIONS
	//PATCH
});

$app->group('/admin/users', $authenticate($app, 'admin'), function() use ($app){ // Add authentication middleware
	//GET
	$app->get('/', function() use ($app){
		$app->render('admin.users.html.twig', ['isAdmin' => true]);
	})->name('admin_all_users');
	
	$app->get('/new', function() use ($app){
		//TODO Get all users
	})->name('admin_new_user');
	
	$app->get('/:id', function($id) use ($app){
		//TODO Get user by id
	})->name('admin_get_user');
	
	//POST
	$app->post('/:id', function($id) use ($app){
		//TODO Update user
	})->name('admin_update_user');
	
	$app->post('/new', function() use ($app){
		//TODO Update user
	})->name('admin_create_user');
	
	$app->post('/delete/:id', function($id) use ($app){
		//TODO Delete user
	})->name('admin_delete_user');
});

?>
