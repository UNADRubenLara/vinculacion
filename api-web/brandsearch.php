<?Php
   include_once '../controllers/ProductController.php';
   include_once '../models/ProductModel.php';
   include_once '../models/SingleConnection.php';
   
   if (version_compare(PHP_VERSION, '5.4.0', '<')) {
      if(session_id() == '') {session_start();}
   } else  {
      if (session_status() == PHP_SESSION_NONE) {session_start();}
   }
   
   if (isset($_GET['txt'])) {
        if (!isset($dbo)) {
         $dbo = new SingleConnection();
      }
      $in = '%' . $_GET['txt'] . '%';
         $data = [];
       if (strlen($in) > 3) {
         try {
            $stmt = $dbo->prepare("select branch_code, branch, b_description, b_includes, b_exclude from BRANCH where branch like :text");
            $stmt->bindParam('text', $in, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchall();
            foreach ($data as $nt) {
               $branch = array('branch_code' => $nt['branch_code'], 'branch' => $nt['branch'], 'b_description' => $nt['b_description'], 'b_includes' => $nt['b_includes'], 'b_exclude' => $nt['b_exclude']);
               array_push($data, $branch);
            }
         } catch (Exception $ex) {
            echo $ex[2];
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