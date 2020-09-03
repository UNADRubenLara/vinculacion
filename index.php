<?php
   if (!file('models/SingleConnection.php')) {
      header('Location: .install/install.php');
   }
   require_once('./controllers/Paths.php');
   $modelPaths = new Paths();
   $menuLevel = isset($_GET['LEVEL']) ? $_GET['LEVEL'] : 'home';
   $appFlow = new MainController();