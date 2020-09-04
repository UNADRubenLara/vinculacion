<?php
   $host = $_POST['host'];
   $dbname = $_POST['dbname'];
   $dbuser = $_POST['dbuser'];
   $dbpassword = $_POST['dbpassword'];
   $password = $_POST['password'];
   echo '<h1>Espere, Creando Base de datos </h1>>'.$password;
   $file = fopen("../models/SingleConnection.php", "w");
    $template = '
   <?php
   class SingleConnection extends PDO
   {
      static private $dsn = "mysql:host=' . $host . ';dbname=' . $dbname . '";
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
   createdb($host,$dbname,$dbuser,$dbpassword);
   createtables($host, $dbuser, $dbpassword, $dbname);
   createadmin($host, $dbuser, $dbpassword, $dbname,$password);
   loadLargeZip($host, $dbuser, $dbpassword, $dbname,$password);
   closeinstall($host);
   header('Location: http://'.$host.'/vinculacion/');
   
   
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
      $sqlfiles=array('vincula_table_ACCESSLOG.sql',
         'vincula_table_BRANCH.sql',
         'vincula_table_COMPANY_TYPE.sql',
         'vincula_table_MESSAGES.sql',
         'vincula_table_PRODUCT_DETAIL.sql',
         'vincula_table_ROL.sql',
         'vincula_table_STATUS.sql',
         'vincula_table_USERS.sql',
         'vincula_table_ZP_ADDRESS.sql',
         'vincula_extra.sql'
         );
      
      $conn = new mysqli($host, $dbuser, $dbpassword, $dbname);
      if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
      }
      if ($conn->query('USE '.$dbname) === TRUE) {
         echo "Database selected successfully";
      } else {
         echo "Error selecting database: " . $conn->error;
      }

      foreach ($sqlfiles as $sql){
         $fileSQL = file_get_contents($sql);
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
      
      }
      
      $conn->close();
   }
   function createadmin($host, $dbuser, $dbpassword, $dbname,$password){
      $hidentext = password_hash($password, PASSWORD_DEFAULT);
      $conn = new mysqli($host, $dbuser, $dbpassword, $dbname);
      $sql = "INSERT INTO `users` (`idusuario`, `username`, `hidentext`, `address_street`, `phone`, `mail`, `fullname`, `rfc`, `rol`, `branch`, `companytype`, `status`, `ZP_ADDRESS_idADDRESS`) VALUES (NULL, 'admin', '$hidentext', 'admin', '5555555555', 'vinculacion@vinculacion.edu', 'Administrador', 'XEXX010101000', '1', '5415', '2', '1', '145421');";
      if ($conn->query($sql) === TRUE) {
         echo "Admin created successfully";
      } else {
         echo "Error creating Admin: " . $conn->error;
      }
      $conn->close();
   }
   
 function loadLargeZip($host, $dbuser, $dbpassword, $dbname){
    $conn = new mysqli($host, $dbuser, $dbpassword, $dbname);
    $handle = fopen('ZP_ADDRESS.sql', 'rb');
    if ($handle) {
       while (!feof($handle)) {
          $buffer = stream_get_line($handle, 1000000, ";\n");
          $conn->query($buffer);
       }
    }
    //echo "Peak MB: ",memory_get_peak_usage(true)/1024/1024;
 }
   function closeinstall($host){
      $template="
      <?php
       header('Location: http:'.$host.'/vinculacion/');
      ";
      $indexFile = fopen("index.php", "w");
      
      fwrite($indexFile, $template);
      fclose($indexFile);
   }
      
      
   