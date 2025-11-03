<?php
require_once "../app/core/Router.php";
$uri = $_SERVER['REQUEST_URI'];
Router::route($uri);
?>
