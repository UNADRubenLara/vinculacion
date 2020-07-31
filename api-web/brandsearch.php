<?Php
   include_once "publicconection.php";
   if (!isset($dbo)) {
      $dbo = new PublicConecction();
   }
   $in = $_GET['txt'];
   $data = [];
   
   
   if (strlen($in) > 0 ) {
      try {
         $sql = "select branch_code, branch, b_description, b_includes, b_exclude from BRANCH where branch like '%$in%'";
         foreach ($dbo->query($sql) as $nt) {
            $branch = array('branch_code' => $nt['branch_code'], 'branch' => $nt['branch'], 'b_description' => $nt['b_description'], 'b_includes' => $nt['b_includes'], 'b_exclude' => $nt['b_exclude']);
            array_push($data, $branch);
      
            
            
         }
      } catch (Exception $e) {
      
      }
      
   }
   if ($data) {
      echo json_encode($data);
   } else {
      echo "";
   }
   
   $dbo = Null;
   exit();
