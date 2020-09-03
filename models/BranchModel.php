<?php
   
   
   class BranchModel
   {
      public function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      public function findByCode($idBranch)
      {
         try {
            $stmt = $this->connection->prepare("select  branch, b_description, b_includes, b_exclude from BRANCH where branch_code like :id");
            $stmt->bindParam('id', $idBranch, PDO::PARAM_INT);
            $stmt->execute();
            $branch = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = array('branchText' => $branch['branch'], 'b_description' => $branch['b_description'], 'b_includes' => $branch['b_includes'], 'b_exclude' => $branch['b_exclude']);
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         
         return $data;
      }
      
      
      public function findByText($text)
      {
         $text = '%' . $text . '%';
         try {
            $stmt = $this->connection->prepare("select branch_code, branch, b_description, b_includes, b_exclude from BRANCH where branch like :text");
            $stmt->bindParam('text', $text, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchall();
            foreach ($data as $nt) {
               $branch = array('branch_code' => $nt['branch_code'], 'branch' => $nt['branch'], 'b_description' => $nt['b_description'], 'b_includes' => $nt['b_includes'], 'b_exclude' => $nt['b_exclude']);
               array_push($data, $branch);
            }
         } catch (PDOException  $ex) {
            $this->connection->trow_error($ex);
         }
         
         if ($data) {
            return $data;
         } else {
            return 0;
         }
         
         
      }
      
   }