<?php

//GET route
$app->get('/', function () use ($app) {
	$app->render('index.html.twig');
})->name('home');

$app->get('/acercade', function () use ($app) {
	$app->render('acercade.html.twig');
})->name('aboutUs');

$app->get('/noticias', function() use($app){
	$app->render('news.html.twig');
})->name('news');

$app->get('/juegos', function() use($app){
	$app->render('games.html.twig');
})->name('games');

$app->get('/videos', function() use($app){
	$app->render('videos.html.twig');
})->name('videos');

$app->get('/init', function() use($app){
	$user = R::dispense("user");
	$user->username = "admin";
	$user->role = "admin";
	$user->password = md5("123456");
	R::store($user);
	
	echo "DONE!";
})->name('init');

//POST route

//PUT route

//DELETE route

//OPTIONS route

//PATCH route

?>
