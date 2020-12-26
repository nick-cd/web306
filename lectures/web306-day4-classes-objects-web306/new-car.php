<?php
/**
 * 12. Setting Class Properties
 * In order to create a new instance of the Car we need to require our Car.php file
 * which has our Car class
 */
require 'classes/Car.php';

/**
 * We can manually define the properties of our class by setting the parameters of the __construct() method when we create a new instance of the Car class
 * 
 * Our __construct() method takes one parameter which is an array of properties
 */

 $my_properties = array(
   'name' => 'Some Car',
   'driver' => 'Some Guy',
   'image' => 'car.gif',
   'honk' => 'honk.mp3',
   'top_speed' => 170
 );

 /**
  * It is not necessary to explicitly call the __constrct() method as it is automatically called once the class instance is created
  * When we create a new instance of a class we can also add parentheses like we would when calling a function and add the parmeters of oru __constrct() method into it
  */
  $my_car = new Car($my_properties);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome CSS link to file downloaded from fontawesome.com -->
  <link rel="stylesheet" href="css/fontawesome/all.min.css">
  <link rel="stylesheet" href="css/car.css">

  <title><?php echo $my_car->name ?></title>
</head>
<body>
  <header>
    <h1><?php echo $my_car->name ?></h1>
    <h2><?php echo $my_car->driver ?></h2>
  </header>

  <div class="container">
    <?php
    $my_car->start(mt_rand(0, $my_car->top_speed));
    ?>
  </div>
</body>
</html>
