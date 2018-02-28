<?php ob_start(); ?>
<h1>Page introuvable <i class="fas fa-frown"></i></h1>
<?php $content = ob_get_clean();
require('view/templates/default.php'); ?>