<?php
   
   
   class MessageModel
   {
      
      public function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      public function list_messages()
      {
         $data = array();
         return $data;
      }
      
      public function create_message($product)
      {
         $data = $this->send_message($product);
         return $data;
      }
      
      private function send_message($product)
      {
         $data = array();
         return $data;
      }
      
      public function resend_messages($idmessage)
      {
      }
      
      
   }