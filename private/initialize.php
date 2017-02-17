<?php

// Make sure output buffering is turned on in php.ini before
// attempting page redirects. Or else uncomment the line below.
ob_start();

// $session_name = 'muh-sess'; // Set a custom session name
// $secure = false; // Set to true if using https else leave as false
// $httponly = true; // This stops javascript being able to access the session id
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies to store session id's

// ini_set('session.cookie_secure', 1);
ini_set('session.cookie_lifetime', 86400);

// $cookieParams = session_get_cookie_params(); // Gets current cookies params.
// error_log($cookieParams['path']);
// session_set_cookie_params(86400, $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
// session_name($session_name); // Sets the session name to the one set above.
session_start(); // Start the php session
// see also: http://security.stackexchange.com/questions/24177/starting-a-secure-php-session

// $cookie->setHttpOnly(true);

// misc session question: http://stackoverflow.com/questions/5593359/where-does-session-save

session_regenerate_id(true);

// Turns off any browser built-in XSS protections
// LEAVE THIS LINE IN WHILE YOU ARE LEARNING
// We want to get punished for any XSS mistakes...
header('X-XSS-Protection: 0');

// Assign path shortcuts to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("SHARED_PATH", PRIVATE_PATH . '/shared');
define("PUBLIC_PATH", PROJECT_PATH . '/public');

// DOC_ROOT is everything in URL up to and including "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("DOC_ROOT", $doc_root);

require_once('functions.php');
require_once('database.php');
require_once('query_functions.php');
require_once('validation_functions.php');
require_once('auth_functions.php');
require_once('csrf_functions.php');

$db = db_connect();

?>
