<?php require_once 'templates/header.tpl.php'; ?>
  <div class="container">
    <h2><span class="fa fa-plus"></span>🐘 Add Elephant</a></h2>
    <?php if (isset($_GET['add']) && $_GET['add'] == 'error') { ?>
    <div class="error"><span class="fa fa-exclamation-triangle"></span> Sorry, we need more information about this elephant!</div>
    <?php } ?>
    <!--
    First we will set up the ability to create new elephants by making a form which will accept new elephant data
    Our action will point to a separate PHP file which will process adding the elephant
    -->
    <form action="../controllers/routes.php?action=create" method="post">
      <label for="name">Name:</label>
      <!--
      Make sure to include an input with a name attribute which is equal to "name" to take in a name
      -->
      <input type="text" name="name" value="" id="name">

      <label for="age">Age:</label>
      <!--
      And an input with a name attribute which is equal to "age" to take in an age
      -->
      <input type="number" name="age" value="" id="age">

      <label for="image">Image:</label>
      <!--
      And finally a select input with a name attribute which is equal to "image" to take in an image
      -->
      <select name="image" id="image">
        <option value="bananas.jpg">Bananas</option>
        <option value="beach.jpg">Beach</option>
        <option value="big-ball.jpg">Big Ball</option>
        <option value="birds.jpg">Birds</option>
        <option value="dog.jpg">Dog</option>
        <option value="feed.jpg">Feed</option>
        <option value="massage.jpg">Massage</option>
        <option value="peek.jpg">Peek</option>
        <option value="run.jpg">Run</option>
        <option value="small-ball.jpg">Small Ball</option>
        <option value="tub.jpg">Tub</option>
      </select>

      <button type="submit"><span class="fa fa-plus"></span> Add Elephant</button>
    </form>
  </div>
<?php require_once 'templates/footer.tpl.php'; ?>
