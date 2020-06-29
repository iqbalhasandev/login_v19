<?php

function u($string = "")
{
  return urlencode($string);
}

function raw_u($string = "")
{
  return rawurlencode($string);
}

function h($string = "")
{
  return htmlspecialchars($string);
}

function realescape($string)
{
  global $db;
  return mysqli_real_escape_string($db, $string);
}

function redirect_to($location)
{
  header("Location: " . $location);
  exit;
}

function is_post_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}


function log_in_session($user)
{
  $_SESSION['login_user_id'] = $user['id'];
  return true;
}

function log_out_session()
{
  unset($_SESSION['login_user_id']);
  return true;
}
function is_login()
{
  return isset($_SESSION['login_user_id']);
}

function require_login()
{
  if (!is_login()) {
    redirect_to('login.php');
  }
}
function is_login_user()
{
  if (is_login()) {
    redirect_to('index.php');
  }
}


// student log in
function student_login_session($student)
{
  $_SESSION['student_login_id'] = $student['id'];
  return true;
}
function student_logout_session()
{
  unset($_SESSION['student_login_id']);
  return true;
}
function is_student_login()
{
  return isset($_SESSION['student_login_id']);
}

function student_require_login()
{
  if (!is_student_login()) {
    redirect_to('login.php');
  }
}
function is_login_student()
{
  if (is_student_login()) {
    redirect_to('index.php');
  }
}




function selected($fildname, $value)
{
  if ($fildname == $value) {
    echo "selected";
  }
}


function encrypt_data($data)
{
  // Store the cipher method 
  $ciphering = "AES-128-CTR";

  // Use OpenSSl Encryption method 
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;

  // Non-NULL Initialization Vector for encryption 
  $encryption_iv = '1234567891011121';

  // Store the encryption key 
  $encryption_key = "geomaxit197100#";

  // Use openssl_encrypt() function to encrypt the data 
  $encryption = openssl_encrypt(
    $data,
    $ciphering,
    $encryption_key,
    $options,
    $encryption_iv
  );
  return $encryption;
}

function decrypt_data($data)
{
  // Store the cipher method AES-128-CTR
  $ciphering = "AES-128-CTR";
  $options = 0;
  // Non-NULL Initialization Vector for decryption 
  $decryption_iv = '1234567891011121';

  // Store the encryption key 
  $decryption_key = "geomaxit197100#";

  // Use openssl_decrypt() function to decrypt the data 
  $decryption = openssl_decrypt(
    $data,
    $ciphering,
    $decryption_key,
    $options,
    $decryption_iv
  );
  return $decryption;
}




function is_not_get()
{
  if (!isset($_GET['id'])) {
    redirect_to('404.php');
  }
}
function is_not_find($id)
{
  if (($id == 0) or ($id == Null)) {
    redirect_to('404.php');
  }
}
