
   <?php
   class SingleConnection extends PDO
   {
      static private $dsn = "mysql:host=kynosargos.com;dbname=kynosarg_prueba";
      static private $username = "kynosarg_test";
      static private $hiddentext = "mqsp{)g@fW30";
      
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