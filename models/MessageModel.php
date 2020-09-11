<?php
   
   
   class MessageModel
   {
      
      public function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      public function list_messages($date_init, $date_end)
      {
         try {
            $date_init=$date_init." 00:00:00";
            $date_end=$date_end." 00:00:00";
            
            $stmt = $this->connection->prepare("SELECT * FROM `MESSAGES` WHERE  (`messaje_datetime` BETWEEN :di AND :de)");
            $stmt->bindParam(':di', $date_init, PDO::PARAM_STR);
            $stmt->bindParam(':de', $date_end, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
         } catch (Exception $ex) {
            return $ex[2];
         }
         if ($data) {
            return $data;
         }
         return 0;
   
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