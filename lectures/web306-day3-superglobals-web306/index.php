<!--
1. Templates and Includes

1.1 Requiring and Including Files
PHP allows to store PHP code in separate files which are imported into the main file

These files are called templates OR includes depending on their purpose

They are imported using 1 of 4 keywords:

require - if cannot be found, stops page from loading
require_once  - if cannot be found, stops page from loading, ONLY import ONCE
include - if cannot be found, load the rest of page
include_once - if cannot be found, load the rest of page, ONLY import ONCE

1.2 Template Files
PHP was originally designed as a templating language for HTML
PHP files saved in a /templates folder generally include MOSTLY HTML code
Sometimes named filename.tpl.php
Sometimes named filename.html.php
 -->
<?php
require_once 'templates/header.tpl.php';
/**
 * 1.3 Include Files
 * PHP files saved in the /includes folder generally include ONLY PHP code
 * Somtimes named filename.inc.php to incidcate they includes
 * 
 * These files are used for data processing.
 */
include 'includes/functions.inc.php';
?>
  <div class="content">
    <?php include_once 'templates/superglobals.tpl.php' ?>
  </div>
<?php require_once 'templates/footer.tpl.php'; ?>
