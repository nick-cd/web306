<?php require 'templates/header.tpl.php'; ?>
  <div class="container">
    <h2 class="text-center"><span class="fa fa-eye"></span>🐘 View Elephants</a></h2>
    <?php if (isset($_GET['add']) && $_GET['add'] == 'success'): ?>
    <div class="success"><span class="fa fa-check"></span> Elephant successfully added!</div>
    <?php elseif (isset($_GET['edit']) && $_GET['edit'] == 'success'): ?>
    <div class="success"><span class="fa fa-check"></span> Elephant successfully edited!</div>
    <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'success'): ?>
    <div class="success"><span class="fa fa-check"></span> Elephant successfully deleted!</div>
    <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'error'): ?>
    <div class="error"><span class="fa fa-alert"></span> Problem deleting Elephant!</div>
    <?php endif; ?>

    <div class="grid">
      <?php
      $controller = new ElephantController;
      $elephants = $controller->read();

      foreach ($elephants as $elephant_num => $elephant_row):
        $elephant = $elephant_row['object'];
        $id = $elephant_row['id'];
        ?>
        <div class="elephant">
          <h2><?php echo Sanitizer::escape_html($elephant->name); ?></h2>
          <h3>Age: <?php echo Sanitizer::escape_html($elephant->age); ?></h3>
          <p><img src="../views/img/<?php echo $elephant->image; ?>" alt="<?php echo $elephant->name; ?>"></p>
          <!-- 
            Finally, in order to delete elephants it is necessary to create a form, in the loop.
            This form's action will point to our routes.php file but will use $_GET query of "delete"
           -->
           <form action="../controllers/routes.php?action=delete" method="post">
            <!--
             We also want  the user to be able to update elephant data.
             In order to do this we will link to a file called edit-elephant.php and add a $_GET key for the elephant ID.
             -->
             <a href="edit-elephant.php?id=<?php echo $id ?>" class="button"><span class="fa fa-edit"></span> Edit</a>
            <!-- 
              Inside of our form, we need to include a hidden form input to send our elephant ID to the processing file
             -->
             <input type="hidden" name="id" value="<?php echo $id; ?>">
             <!-- 
               We also need a button with a type="submit" attribute which will submit the form and delete our elephant
              -->
              <button type="submit"><span class="fa-fa-trash"></span> Delete</button>
           </form>
        </div>
        <?php
      endforeach;
      ?>
    </div>
  </div>
<?php require 'templates/footer.tpl.php'; ?>
