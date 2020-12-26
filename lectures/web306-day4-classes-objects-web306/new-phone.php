<?php
/**
 * 4. Creating New Object Instances
 * An object is actually a new instance of a class
 * 
 * In order to create a new instance of a Phone, we need to require our Phone.php
 * file which has our Phone class
 */
require 'classes/Phone.php';
/**
 * To create a new instance of a class, and therefore an object, create a variable with a value of the class name prefaced by the new keyword.
 */
$my_phone = new Phone;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome CSS link to file downloaded from fontawesome.com -->
  <link rel="stylesheet" href="css/fontawesome/all.min.css">
  <link rel="stylesheet" href="css/phone.css">

  <!-- 
    To access the properties and methods of an object use the variable name of the object, followed by an arrow -> and then the name of the property you are trying to access
   -->
   <title><?php echo $my_phone->name; ?></title>
</head>
<body>

  <!-- We will build our Phone in our HTML -->
  <section id="phone">
    <main class="screen">
      <div class="specs">
        <h1><?php echo $my_phone->name; ?></h1>
        <ul>
          <li><?php echo $my_phone->os; ?></li>
          <li><?php echo $my_phone->weight; ?></li>
          <li><?php echo $my_phone->memory; ?></li>
        </ul>
      </div>
      <?php
      if (isset($_GET['contact'])) {
        // To call a method of an object use the variable name of the object followed by the arrow and the name of the method including parentheses
        $my_phone->call($_GET['contact']);
      }
      ?>
    </main>
    <div class="interface">
      <nav class="contacts">
        <!-- 
          We will make links which will change the parameter of ->call() by
          changing the value of the $_GET key 'contact'
         -->
         <?php if (isset($_GET['contact'])): ?>
          <a href="new-phone.php" class="end"><span class="fa fa-phone-slash"></span> End Call</a>
         <?php else: ?>
          <h2><span class="fa fa-user"></span> Recent Contacts</h2>
          <a href="new-phone.php?contact=kermit"><span class="fa fa-phone"></span> Call Kermit</a>
          <a href="new-phone.php?contact=batman"><span class="fa fa-phone"></span> Call Batman</a>
          <a href="new-phone.php?contact=homer"><span class="fa fa-phone"></span> Call Homer</a>
         <?php endif; ?>
      </nav>
    </div>
  </section>

</body>
</html>
