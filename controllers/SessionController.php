<?php
   
   class SessionController
   {
      private $session;
      
      public function __construct()
      {
         $this->session = new SessionModel();
      }
      
      public function login($user, $pass)
      {
         return $this->session->validate_user($user, $pass);
         
      }
      
      public function valid_session($session)
      {
         return new UsersModel($session);
      }
      
      public function logout()
      {
         if (!isset($_SESSION)) {
            session_start();
         }
         session_destroy();
         header('Location: ./');
      }
      
   }
