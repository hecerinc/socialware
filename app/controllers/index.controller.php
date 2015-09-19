<?php

//GET route
$app->get('/', function () use ($app) {
   $app->render('index.html.twig');
});

$app->get('/acercade', function () use ($app) {
   $app->render('acercade.html.twig');
});

//POST route

//PUT route

//DELETE route

//OPTIONS route

//PATCH route

?>
