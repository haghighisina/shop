<?php session_start();
error_reporting(-1);
ini_set('display_errors','on');
require_once __DIR__.'/includes.php'; ?>


<div class="container">
    <?php require_once __DIR__.'/products.php';?>
</div>

<?php require_once __DIR__.'/template/footer.php'; ?>


