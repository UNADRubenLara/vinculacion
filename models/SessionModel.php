<?php
   
   class SessionModel
   {
      private $connection;
      
      function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      
      public function validate_user($user, $pass)
      {
         $data = array();
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `USERS` WHERE username = :user");
            $stmt->bindParam('user', $user, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
         } catch (Exception $ex) {
         return $ex[2];
         }
         if ($data["username"] && password_verify($pass, $data["hidentext"])) {
            $_SESSION['iduser'] = $data["idusuario"];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = ($data['rol'] === '1') ? 'Admin' : 'Usuario';
            $_SESSION['fullname'] = ($data['fullname']);
           
            return $data;
         }
         return 0;
         
      }
      
      
   }