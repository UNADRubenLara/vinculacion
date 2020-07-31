<?Php
   include_once "publicconection.php";
   if(!isset($dbo)){
      $dbo=new PublicConecction();
   }
   $in=$_GET['txt'];
   if(!ctype_digit ($in)){
      echo "Data Error";
      exit;
   }
   
   if(strlen($in)>2 and strlen($in) <5 )
   {
      try {
         $sql="SELECT * FROM `BRANCH` WHERE `branch` LIKE '%sistemas%''$in%'";
         $data = [];
         foreach ($dbo->query($sql) as $nt){
            $branch=array('branch_code' => $nt['branch_code'],'branch' =>$nt['branch'] ,'b_description' => $nt['b_description'],'b_includes' =>$nt['b_includes'],'b_exclude' =>$nt['b_exclude'] );
            array_push($data,$branch);
         }
      } catch (Exception $e) {
      
      }
      
   }
   if ($data) {echo json_encode($data);}
   else{ echo "";}
   
   $dbo=Null;
   exit();
