<?php
session_start();

// Include Librari Google Client (API)
include_once 'libraries/google-client/Google_Client.php';
include_once 'libraries/google-client/contrib/Google_Oauth2Service.php';

$client_id = '467248353298-84n13cj1qaantjd7vi077kqeu20rothb.apps.googleusercontent.com'; // Google client ID
$client_secret = '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'; // Google Client Secret
$redirect_url = 'http://localhost/RPL/google.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);
?>
