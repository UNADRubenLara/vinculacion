<?php
   $host = $_POST['host'];
   $dbname = $_POST['dbname'];
   $dbuser = $_POST['dbuser'];
   $dbpassword = $_POST['dbpassword'];
   /*$file = fopen("../models/Connection.php", "w");
   $template = '
   <?php
   class SingleConnection extends PDO
   {
      static private $dsn = "mysql:host=' . $host . ';' . $dbname . '";
      static private $username = "' . $dbuser . '";
      static private $hiddentext = "' . $dbpassword . '";
      
      protected $rows = array();
      
      public function __construct()
      {
         try {
            parent::__construct(self::$dsn, self::$username, self::$hiddentext, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
         } catch (PDOException $e) {
            die("PDO CONNECTION ERROR: " . $e->getMessage());
         }
         
      }
      public function trow_error($ex){
         die("PDO CONNECTION ERROR: " . $ex->getMessage());
         echo $ex->getCode();
         
      }
      
   }';
   fwrite($file, $template);
   fclose($file);
   //createdb($host,$dbname,$dbuser,$dbpassword);
   //createtables($host, $dbuser, $dbpassword, $dbname);
   //header('Location: http://'.$host);
   
   
   function createdb($host, $dbname, $dbuser, $dbpassword)
   {
      
      $conn = new mysqli($host, $dbuser, $dbpassword);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
      $sql = "CREATE DATABASE " . $dbname;
      if ($conn->query($sql) === TRUE) {
         echo "Database created successfully";
      } else {
         echo "Error creating database: " . $conn->error;
      }
      $conn->close();
   }
   
   function createtables($host, $dbuser, $dbpassword, $dbname)
   {
      $conn = new mysqli($host, $dbuser, $dbpassword, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
      if ($conn->query('USE '.$dbname) === TRUE) {
         echo "Database created successfully";
      } else {
         echo "Error creating database: " . $conn->error;
      }
      $fileSQL = file_get_contents('vincula_table_USERS.sql');
      if ($conn->multi_query($fileSQL)) {
         do {
            if ($result = $conn->store_result()) {
               while ($row = $result->fetch_assoc()) {
                  echo$row;
                                            }
               $result->free();
            }
            
         } while ($conn->next_result());
      }
      $conn->close();
      
   }*/
   
 
   
      
      
   