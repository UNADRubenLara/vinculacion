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
      
      public function get_user($username = '')
      {
         return $this->model->get_user($username);
      }
      
      public function suspend($user_id= '')
      {
         return $this->model->suspend($user_id);
   }
   }