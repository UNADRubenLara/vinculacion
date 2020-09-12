<?Php
   include_once '../controllers/ProductController.php';
   include_once '../models/ProductModel.php';
   include_once '../models/SingleConnection.php';
   if (version_compare(PHP_VERSION, '5.4.0', '<')) {
      if(session_id() == '') {session_start();}
   } else  {
      if (session_status() == PHP_SESSION_NONE) {session_start();}
   }
   if (isset($_FILES['file']) && $_SESSION['VALID']) {
      $sql=$_FILES['file'];
      if (!isset($dbo)) {
         $dbo = new SingleConnection();
         $fileSQL = file_get_contents($sql);
         $dbo->query("SET CHARACTER SET utf8");
            if ($dbo->multi_query($fileSQL)) {
               do {
                  if ($result = $dbo->store_result()) {
                     while ($row = $result->fetch_assoc()) {
                        echo$row;
                     }
                     $result->free();
                  }
            
               } while ($dbo->next_result());
            }
      
         }
   
      $dbo->close();
   }
   
   
   
   
   
