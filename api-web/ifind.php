<?php
   include_once '../controllers/ProductController.php';
   include_once '../models/ProductModel.php';
   include_once '../models/SingleConnection.php';
   if (isset($_GET['txt'])) {
      if (!isset($dbo)) {
         $dbo = new SingleConnection();
         $txt = htmlEntities($_GET['txt'], ENT_QUOTES);
         $ProductControl = new ProductController();
         $data = $ProductControl->findByText($txt);
         $dataNoThisUser = array();
         $string = json_encode($data);
         $string = str_replace('\r', ' ', $string);
         $string = str_replace('\n', ' ', $string);
         echo $string;
      } else {
         echo 'ifind.php?txt=TextoaBuscar  ';
      }
   }
