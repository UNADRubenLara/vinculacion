<?Php
   include_once '../controllers/ProductController.php';
   include_once '../models/ProductModel.php';
   include_once '../models/SingleConnection.php';
   if (version_compare(PHP_VERSION, '5.4.0', '<')) {
      if(session_id() == '') {session_start();}
   } else  {
      if (session_status() == PHP_SESSION_NONE) {session_start();}
   }
   if (isset($_GET['txt']) && $_SESSION['VALID']) {
   
      if (!isset($dbo)) {
      $dbo = new SingleConnection();
   }
   $in = $_GET['txt'];
   if (!ctype_digit($in)) {
      echo "Data Error";
      exit;
   }
   
   if (strlen($in) > 3 && strlen($in) < 6) {
      $data = [];
      try {
         $stmt = $dbo->prepare("select idADDRESS, C_CODIGO, C_NOMBRE, D_TIPOASENTAMIENTO, D_MUNICIPIO, D_ESTADO, D_CIUDAD  from ZP_ADDRESS where C_CODIGO like '$in'");
         $stmt->bindParam('text', $in, PDO::PARAM_STR);
         $stmt->execute();
         $data = $stmt->fetchall();
         foreach ($data as $nt) {
            $colonia = array('idADDRESS' => $nt['idADDRESS'], 'C_NOMBRE' => $nt['C_NOMBRE'], 'D_MUNICIPIO' => $nt['D_MUNICIPIO'], 'D_ESTADO' => $nt['D_ESTADO']);
            array_push($data, $colonia);
         }
      } catch (Exception $e) {
         echo $e[2];
      }
      
   }
   if ($data) {
      echo json_encode($data);
   } else {
      echo "";
   }
   
   $dbo = Null;
   exit();
   }
