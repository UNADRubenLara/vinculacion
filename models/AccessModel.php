<?php
   
   class AccessModel
   {
      
      public function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      
      public function date_access($date_init, $date_end)
      {
         try {
            $date_init=$date_init." 00:00:00";
            $date_end=$date_end." 00:00:00";
            $stmt = $this->connection->prepare("SELECT * FROM `ACCESSLOG` WHERE  (`access_datetime` BETWEEN :di AND :de)");
            $stmt->bindParam(':di', $date_init, PDO::PARAM_STR);
            $stmt->bindParam(':de', $date_end, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
         } catch (Exception $ex) {
            return $ex[2];
         }
         if ($data) {
            $list=array();
            for($i=0; $i<count($data); $i++)
            {
              $id=$data[$i]['idusuario'];
              array_unshift($list,$id);
            }
            return array_count_values($list);
         }
         return 0;
         
      }
      
   }
   