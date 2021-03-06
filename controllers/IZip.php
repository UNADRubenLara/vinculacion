<?php
   
   
   class IZip
   {
      private $model;
      
      public function __construct()
      {
         $this->model = new ZipModel();
      }
      
      public function findByCode($idZip = '')
      {
         return $this->model->findByCode($idZip);
      }
      
      public function findByZip($zipcode = '')
      {
         if (strlen($zipcode) > 3 && strlen($zipcode) < 6) {
            return $this->model->findByZip($zipcode);
         }
      }
      
      public function loadLargeZip($file)
      {
         return $this->model->loadLargeZip($file);
      }
      
   }
      
      
   