<?php
/**
 * 3. Superglobals
 * 
 * Superglobals are predefined variables in PHP which can be accessed from ANYWHERE in your code
 * 
 * They are associative arrays which hold large amounts of data
 * 
 * 3.1 $GLOBALS
 * $GLOBALS is used to access an array of every global variabl in a PHP script from anywhere in that script
 */
function show_title() {
    echo '<h2>' . $GLOBALS['title'] . '</h2>';
    // This is the same as $title
}

show_title();

// var_dump($GLOBALS);

/**
 * 3.2 $_SERVER
 * 
 * $_SERVER is a variable for an array of server data such as info about paths and scirpt locations
 * 
 * The path to our current PHP file
 */
echo '<p>' . $_SERVER['PHP_SELF'] . '</p>';
// basename() get just the name of the file
echo '<p>' . basename($_SERVER['PHP_SELF']) . '</p>';
// The IP address of the server under which the current script is running
echo '<p>' . basename($_SERVER['SERVER_ADDR']) . '</p>';
// The name of the server host under which the current script is running
echo '<p>' . basename($_SERVER['SERVER_NAME']) . '</p>';
// Server identification string, given to headers when responding to requests
echo '<p>' . basename($_SERVER['SERVER_SOFTWARE']) . '</p>';

// Use htmlspecialchars() to sanitize data
// Never use PHP_SELF in a form without sanitizing it to prevent security risks
$this_file = basename(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'));

/**
 * $_GET
 */
?>
<nav>
    <h3>Choose Friend</h3>
    <a href="<?php echo $this_file ?>" class="button">None</a>
    <a href="<?php echo $this_file ?>?friend=birds" class="button">Birds</a>
    <a href="<?php echo $this_file ?>?friend=dog" class="button">Dog</a>
</nav>
<?php
/**
 * Any key/value pairs in the URL are stored as an array in $_GET
 * $_GET can be used to collect data from the URL
 */

 // var_dump($_GET);

 // Run this code if friend is not empty
 if (!empty($_GET['friend'])) {
     // GET the data from the URL
     $friend = $_GET['friend'];
     // Set an image name to the value of the friend
     echo '<p><img src="img/' . $friend . '.jpg" alt="Elephant and ' . $friend . '" class="elephant"></p>';
 } else {
    echo '<p><img src="img/beach.jpg" alt="Elephant" class="elephant"></p>';
 }
?>
<!-- 
    An HTML form with a method="get" attribute sends the form data to the URL as key/value pairs

    We can then use $_GET to collect this data from the URL
    The PHP scirpt for this form is in this PHP file so we will set the action to $-file
 -->
 <form action="<?php echo $this_file ?>" method="get">
    <label for="elephant_name">Elephant Name:</label>
    <!-- 
        The name attribute is very important
        It is what is used as the key in the key/value
        data which is submitted from the form
     -->
     <input type="text" name="elephant_name" value="" id="elephant_name">
     <button type="submit" name="button">Send to URL and $_GET</button>
 </form>
<?php
// We will get our form data, sanitize it and display it
if (!empty($_GET['elephant_name'])) {
    // GET the user input from the URL
    $elephant_name = $_GET['elephant_name'];
    // Sanitize and format input
    $elephant_name_formatted = format_name($elephant_name);
    // Display input
    echo '<h3>The name of the elephant is ' . $elephant_name_formatted . '</h3>';
} else {
    echo '<h3 class="error">You did not provide an elephant name!</h3>';
}
/**
 * Because data from $_GET forms is displayed in the URL they are bad for private data such as usernames/passwords
 * 
 * That's what $_POST is for
 * 
 * 3.4 $_POST
 * $_POST is used to collect data after submitting an HTML form with method="post" attribute
 * The data is then saved in the $_POST superglobal and nowhere else except $_REQUEST
 */
?>
<form action="<?php echo $this_file; ?>" method="post">
    <label for="friend_name">Friend Name:</label>
    <input type="text" name="friend_name" value="" id="friend_name">
    <button type="submit" name="post_button">Send to $_POST</button>
</form>
<?php

if (!empty($_POST['friend_name'])) {
    // Save the user input form the form to the $_POST superglobal
    $friend_name = $_POST['friend_name'];
    // Sanitize and format input
    $friend_name_formatted = format_name($friend_name);
    // Display input
    echo '<h3>The name of the friend is ' . $friend_name_formatted . '</h3>';
} else {
    echo '<h3 class="error">You have no friend!</h3>';
}

/**
 * 3.5 $_COOOKIE
 * 
 * Cookies are used to store data about users in the browser
 * 
 * To set a cookie in PHP, use the setcookie() function before the opening <html> tag
 * Once browser cookies have been set they are stored in the $_COOKIE associative array
 * 
 * We can then access cookie data using the $_COOKIE variable
 */

 // var_dump($_COOKIE);

 echo '<h3>There are ' . count($_COOKIE) . ' cookies left</h3>';
?>
<nav>
    <a href="<?php echo $this_file; ?>?cookie=set" class="button">Set Cookie</a>
    <a href="<?php echo $this_file; ?>?cookie=clear" class="button">Clear Cookie</a>
</nav>
<div class="feed-cookie">
<?php
if (isset($_COOKIE['chocolate_chip'])) {
    echo '<img src="' . $_COOKIE['chocolate_chip'] . '" alt="Cookie" class="cookie">';
}
?>
</div>
<!-- 
    3.6 $_FILES
    When a user uploads files to a form they are stored in the $_FILES associative array

    To allow users to upload files you MUST use a method="post" form
    You must also include an attribute of enctype="multipart/form-data" for added encryption
    We will point this action to a separate PHP file
 -->
 <form action="includes/process-upload.inc.php" method="post" enctype="multipart/form-data">
    <label for="elephant_img">Elephant Image:</label>
    <input type="file" name="elephant_img" value="" id="elephant_img">
    <button type="submit" name="img_button">Upload Image</button>
 </form>