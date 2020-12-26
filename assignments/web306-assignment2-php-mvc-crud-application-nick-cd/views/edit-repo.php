<?php

$title = "Edit Repository";

require_once 'templates/header.tpl.php';

$id = $_GET['id'];

$repocontroller = new RepoController();
$repo = $repocontroller->get_repo_by_id($id);

include_once 'includes/status.inc.php';

if(!$repo)
  exit();

?>

<div class="container">

  <div class="row">
    <h2 class="pull-left">
      Edit&nbsp<?php echo Sanitizer::escape_html($repo->name); ?>
    </h2>
  </div>

  <div class="container">
    <form action="../controllers/routes.php?action=update" enctype='multipart/form-data' method="post">

      <input type="hidden" name="id" value="<?php echo $id; ?>" />

      <?php include_once './templates/name-link-input.tpl.php'; ?>

      <div class="row">
        <div class="col-md-offset-4">
          <label for="img">
            Image:
          </label>
        </div>
        <div class="col-md-offset-4">
          <img src="data:<?php echo $repo->type ?>;base64,<?php echo base64_encode($repo->img); ?>" alt="<?php echo $repo->name; ?>" width="250" height="150" />
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-4">
            <input class="col-md-6" type="file" name="img" id="img" />
        </div>
      </div>

      <input type="hidden" name="img-orig" value="<?php echo base64_encode($repo->img); ?>" />
      <input type="hidden" name="type" value="<?php echo Sanitizer::escape_html($repo->img_type); ?>" />

      <input type="reset" class="btn btn-primary pull-left" value="Reset" />
      <input type="submit" class="btn btn-primary pull-right" value="Update" />
    </form>
  </div>

</div>

<?php require_once 'templates/footer.tpl.php'; ?>
