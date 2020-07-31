<?php
   require_once('./controllers/Paths.php');
   $modelPaths = new Paths();
   $menuLevel = isset($_GET['LEVEL']) ? $_GET['LEVEL'] : 'home';
   $appFlow = new MainControler();