<?php
   
   
   class BackupController
   {
      private $model;
   
      public function __construct()
      {
         $this->model = new BackupModel();
      }
   
      public function backup_db()
      {
         return $this->model->backup_db();
      }
     
   }