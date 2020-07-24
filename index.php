<?php
require_once('./controllers/paths.php');
$modelPaths = new paths();
$menuLevel = isset($_GET['LEVEL']) ? $_GET['LEVEL'] : 'home';
$menuLevelUbication = new maincontroler();