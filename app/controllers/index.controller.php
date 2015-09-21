<?php

//GET route
$app->get('/', function () use ($app) {
	$app->render('index.html.twig');
	$env = $app->environment();
	unset($env['properties']['slim.flash']['app']['container']['data']['settings']['view']);
	ob_start();
	var_dump($env);
	$dump = ob_get_clean();
	// $self = $_SERVER['PHP_SELF'];
	file_put_contents('./uridump2.txt', $dump);
	// var_dump($self); echo "<br>";
	// var_dump(dirname($self));
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

//POST route

//PUT route

//DELETE route

//OPTIONS route

//PATCH route

?>
