<?php
   
   class UsersModel
   {
      
      public function __construct($user_data = array())
      {
         $this->connection = new SingleConnection();
      }
      
      public function list_users()
      {
         $data = array();
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `USERS`");
            $stmt->execute();
            $data = $stmt->fetchAll();
         } catch (Exception $ex) {
         
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function add($user_data = array())
      {
         try {
            $status=1;
            $rol=2;
            $stmt = $this->connection->prepare("INSERT INTO `USERS` (`idusuario`, `username`, `hidentext`, `address_street`, `phone`, `mail`, `fullname`, `rfc`, `rol`, `branch`, `companytype`, `status`, `ZP_ADDRESS_idADDRESS`) VALUES (NULL, :u, :h, :a, :p, :m, :f, :r, :rol, :b, :c, :s, :i)");
            $stmt->bindParam(':u', $user_data['username'], PDO::PARAM_STR );
            $stmt->bindParam(':h', $user_data['hidentext'], PDO::PARAM_STR);
            $stmt->bindParam(':a', $user_data['address_street'], PDO::PARAM_STR);
            $stmt->bindParam(':p', $user_data['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':m', $user_data['mail'], PDO::PARAM_STR);
            $stmt->bindParam(':f', $user_data['fullname'], PDO::PARAM_STR);
            $stmt->bindParam(':r', $user_data['rfc'], PDO::PARAM_STR);
            $stmt->bindParam(':rol', $rol, PDO::PARAM_INT );
            $stmt->bindParam(':b', $user_data['branch'], PDO::PARAM_INT );
            $stmt->bindParam(':c', $user_data['companytype'], PDO::PARAM_INT );
            $stmt->bindParam(':s', $status, PDO::PARAM_INT );
            $stmt->bindParam(':i', $user_data['idaddress'], PDO::PARAM_INT );
            $stmt->execute();
            if($this->connection->lastInsertId()==0){return $user_data['username'].' No guardado verificar duplicado'; }
            else{return lastInsertId().'-'.$user_data['username'].' Guardado';}
            } catch (Exception $ex) {
            if ($ex->errorInfo[1] == 1062) {
               return "Registro duplicado";
                exit();
            } else {
               return $ex->errorInfo[2];
            }
         }
         
      }
      
      public function update($user_data = array())
      {
         //UPDATE INTO `USERS` (`idusuario`, `username`, `hidentext`, `address_street`, `phone`, `mail`, `fullname`, `rfc`, `idaddress`, `rol`, `branch`, `companytype`, `status`) VALUES (NULL, 'usr', 'sss', 'address', '4272887384', 'rlarap@homtmail.com', 'Ruben', 'lapa720109', '104049', '2', '5415', '1', '1')
      
      }
      
      public function suspend($user_id = '')
      {
         //UPDATE `USERS` SET `status` = '2' WHERE `USERS`.`idusuario` = 2 AND `USERS`.`status` = 1
         
      }
      
      public function reactivate($user_id = '')
      {
         //UPDATE `USERS` SET `status` = '1' WHERE `USERS`.`idusuario` = 2 AND `USERS`.`status` = 2
         
      }
   }
