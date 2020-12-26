<?php

$title = "Add Repository";

require_once 'templates/header.tpl.php';
require_once 'includes/status.inc.php';

?>

<div class="container">

  <div class="row">
    <h2 class="pull-left">Add&nbspRepository</h2>
  </div>

  <!-- https://stackoverflow.com/questions/4526273/what-does-enctype-multipart-form-data-mean -->
  <form action="../controllers/routes.php?action=create" enctype='multipart/form-data' method="post">

    <?php $repo = null; include './templates/name-link-input.tpl.php'; ?>

    <div>
      <div class="form-group">
        <!-- Cannot default the file's initial value -->
        <input name="img" type="file" required />
      </div>
    </div>

    <input type="reset" class="btn btn-primary pull-left" value="Reset" />
    <input type="submit" class="btn btn-primary pull-right" value="Add" />

  </form>

</div>

<?php require 'templates/footer.tpl.php'; ?>
