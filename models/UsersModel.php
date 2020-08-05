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
      
            public function get_user($username)
      {
         if ($_SESSION['role'] == 'Admin') {
            $data = array();
            try {
               $stmt = $this->connection->prepare("SELECT * FROM `USERS` WHERE username = :username");
               $stmt->bindParam('username', $username, PDO::PARAM_STR);
               $stmt->execute();
               $data = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $ex) {
            
            }
            if ($data["username"]) {
               $location=$data['ZP_ADDRESS_idADDRESS'];
               foreach ($this->zip_search($location) as $value) {
                  array_push($data, $value);
               }
               return $data;
            }
         }
         return 0;
         
      }
      public function zip_search($zipcode)
      {
          if (!ctype_digit($zipcode)) {
          exit;
         }
             $data = [];
            try {
               $stmt = $this->connection->prepare("select idADDRESS, C_CODIGO, C_NOMBRE, D_TIPOASENTAMIENTO, D_MUNICIPIO, D_ESTADO, D_CIUDAD  from ZP_ADDRESS where idADDRESS like :zip");
               $stmt->bindParam('zip', $zipcode, PDO::PARAM_STR);
               $stmt->execute();
               $zip = $stmt->fetch(PDO::FETCH_ASSOC);
               $data = array('idADDRESS' => $zip['idADDRESS'],'C_CODIGO' => $zip['C_CODIGO'], 'C_NOMBRE' => $zip['C_NOMBRE'], 'D_MUNICIPIO' => $zip['D_MUNICIPIO'], 'D_ESTADO' => $zip['D_ESTADO']);
            } catch (Exception $e) {
            }

         if ($data) {
            return $data;
         } else {
            return 0;
         }
         
      }
      
      public function add($user_data = array())
      {
         if ($_SESSION['role'] == 'Admin') {
            $password = password_hash($user_data['hidentext'], PASSWORD_DEFAULT);
            try {
               $status = 1;
               $rol = 2;
               
               $stmt = $this->connection->prepare("INSERT INTO `USERS` (`idusuario`, `username`, `hidentext`, `address_street`, `phone`, `mail`, `fullname`, `rfc`, `rol`, `branch`, `companytype`, `status`, `ZP_ADDRESS_idADDRESS`) VALUES (NULL, :u, :h, :a, :p, :m, :f, :r, :rol, :b, :c, :s, :i)");
               $stmt->bindParam(':u', $user_data['username'], PDO::PARAM_STR);
               $stmt->bindParam(':h', $password, PDO::PARAM_STR);
               $stmt->bindParam(':a', $user_data['address_street'], PDO::PARAM_STR);
               $stmt->bindParam(':p', $user_data['phone'], PDO::PARAM_STR);
               $stmt->bindParam(':m', $user_data['mail'], PDO::PARAM_STR);
               $stmt->bindParam(':f', $user_data['fullname'], PDO::PARAM_STR);
               $stmt->bindParam(':r', $user_data['rfc'], PDO::PARAM_STR);
               $stmt->bindParam(':rol', $rol, PDO::PARAM_INT);
               $stmt->bindParam(':b', $user_data['branch'], PDO::PARAM_INT);
               $stmt->bindParam(':c', $user_data['companytype'], PDO::PARAM_INT);
               $stmt->bindParam(':s', $status, PDO::PARAM_INT);
               $stmt->bindParam(':i', $user_data['idaddress'], PDO::PARAM_INT);
               $stmt->execute();
               if ($this->connection->lastInsertId() == 0) {
                  return $user_data['username'] . ' No guardado verificar duplicado';
               } else {
                  return $user_data['username'] . ' Guardado';
               }
            } catch (Exception $ex) {
               if ($ex->errorInfo[1] == 1062) {
                  return "Registro duplicado";
                  exit();
               } else {
                  return $ex->errorInfo[2];
               }
            }
         }
         
      }
      
      public function update($user_data = array())
      {
         if ($_SESSION['role'] == 'Admin') {
            $password = password_hash($user_data['hidentext'], PASSWORD_DEFAULT);
            try {
               $status = 1;
               
               $stmt = $this->connection->prepare("UPDATE `USERS` SET `address_street` = :a, `hidentext`= :h, `phone` = :p, `mail`= :m, `fullname` = :f, `rfc` = :r, `branch` = :b, `companytype` = :c, `status` = :s, `ZP_ADDRESS_idADDRESS` = :i  WHERE `USERS`.`idusuario` = :id AND `USERS`.`username` = :u ");
               $stmt->bindParam(':id', $user_data['idusuario'], PDO::PARAM_INT);
               $stmt->bindParam(':u', $user_data['username'], PDO::PARAM_STR);
               $stmt->bindParam(':h', $password, PDO::PARAM_STR);
               $stmt->bindParam(':a', $user_data['address_street'], PDO::PARAM_STR);
               $stmt->bindParam(':p', $user_data['phone'], PDO::PARAM_STR);
               $stmt->bindParam(':m', $user_data['mail'], PDO::PARAM_STR);
               $stmt->bindParam(':f', $user_data['fullname'], PDO::PARAM_STR);
               $stmt->bindParam(':r', $user_data['rfc'], PDO::PARAM_STR);
               $stmt->bindParam(':b', $user_data['branch'], PDO::PARAM_INT);
               $stmt->bindParam(':c', $user_data['companytype'], PDO::PARAM_INT);
               $stmt->bindParam(':s', $status, PDO::PARAM_INT);
               $stmt->bindParam(':i', $user_data['idaddress'], PDO::PARAM_INT);
               echo $stmt->execute();
                                 return $user_data['username'] . ' Actualizado';
               
            } catch (Exception $ex) {
              
                  return $ex->errorInfo[2];
              
            }
         }
      }
      
      public function suspend($user_id = '')
      {
         if ($_SESSION['role'] == 'Admin') {
            
            try {
               $stmt = $this->connection->prepare("UPDATE `USERS` SET `status` = '2' WHERE `USERS`.`idusuario` = :id AND `USERS`.`status` = 1");
               $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
               echo $stmt->execute();
               return  ' Actualizado';
              } catch (Exception $ex) {
              return $ex->errorInfo[2];
         
            }
         }
      }
      
      
      public function reactivate($user_id = '')
      {
         //UPDATE `USERS` SET `status` = '1' WHERE `USERS`.`idusuario` = 2 AND `USERS`.`status` = 2
         if ($_SESSION['role'] == 'Admin') {
      
            try {
               $stmt = $this->connection->prepare("UPDATE `USERS` SET `status` = '1' WHERE `USERS`.`idusuario` = :id AND `USERS`.`status` = 2");
               $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
               echo $stmt->execute();
               return ' Actualizado';
            } catch (Exception $ex) {
               return $ex->errorInfo[2];
         
            }
         }
         
      }
   }
