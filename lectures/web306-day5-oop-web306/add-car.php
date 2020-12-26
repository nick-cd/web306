<?php
$title = 'Add Car';
require_once 'templates/header.tpl.php';
?>
  <div class="container">
    <?php if(isset($_GET['add']) && $_GET['add'] == 'error'): ?>
    <div class="error"><span class="fa fa-exclamation-triangle"></span> Sorry we need more information about this car!</div>
    <?php endif; ?>
    
    <h3>Car Type:</h3>
    <a href="add-car.php?type=regular" class="button">Regular</a>
    <a href="add-car.php?type=batmobile" class="button">Batmobile</a>

    <form action="includes/process-add-car.inc.php" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" value="" id="name">

      <label for="driver">Driver:</label>
      <input type="text" name="driver" value="" id="driver">

      <label for="image">Image:</label>
      <select name="image" id="image">
        <?php if ($_GET['type'] == 'batmobile'): ?>
        <option value="batmobile.gif">Batmobile</option>
        <option value="tumbler.gif">Tumbler</option>
        <option value="animated.gif">Animated</option>
        <option value="lego.gif">Lego</option>
        <?php else: ?>
        <option value="car.gif">Car</option>
        <option value="homer.gif">Homer</option>
        <option value="mcqueen.gif">McQueen</option>
        <option value="studebaker.gif">Studebaker</option>
        <?php endif; ?>
      </select>

      <label for="honk">Honk:</label>
      <select name="honk" id="honk">
        <?php if ($_GET['type'] == 'batmobile'): ?>
        <option value="holy.mp3">Holy</option>
        <option value="lego.mp3">Lego</option>
        <?php else: ?>
        <option value="honk.mp3">Honk</option>
        <option value="homer.mp3">Homer Honk</option>
        <option value="kermit.mp3">Kermit Honk</option>
        <option value="wow.mp3">Wow Honk</option>
        <?php endif; ?>
      </select>

      <label for="top_speed">Top Speed:</label>
      <input type="number" name="top_speed" value="170">

      <input type="hidden" name="type" value="<?php echo Car::escape_html($_GET['type']); ?>">

      <button type="submit"  name="button">Add Car</button>
    </form>
  </div>
<?php require_once 'templates/footer.tpl.php'; ?>
