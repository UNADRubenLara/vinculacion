<?php
      header("Cache-Control: public");
      header("Content-Description: File Transfer");
      header("Content-Disposition: attachment; filename=backup.sql.gzip");
      header("Content-Type: application/zip");
      header("Content-Transfer-Encoding: binary");
      readfile("backup.sql.gzip");
 