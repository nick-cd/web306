<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PDO (PHP Data Object)</title>

  <link rel="stylesheet" href="css/databases.css">
</head>
<body>
  <header>
    <h1>PDO (PHP Data Object)</h1>
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

        // 2. Intro to PDO (PHP Data Object)
        // PDO is a built-in object in PHP which is used for connecting to datbases and running SQL queries
        //  We can connect to the database by creating a new instance of the PDO class and using our credentials as the parameters

        // If PDO is not able to connect to the databas then this will display an ugly PHP error

        // We can use a try catch statement to dispaly a nice one
        try {
          $pdo = new PDO(
            'mysql:host=' . $db_host .
            ';dbname=' . $db_name,
            $db_user,
            $db_password
          );
        } catch (PDOException $e) {
          ?>
          <div class="error">
            <h2>No Database Connection!</h2>
            <p><?php echo $e->getMessage(); ?></p>
          </div>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
