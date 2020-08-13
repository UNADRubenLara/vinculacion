<?php
   include_once 'txt-values.php';
   $head = '<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>%s</title>
  <meta name="description" content="">
  <meta name="theme-color" content="#49838c">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="shortcut icon" type="image/png" href="./public/img/industry.png">
  <link rel="apple-touch-icon" href="./public/img/industry128.png">
  	<link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-startup-image" href="./public/img/favicon.ico">
  <link rel="manifest" href="./manifest.json">
  <link rel="stylesheet" href="./public/css/normalize.css">
  <link rel="stylesheet" href="./public/css/styles.css">
  </head>
  <script src="./public/js/serviceworker.js"></script>
    <header>
';
   printf(
      $head,
      TXTAppName
   );
   
   if ($_SESSION['VALID']) {
      $template = '
		<nav class="menus ">
            <h3 class="dateHour">%s</h3>
            <br>
            <h3 class="salute">Hola %s</h3>
            <ul class="header-btn color6">
                <li class="color1"><a href="./">%s</a></li>
                <li class="color1"><a href="users">%s</a></li>
                <li class="color1"><a href="productos">%s</a></li>
                <li class="color1"><a href="out">%s</a></li>
            </ul>
		</nav>
	';
      
      $dateHour = date('h:i:s A');
      printf(
         $template,
         $dateHour,
         $_SESSION['username'],
         TXTmenuinit,
         TXTmenuusers,
         TXTmenuproduct,
         TXTmenuOut
      );
   }
   print('
	</header>
	');