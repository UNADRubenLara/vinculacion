<?php
   
   
   class MessageController
   {
      
      public function __construct()
      {
         $this->model = new MessageModel();
      }
      
      public function create_message($product, $proveedor)
      {
         return $this->model->create_message($product, $proveedor);
      }
      
      public function actives_messages($iduser)
      {
         return $this->model->actives_messages($iduser);
         
      }
      
      public function list_messages($date_init, $date_end)
      {
         
         return $this->model->list_messages($date_init, $date_end);
      }
      
      public function resend_messages($idmessage)
      {
         
         return $this->model->resend_messages($idmessage);
      }
      
      
   }