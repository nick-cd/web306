<div class="row">
  <div class="col-md-6">
      <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="<?php if($repo != null) echo Sanitizer::escape_html($repo->name); ?>" id="name" required />
      </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="link">link:</label>
      <input class="form-control" type="text" name="link" value="<?php if($repo != null) echo Sanitizer::escape_html($repo->link); ?>" id="link" required />
    </div>
  </div>
</div>
