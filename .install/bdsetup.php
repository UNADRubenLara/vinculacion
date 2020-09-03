<?php
   
   $host = $_GET['host'];
   $dbname = $_GET['dbname'];
   $dbuser = $_GET['dbuser'];
   $dbpassword = $_GET['dbpassword'];
   $dsn = 'mysql:host=' . $host . ';';
   $dbo = new BDConnection($dsn, $dbuser, $dbpassword);
   echo $dbo->getAttribute(PDO::ATTR_DRIVER_NAME);
   class BDConnection extends PDO
   {
      protected $rows = array();
            public function __construct($dsn, $username, $hiddentext)
      {
         try {
            parent::__construct($dsn, $username, $hiddentext, array(PDO::ATTR_PERSISTENT => false, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
         } catch (PDOException $e) {
            die("PDO CONNECTION ERROR: " . $e->getMessage());
         }
         
      }
      
      
   }