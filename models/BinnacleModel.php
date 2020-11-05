<?php
   
   
   class binnacleModel
   {
      public function __construct($action)
      {
         $this->connection = new SingleConnection();
          $binnacle_datetime = date("yy-m-d G:i:s");
         $usernamecliente = $_SESSION['username'];
          try {
               $stmt = $this->connection->prepare("INSERT INTO `BINNACLE` (`idbinnacle`, `username`, `action`, `actiondate`) VALUES (NULL, :us, :ac, :adt);");
               $stmt->bindParam(':us', $usernamecliente, PDO::PARAM_STR);
               $stmt->bindParam(':ac', $action, PDO::PARAM_STR);
               $stmt->bindParam(':adt', $binnacle_datetime, PDO::PARAM_STR);
               
               $stmt->execute();
               $respose = $stmt->errorCode();
               $stmt->closeCursor();
            
            } catch (Exception $ex) {
               return $ex[2];
            }
            return $respose;
         }
      
      
   }