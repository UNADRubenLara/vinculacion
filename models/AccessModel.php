<?php
   
      class AccessModel
   {
   
      public function __construct()
      {
         $this->connection = new SingleConnection();
      }

   
 
      public function add_access($username)
      {
      }

      public function list_access()
      {
         $data = array();
         return $data;
      
      }
   
   }
   