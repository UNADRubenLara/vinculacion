<?php
   
   class UsersController
   {
      private $model;
      
      public function __construct()
      {
         $this->model = new UsersModel();
      }
      
      public function lst()
      {
         return $this->model->list_users();
      }
      
      public function add($user_data = array())
      {
         return $this->model->add($user_data);
      }
      
      public function update($user_data = array())
      {
         return $this->model->update($user_data);
      }
      
      public function get($user_id = '')
      {
         return $this->model->get($user_id);
      }
      
      public function delete($username = '')
      {
         return $this->model->deldelete($username);
      }
      
   }