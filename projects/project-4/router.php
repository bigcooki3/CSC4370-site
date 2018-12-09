<?php

$page = $_GET["p"];

switch ($page) {
    case '':
        include_once './pages/home.php';
        break;
    default:
        include_once './pages/'.$page.'.php';
        break;
}

?>
