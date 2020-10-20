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
      
   }
