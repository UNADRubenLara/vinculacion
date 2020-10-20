<?php
   if (isset($_POST['lang'])) {
      $_SESSION['lang'] = $_POST['lang'];
   }
   include_once 'txt-values.php';
   $head = '<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
   <meta name="MobileOptimized" content="width">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <title>%s</title>
  <meta name="theme-color" content="#49838c">
  <link rel="shortcut icon" type="image/png" href="./public/img/industry128.png">
  <link rel="apple-touch-icon" href="./public/img/industry128.png">
  	<link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-startup-image" href="./public/img/favicon.ico">
  <link rel="manifest" href="./manifest.json">
  <link rel="stylesheet" href="./public/css/styles.css">
  </head>
  <script>
  if ("serviceWorker" in navigator) {
    window.addEventListener("load", ()=> {
      navigator
      .serviceWorker
      .register("serviceWorker.js")
      .then(()=>console.log("Ready."))
      .catch(()=>console.log("Err..."));
    });
  }
</script>
     <body>
            <header class="containerv header">
            ';
   printf(
      $head,
      TXTAppName
   );
   
   if ($_SESSION['VALID']) {
      $template = '
            <section class="flex-item"><img class="roundlogo" src="./public/img/industry128.png"></section>
		      <section class="flex-item">
		       <section class="containerh">
		       <section class="flex-item">
		       <form method="post">
		       <input type="submit" name="lang" value="es" class="flag" style="background: url(%s)">
		       <input type="submit" name="lang" value="en" class="flag" style="background: url(%s)"></section>
		       </form>
		       <section class="flex-item"><h3 class="font-ligth">%s </h3></section>
		      <section class="flex-item"><h3 class="font-ligth" > %s [ %s ]</h3></section>
		      </section>
		      </section>
		      <section class="containerh">
		      </section>
		      <section class="flex-item-rh">
		      <label class="font-ligth">%s</label>
		      <nav>
		          <a href="home">%s</a>
                <a href="%s">%s</a>
                <a href="%s">%s</a>
                <a href="out">%s</a>
                </nav>
             </section>
             <section><a href="%s"><button class="utils">%s</button></a></section>
            
            
            
	';
      
      $dateHour = date('h:i:s A');
      if ($_SESSION['role'] == 'Admin') {
         printf(
            $template,
            './public/img/es.png',
            './public/img/en.png',
            $dateHour,
            TXThello,
            $_SESSION['username'],
            TXTAppName,
            TXTmenuinit,
            'stats',
            TXTmenustats,
            'users',
            TXTmenuusers,
            TXTmenuOut,
            "toolsadmin",
            TXTmenuTools
         );
      } else {
         $messages = new MessageController();
         $messagestoevaluate = count($messages->actives_messages($_SESSION['iduser']));
         $messagestoevaluate = TXTMsgToEval . ' (' . $messagestoevaluate . ')';
         printf(
            $template,
            './public/img/es.png',
            './public/img/en.png',
            $dateHour,
            TXThello,
            $_SESSION['username'],
            TXTAppName,
            TXTmenuinit,
            'find',
            TXTmenufind,
            'products',
            TXTmenuproduct,
            TXTmenuOut,
            "toolsusers",
            $messagestoevaluate
         );
      }
      
   }
   print('
	</header>
	<div class="main">');
