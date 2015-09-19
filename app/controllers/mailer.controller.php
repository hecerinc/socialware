<?php

//POST routes
$app->post('/mailer', $authenticate($app, 'guest'), function() use ($app){
	$post = (object)$app->request()->post();
	$from = $post->from;
	$to = $post->to;
    $subject = $post->subject;
    $message = $post->message;
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = wordwrap($message, 70);
    // send mail
    mail($to,$subject,$message,"From: $from\n");
});

?>