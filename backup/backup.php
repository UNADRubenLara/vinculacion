
      <?php
   class BackupModel
   {
      public function __construct($password)
      {
         $this->backup_db($password);
      }
   
      private function backup_db($password)
      {
         if ($_SESSION["role"] == "Admin") {
            include "Mysqldump.php";
            try {
               $dump = new Mysqldump("mysql:host=embryo9.com;dbname=embryoco_vinculacion", "embryoco_unadm", "UNADMEXICO-2020");
               $dump->start("./backup.sql.gzip");
            } catch (\Exception $e) {
               return TxTError . "-" . TXTBackupmailbody . "[" . $e->getMessage() . "]";
            }
            return TXTBackupmailbody . " " . TXTStatusUpdate;
      
         }
         else {
            header("Location: /");
         }
      }
     }
      