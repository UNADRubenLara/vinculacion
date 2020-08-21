<?Php
   include_once "publicconection.php";
   if (!isset($dbo)) {
      $dbo = new PublicConecction();
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
