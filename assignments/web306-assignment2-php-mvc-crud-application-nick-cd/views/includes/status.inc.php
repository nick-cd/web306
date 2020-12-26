<?php

require_once 'utilities/Sanitizer.php';

echo '<div class="container">';
if(isset($_GET['status'])) {
    if($_GET['status'] === 'success') {
        echo '<div class="alert alert-success">Success: ' . Sanitizer::escape_html($_GET['msg']) . '</div>';
    } else if($_GET['status'] == 'failure') {
        echo '<div class="alert alert-danger">Failure: ' . Sanitizer::escape_html($_GET['msg']) . '</div>';
        $failed = true;
    } else {
        echo '<div class="alert alert-danger">Unknown status</div>';
        exit();
    }
}
echo '</div>';
