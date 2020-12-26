<?php
require_once 'templates/header.tpl.php';

$id = $_GET['id'];
$controller = new ElephantController;
$elephants = $controller->read();

foreach ($elephants as $elephant_num => $elephant_row) {
  if ($elephant_row['id'] == $id) {
    $this_elephant = $elephant_row['object'];
  }
}
?>
  <div class="container">
    <h2><span class="fa fa-edit"></span>🐘 Edit <?php echo $this_elephant->name; ?></a></h2>
    <?php if (isset($_GET['edit']) && $_GET['edit'] == 'error') { ?>
    <div class="error"><span class="fa fa-exclamation-triangle"></span> Sorry, we need more information about this elephant!</div>
    <?php } ?>
    <!--
    The form in this file will have an action which will point to a separate PHP file which will process editing
    the elephant
    -->
    <form action="../controllers/routes.php?action=update" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <label for="name">Name:</label>
      <!--
      Set the value of the input with the name attribute which is equal to "name" to this elephant's name
      -->
      <input type="text" name="name" value="<?php echo $this_elephant->name; ?>" id="name">

      <label for="age">Age:</label>
      <!--
      Set the value of the input with a name attribute which is equal to "age" to this elephant's age
      -->
      <input type="number" name="age" value="<?php echo $this_elephant->age; ?>" id="age">

      <label for="image" class="input-group-text">Image:</label>
      <!--
      Check if this elephant's image is the same as the select option and if so, set that option to selected
      -->
      <select class="form-control" name="image" id="image">
        <option value="bananas.jpg" <?php if ('bananas.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Bananas</option>
        <option value="beach.jpg" <?php if ('beach.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Beach</option>
        <option value="big-ball.jpg" <?php if ('big-ball.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Big Ball</option>
        <option value="birds.jpg" <?php if ('birds.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Birds</option>
        <option value="dog.jpg" <?php if ('dog.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Dog</option>
        <option value="feed.jpg" <?php if ('feed.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Feed</option>
        <option value="massage.jpg" <?php if ('massage.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Massage</option>
        <option value="peek.jpg" <?php if ('peek.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Peek</option>
        <option value="run.jpg" <?php if ('run.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Run</option>
        <option value="small-ball.jpg" <?php if ('small-ball.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Small Ball</option>
        <option value="tub.jpg" <?php if ('tub.jpg' == $this_elephant->image) { echo 'selected'; } ?>>Tub</option>
      </select>
      <button type="submit"><span class="fa fa-edit"></span> Edit Elephant</button>
    </form>
  </div>
<?php require_once 'templates/footer.tpl.php'; ?>
