<?php

// Start session
session_start();

// Set session variables: the session ID can be found in the DevTools -> Cookies: "PHPSESSID"
$_SESSION['username'] = 'john';

print_r($_SESSION);
