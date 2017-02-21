<?php

  function csrf_token() {
    // Requires PHP 7 or later
    return bin2hex(random_bytes(64));
  }

  function create_csrf_token() {
    $token = csrf_token();
    $_SESSION['csrf_token'] = $token;
    error_log('create_csrf_token method ' . $_SESSION['csrf_token']);
    $_SESSION['csrf_token_time'] = time();
    return $token;
  }

  function csrf_token_tag() {
    $token = create_csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . $token . '">';
  }

  function csrf_token_is_valid() {
    error_log('csrf_token_is_valid_method');
    error_log($_POST['csrf_token']);
    if(!isset($_POST['csrf_token'])) { return false; }
    error_log($_SESSION['csrf_token']);
    if(!isset($_SESSION['csrf_token'])) { return false; }
    return ($_POST['csrf_token'] === $_SESSION['csrf_token']);
  }

  // Determines if the form token should be considered "recent"
  // by comparing it to the time a token was last generated.
  function csrf_token_is_recent() {
    return (isset($_SESSION['csrf_token_time']) && $_SESSION['csrf_token_time'] > time() - 10 * 60);
  }

?>
