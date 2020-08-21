<?php
   
   
   class MessageController
   {
      
      public function __construct()
      {
         $this->model = new MessageModel();
      }
      
      public function create_message($product)
      {
         return $this->model->create_message($product);
      }
      
      public function list_messages()
      {
         
         return $this->model->list_messages();
      }
      
      public function resend_messages($idmessage)
      {
         
         return $this->model->resend_messages($idmessage);
      }
      
      
   }