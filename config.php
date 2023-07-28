<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('58460991907-58v5kjs4qjgvrh1a1cpink84be4impgp.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://127.0.0.1:8080/udyamisahayak/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>