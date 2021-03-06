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
         if ($_SESSION['role'] == 'Admin') {
            return $this->model->add($user_data);
         }
      }
      
      public function update($user_data = array())
      {
         if ($_SESSION['role'] == 'Admin') {
            return $this->model->update($user_data);
         }
      }
      
      public function get_user($username = '')
      {
         return $this->model->get_user($username);
      }
      
      public function get_data_user($username)
      {
         return $this->model->get_data_user($username);
      }
      
      public function change_status($changeUser = array())
      {
         if ($_SESSION['role'] == 'Admin') {
            return $this->model->change_status($changeUser);
         }
      }
      
      public function get_branch($username)
      {
         return $this->model->get_branch($username);
      }
      
      public function update_pass_admin($hiddenText, $newhiddenText)
      {
         return $this->model->update_pass_admin($hiddenText, $newhiddenText);
      }
      
      public function Validate_Admin($hiddenText)
      {
         return $this->model->Validate_Admin($hiddenText);
      }
   }