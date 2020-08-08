<?php
   
   class UsersModel
   {
      private $users = array();
      
      public function __construct()
      {
         $this->findZip= new ZipModel();
         $this->findbranch= new BranchModel();
         $this->connection = new SingleConnection();
                  $UserList = $this->load_users();
         for ($i = 0; $i < count($UserList); ++$i) {
            $AddBranch = $this->brand_search($UserList[$i]['branch']);
            $UserList[$i]["branchText"] = $AddBranch['branchText'];
            $AddAddress = $this->findByCode($UserList[$i]['ZP_ADDRESS_idADDRESS']);
            while (list($key, $value) = each($AddAddress)) {
               $UserList[$i][$key] = $value;
            }
         }
         $this->users=$UserList;
      }
      
      public function load_users()
      {
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `USERS`");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         } catch (Exception $ex) {
            return $ex[2];
         }
         if ($data) {
            return $data;
         }
         return 0;
      }
      
      public function list_users()
      {
         return $this->users;
      }
      
      public function get_user($username)
      {
         foreach ($this->users as $user) {
            if ($user['username'] == $username) {
               return $user;
            }
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
               return $ex->errorInfo[2];
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
      
      public function change_status($changeUser= array())
      {
         if ($_SESSION['role'] == 'Admin') {
            if ($this->Validate_Admin($changeUser['valid']))
            {
               try {
               $stmt = $this->connection->prepare("UPDATE `USERS` SET `status` = :s WHERE `USERS`.`username` = :u ");
               $stmt->bindParam(':u', $changeUser['username'], PDO::PARAM_STR);
               $stmt->bindParam(':s', $changeUser['newStatus'], PDO::PARAM_INT);
               $stmt->execute();
               return ' Actualizado';
            } catch (Exception $ex) {
               return $ex->errorInfo[2];
               
            }
         }
            else{
               return TxTError.' '.TXTplaceholderpass;
            }
      }
      }
      private function Validate_Admin($hiddenText=''){
      if(password_verify($hiddenText, $this->users[0]['hidentext'])) {
            return true;
         }else{
            return false;
         }
         
         
      }
      
      
      private function findByCode($idCode){
      
         return $this->findZip->findByCode($idCode);
      }
   
   
      private function brand_search($branchCode){
         return $this->findbranch->findByCode($branchCode);
      }
   }
