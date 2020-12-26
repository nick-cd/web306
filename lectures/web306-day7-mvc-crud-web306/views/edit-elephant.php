<?php require_once 'templates/header.tpl.php';

$id = $_GET['id'];
$controller = new ElephantController;
$elephants = $controller->read();

foreach ($elephants as $elephant_num => $elephant_row):
  if ($elephant_row['id'] == $id):
    $this_elephant = $elephant_row['object'];
  endif;
endforeach;
?>
  <div class="container">
    <h2><span class="fa fa-edit"></span>🐘 Edit <?php echo Sanitizer::escape_html($this_elephant->name) ?></a></h2>
    <?php if (isset($_GET['edit']) && $_GET['edit'] == 'error'): ?>
    <div class="error"><span class="fa fa-exclaimation-triangle"></span> Sorry, we need more information about the elephant!</div>
    <?php endif; ?>

    <!--
      We will set up the ability to create new elephants by making a form which will accept new elephant data.

      Our action will point to the routes.php file but will use a $_GET query of action with a value of update.
    -->
    <form action="../controllers/routes.php?action=update" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <label for="name">Name:</label>
      <input type="text" name="name" value="<?php echo $this_elephant->name; ?>" id="name">

      <label for="Age">Age:</label>
      <input type="number" name="age" value="<?php echo $this_elephant->age; ?>" id="age">

      <label for="image">Image:</label>
      <select name="image" id="image">
        <option value="bananas.jpg" <?php if ('bananas.jpg' == $this_elephant->image): echo 'selected'; endif; ?>>Bananas</option>
        <option value="beach.jpg" <?php if ('beach.jpg' == $this_elephant->image): echo 'selected'; endif; ?>>Beach</option>
        <option value="big-ball.jpg" <?php if ('big-ball.jpg' == $this_elephant->image): echo 'selected'; endif; ?>>Big Ball</option>
        <option value="birds.jpg" <?php if ('birds.jpg' == $this_elephant->image): echo 'selected'; endif; ?>>Birds</option>
        <option value="dog.jpg" <?php if ('dog.jpg' == $this_elephant->image): echo 'selected'; endif; ?>>Dog</option>
      </select>

      <button type="submit"><span class="fa fa-plus"></span> Add Elephant</button>
    </form>
  </div>
<?php require_once 'templates/footer.tpl.php'; ?>
