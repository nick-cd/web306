<?php
/**
 * Requiring Classes
 * 
 * In order to acces our Car/Batmobile classes we must require/include the class files
 */
require 'classes/Car.php';
require 'classes/Batmobile.php';
/**
 * We can use the file() function to import data in a txt file where we save our object's data
 * 
 * The file() function returns every line of the .txt file in an array
 */
$car_array = file('cars.txt');

$this_file = basename(Car::escape_html($_SERVER['PHP_SELF']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="css/car.css">

  <title><?php echo $title; ?></title>
</head>
<body>
  <header>
    <h1 class="text-center"><?php echo $title; ?></h1>
  </header>
  <nav>
    <ul>
      <li><a href="view-cars.php"><span class="fa fa-eye"></span> <span class="fa fa-car"></span> View Cars</a></li>
      <li><a href="add-car.php"><span class="fa fa-plus"></span> <span class="fa fa-car"></span> Add Car</a></li>
    </ul>
  </nav>
