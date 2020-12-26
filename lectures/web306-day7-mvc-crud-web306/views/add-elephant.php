<?php require_once 'templates/header.tpl.php'; ?>
  <div class="container">
    <h2><span class="fa fa-plus"></span>🐘 Add Elephant</a></h2>
    <?php if (isset($_GET['add']) && $_GET['add'] == 'error'): ?>
    <div class="error"><span class="fa fa-exclaimation-triangle"></span> Sorry, we need more information about the elephant!</div>
    <?php endif; ?>

    <!--
      We will set up the ability to create new elephants by making a form which will accept new elephant data.

      Our action will point to the routes.php file but will use a $_GET query of action with a value of create.
    -->
    <form action="../controllers/routes.php?action=create" method="post">
      <label for="name">Name:</label>
      <input type="text" name="name" value="" id="name">

      <label for="Age">Age:</label>
      <input type="number" name="age" value="" id="age">

      <label for="image">Image:</label>
      <select name="image" id="image">
        <option value="bananas.jpg">Bananas</option>
        <option value="beach.jpg">Beach</option>
        <option value="big-ball.jpg">Big Ball</option>
        <option value="birds.jpg">Birds</option>
        <option value="dog.jpg">Dog</option>
      </select>

      <button type="submit"><span class="fa fa-plus"></span> Add Elephant</button>
    </form>
  </div>
<?php require_once 'templates/footer.tpl.php'; ?>
