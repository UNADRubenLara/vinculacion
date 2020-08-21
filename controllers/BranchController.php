<?php
   
   
   class BranchController
   {
      private $model;
      
      public function __construct()
      {
         $this->model = new BranchModel();
      }
      
      public function findByText($txt = '')
      {
         if (strlen($txt) > 3 && strlen($txt) < 20) {
            return json_encode($this->model->findByText($txt));
            
         }
         
      }
      
      public function findByCode($idBranch = '')
      {
         
         return $this->model->findByCode($idBranch);
         
      }
   }