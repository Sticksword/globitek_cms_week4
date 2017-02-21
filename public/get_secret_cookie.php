<?php

function decrypt($message) {
  define("CIPHER_METHOD", "AES-256-CBC");

  // $message = 'LmnhW5OjbciSmcmmlrsTyHwSkRQgqSUitfZtJBXLUl4+ZFp9vDVQ6hFI9jJ0g6ru';
  $key = 'a1b2c3d4e5';

  // Needs a key of length 32 (256-bit)
  $key = str_pad($key, 32, '*');

  // Base64 decode before decrypting
  $iv_with_ciphertext = base64_decode($message);

  // Separate initialization vector and encrypted string
  $iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
  $iv = substr($iv_with_ciphertext, 0, $iv_length);
  $ciphertext = substr($iv_with_ciphertext, $iv_length);

  // Decrypt
  $plaintext = openssl_decrypt($ciphertext, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);

  return $plaintext;
  // This is a secret.
}

?>
