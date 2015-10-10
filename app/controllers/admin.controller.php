<?php

//GET route
$app->get('/admin', $authenticate($app, 'guest'), function () use ($app) {
	$data = array();
	$data["user"] = $_SESSION["user"];
	$app->render('admin.html.twig', $data);
})->name('admin');

//POST route

//PUT route

//DELETE route

//OPTIONS route

//PATCH route

?>
