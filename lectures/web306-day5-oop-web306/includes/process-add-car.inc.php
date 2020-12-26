<?php
/**
 * 10. Creating New Object Instances From User Input
 * 
 * In order to create a new instance of a car we need to require our Car class
 */
require '../classes/Car.php';
require '../classes/Batmobile.php';

// We're going to let our user create new cars using $_POST data
if (!empty($_POST['name']) && !empty($_POST['driver'])) {
    // To create a new instance of an object, use the new keyword
    // We need to check if this is a Batmobile or not
    
    // Rather than manually creating an array we're going to use the $_POST
    // array as the parameter of our __consutrct() method
    if ($_POST['type'] == 'batmobile') {
        $car = new Batmobile($_POST);
    } else {
        $car = new Car($_POST);
    }

    // In order to store and transport objects, we sometimes need to use the serialize() function to convert
    // the object data to a non-relational database in the form of one string
    $serialized_car = serialize($car);

    // We are going to store our object in a .txt file where we can access it at at later point
    // using the file_put_contents() function
    // The first parameter is our file path
    $file_path = '../cars.txt';
    // PHP_EOL os a PHP keyword which just moves text to a new ine
    $add_new_line = PHP_EOL;
    // The second parameter is our object data concatenated with our new line
    $text_line = $serialized_car . $add_new_line;
    // The third parameter is a keyword which specifies that the content should be
    // apppneded to the previous content rather than replacing it
    $append = FILE_APPEND;
    // We can now take all of these variables and put them into the function as parameters
    file_put_contents($file_path, $text_line, $append);

    // Redirect to the "view" page with a success message
    header('Location: ../view-cars.php?add=success');
} else {
    // Redirect to the "add" page with an error message
    header('Location: ../add-car.php?add=error');
    exit();
}