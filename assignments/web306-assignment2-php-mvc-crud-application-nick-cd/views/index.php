<?php

$title = "Home";

$failed = false;

require_once './templates/header.tpl.php';

$repocontroller = new RepoController();
$repos = $repocontroller->read();

include_once './includes/status.inc.php';

if($failed)
    exit();

?>

<div class="container">

  <div class="row">
    <a class="col-md-1 col-md-offset-5 btn btn-success" href="add-repo.php">Add</a>
  </div>

  <?php foreach ($repos as $id => $repo): ?>
    <div class="container">

      <div class="row">
        <h2 class="col-md-offset-3">Name: <?php echo Sanitizer::escape_html($repo->name); ?></h2>
      </div>

      <div class="row">
        <h3 class="col-md-offset-3">link: <?php echo Sanitizer::escape_html($repo->link); ?></h3>
      </div>

      <div class="row">
          <h3 class="col-md-offset-3">
            <!-- https://stackoverflow.com/questions/23842268/how-to-display-image-from-database-using-php -->
            Image:
          </h3>
          <div class="col-md-offset-4">
            <img src="data:<?php echo $repo->img_type ?>;base64,<?php echo base64_encode($repo->img); ?>" alt="<?php echo $repo->name; ?>" width="250" height="150" />
          </div>
      </div>

      <div class="row">
        <form action="edit-repo.php?id=<?php echo $id ?>" method="post">
          <input class="col-md-1 btn btn-primary pull-left" type="submit" value="Edit"/>
        </form>

        <form action="../controllers/routes.php?action=delete&id=<?php echo $id ?>" method="post">
          <input class="col-md-1 btn btn-primary pull-right" type="submit" value="Delete"/>
        </form>
      </div>

      <hr/>
    </div>
  <?php endforeach; ?>

</div>

<?php require 'templates/footer.tpl.php'; ?>
