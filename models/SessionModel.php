<?php
   
   class SessionModel
   {
      public $connection;
      
      function __construct()
      {
         $this->connection = new SingleConnection();
      }
      
      public function validate_user($user, $pass)
      {
         
         try {
            $stmt = $this->connection->prepare("SELECT * FROM `USERS` WHERE username = :user");
            $stmt->bindParam('user', $user, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
          } catch (PDOException  $ex) {
              $this->connection->trow_error($ex);
         }
         
         if ($data["username"]== $user && password_verify($pass, $data["hidentext"])) {
            $_SESSION['iduser'] = $data["idusuario"];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = ($data['rol'] === '1') ? 'Admin' : 'Usuario';
            $_SESSION['fullname'] = ($data['fullname']);
            $_SESSION['branch'] = ($data['branch']);
            $_SESSION['LEVEL'] = 'home';

            return $data;
         }
         return 0;
         
      }
      
      
   }