<?php
    include_once '../controllers/ProductController.php';
   include_once '../models/ProductModel.php';
   include_once '../models/SingleConnection.php';
   if (version_compare(PHP_VERSION, '5.4.0', '<')) {
      if(session_id() == '') {session_start();}
   } else  {
      if (session_status() == PHP_SESSION_NONE) {session_start();}
   }
   if (isset($_GET['txt']) && $_SESSION['VALID']) {
      $txt = $_GET['txt'];
      $ProductControl = new ProductController();
      $data=$ProductControl->findByText($txt);
      $string= json_encode($data);
      $string=str_replace('\r', ' ', $string);
      $string=str_replace('\n', ' ', $string);
      echo $string;
   } else {
      echo 'ifind.php?txt=TextoaBuscar   (Con Sesion iniciada) ';
   }
