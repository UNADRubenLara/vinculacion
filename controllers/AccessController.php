<?php
   
   
   class AccessController
   {
      private $model;
      
      public function __construct()
      {
         $this->model = new AccessModel();
         
      }
      
      public function add_access($nameuser)
      {
         return $this->model->add_access($nameuser);
      }
      
      public function list_access()
      {
         
         return $this->model->list_access();
         
      }
      
   }