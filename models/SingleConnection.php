
   <?php
   class SingleConnection extends PDO
   {
      static private $dsn = "mysql:host=localhost;dbname=prueba";
      static private $username = "root";
      static private $hiddentext = "";
      
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
      
   }