<?php
$title = 'PHP Superglobals';

// Setting browser cookies
$cookie_name = 'chocolate_chip';
$cookie_value = 'img/chocolate_chip.png';
if (isset($_GET['cookie']) && $_GET['cookie'] == 'set') {
    // The setcookie() function sets a browser cookie
    // MUST be used before opening <html> tag
    setcookie($cookie_name, $cookie_value);
} else {
    // Set the expiration date to one hour ago
    setcookie($cookie_name, '', time() - 3600);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/main.css">

  <title><?php echo $title ?></title>
</head>
<body>
  <header>
    <h1><?php echo $title; ?></h1>
  </header>
