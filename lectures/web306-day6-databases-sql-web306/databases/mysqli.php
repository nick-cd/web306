<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>MySQLi</title>

  <link rel="stylesheet" href="css/databases.css">
</head>
<body>
  <header>
    <h1>MySQLi</h1>
  </header>

  <div class="container">
    <h2>Dolphin Data</h2>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Age</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // 1. Connecting to an SQL Database
        // First our database credentials are saved as variables
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'dolphins';
        // Then those database credentials are used as parameters in our mysqli_connect() function which will connect us to the database
        $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

        // 2. Displaying the Data
        // First we will save our query in a variable
        // We want to select ALL rows from the `dolphins` table
        $select_query = "SELECT * FROM `dolphins`";
        // When writing SQL in PHP, you should use double quotes

        // Then we use our $connection variable and our $select_query variable in the mysqli_query() function to run a query in the SQL database
        $select_result = mysqli_query($connection, $select_query);

        // Now that we have selected all of the dolphin rows from the database, we cn loop through them
        // We will use the msqli_fetch_assoc() function which stores all of the rows in an associative array
        // The while loop will loop while the mysqli_fetch_assoc() function has rows
        while ($row = mysqli_fetch_assoc($select_result)):
        ?>
        <tr>
        <!-- Then we can echo out each array item, which represents a column -->
          <td><?php echo htmlspecialchars($row['id']); ?></td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['age']); ?></td>
          <td><img src="img/<?php echo strtolower(htmlspecialchars($row['name'])); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>"></td>
        </tr>
        <?php
        endwhile;
        ?>
      </tbody>
    </table>
    <?php
    // 3. Adding New Data
    // First we need to save this file name as a variable and perfrom sanitization on it
    $this_file = basename(htmlspecialchars($_SERVER['PHP_SELF']));

    // Then we can make a form which has an action that points to this variable to submit data to the datbase
    ?>
    <form action="<?php echo $this_file ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="age">Age:</label>
        <input type="number" id="age" name="age">

        <button type="submit">Submit</button>
    </form>
    <?php
    // We can import our data using the $_POST superglobal
    // First we need to check to make sure that the form data is not empty
    // by using the empty() function
    if (!empty($_POST['name']) && !empty($_POST['age'])):
      // We can save our post data as variables and filter it

      $name = trim(strip_tags($_POST['name']));
      $age = trim(strip_tags($_POST['age']));

      $name = mysqli_real_escape_string($connection, $name);
      $age = mysqli_real_escape_string($connection, $age);

      // Then we can insert them into an SQL query using interpolation
      $insert_query = "INSERT INTO `dolphins` (`name`, `age`) VALUES ('${name}', '${age}')";

      // Finally we will use the mysqli_query() function as a condition in an if else statement to provide a condition for if the function runs successfully and a fallback for if it fails
      if (mysqli_query($connection, $insert_query)): 
    ?>
      <div class="success">You have successfully added <?php echo $name ?>!</div>
    <?php
      else:
    ?>
      <div class="error">There was a problem adding the dolphin!</div>
    <?php
      endif;
    else:
    ?>
    <div class="error">We need more information about the dolphin!</div>
    <?php
    endif;
    ?>
  </div>
</body>
</html>
