<?php
$to = $_POST['email'];
$subject = 'test mail its';
$body = 'The email body content test mail ok';
$headers = array('Content-Type: text/html; charset=UTF-8');

wp_mail( $to, $subject, $body, $headers );
