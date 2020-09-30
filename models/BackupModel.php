<?php
class BackupModel
   {
      public function __construct()
      {
      
      }
   
      public function backup_db()
      {
         if ($_SESSION['role'] == 'Admin') {
            include 'Mysqldump.php';
            try {
               $dump = new Mysqldump('mysql:host=kynosargos.com;dbname=kynosarg_prueba', 'kynosarg_test', 'mqsp{)g@fW30');
               $dump->start('./backup/backup.sql');
            } catch (\Exception $e) {
               return TxTError . '-' . TXTBackupmailbody . '[' . $e->getMessage() . ']';
            }
            return TXTBackupmailbody . '' . TXTStatusUpdate;
      
         }
         else {
            header('Location: /');
         }
      }
      

      
   }