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
            $date_init = $date_init . " 00:00:00";
            $date_end = $date_end . " 23:59:59";
            
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
      
      public function create_message($product, $proveedor)
      {
         $messaje_datetime = date("yy-m-d G:i:s");
         $idproducto = $product;
         $idcliente = $_SESSION['iduser'];
         $idproveedor = $proveedor;
         if ($idcliente == $idproveedor) {
            return TXTSameId;
         } else {
            try {
               $stmt = $this->connection->prepare("INSERT INTO `MESSAGES` (`idmessage`, `messaje_datetime`, `idproducto`, `idcliente`, `idproveedor`, `success`) VALUES (NULL, :dt, :pr, :cl, :pv, NULL);");
               $stmt->bindParam(':dt', $messaje_datetime, PDO::PARAM_STR);
               $stmt->bindParam(':pr', $idproducto, PDO::PARAM_STR);
               $stmt->bindParam(':cl', $idcliente, PDO::PARAM_STR);
               $stmt->bindParam(':pv', $idproveedor, PDO::PARAM_STR);
               $stmt->execute();
               $respose = $stmt->errorCode();
               $stmt->closeCursor();
               
            } catch (Exception $ex) {
               return $ex[2];
            }
            return $respose;
         }
      }
      
      public function resend_messages($idmessage)
      {
      }
      
      public function actives_messages($iduser)
      {
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `MESSAGES` WHERE `idcliente` = :id AND `success` IS NULL");
            $stmt->bindParam(':id', $iduser, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (Exception $ex) {
            return $ex[2];
         }
         return $data;
         
      }
      
      public function evaluate_messages($idmessage, $evaluation)
      {
         if ($evaluation >= 0 and $evaluation <= 3) {
            try {
               $stmt = $this->connection->prepare("UPDATE `MESSAGES` SET `success` = :ev WHERE `MESSAGES`.`idmessage` = :id ");
               $stmt->bindParam(':id', $idmessage, PDO::PARAM_STR);
               $stmt->bindParam(':ev', $evaluation, PDO::PARAM_STR);
               
               $stmt->execute();
               $respose = $stmt->errorCode();
               $stmt->closeCursor();
               
            } catch (Exception $ex) {
               return $ex[2];
            }
            return $respose;
         } else {
            
            return TXTErrorOutRange;
         }
      }
      
      private function send_message($product)
      {
         $data = $this->send_message($product);
         return $data;
      }
      
   }
      
      
   