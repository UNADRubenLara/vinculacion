<?php
   print('<section class="container">
      <section class="center-box flex-item">'
   );
   if ($_SESSION['role'] == 'Admin' && $_SESSION['VALID'] && isset($_POST['action'])) {
      if ($_POST['action'] == 'loadzip') {
         loadzip();
      } elseif ($_POST['action'] == 'changepassword') {
         changepass();
      } elseif ($_POST['action'] == 'backup') {
         backup();
      } else {
         printform();
      }
   } elseif ($_SESSION['role'] == 'Admin' && $_SESSION['VALID']) {
      printform();
   } else {
      refreshtime(0);
   }
   
   function printform()
   {
      printf(' <h2 class="form-Title">%s</h2>', TXTmenuTools);
      
      $templatezip = '
                       <form class="central-fr-up" method="post" enctype="multipart/form-data">
                       <h2 >%s: </h2>
                       <br>
                       <label for="files" class="upload">%s</label>
                       <input id="files"  type="file" name="ziptable" style="visibility:hidden;">
                       <input type="hidden" name="action" value="loadzip">
                       <input type="submit" value="%s" >
                    </form>
        </section>';
      printf($templatezip, TXTloadZipTable, TXTSelectfile, TXTUserBtnActivate);
      
      $templatepass = '
        <section class="center-box flex-item">
        <h2>%s</h2>
                  <form class="central-fr-up" method="post">
                       <label for="oldpassword>">%s: </label><input type="password" name="oldpassword"><br>
                       <label for="password>">%s: </label><input id="password" type="password" name="password" oninput="verifypass();"><br>
                       <label for="verifynewpass>">%s: </label><input id="verifinewpassword" type="password" name="verifinewpassword" oninput="verifypass();">
                       <br>
                       <label id="msgpassword" hidden>%s</label>
                       <br>
                       <input type="hidden" name="action" value="changepassword">
                       <label id="username" hidden></label>
                       <input id="updatepass" type="submit" value="%s" disabled>
                    </form>
            </section>';
      printf(
         $templatepass,
         TXTpasschange,
         TXTOldPass,
         TXTNewPass,
         TXTverifyPass,
         TXTNotMatch,
         TXTBtnUpdate
      );
      
      $templatebk = '
        <section class="center-box flex-item">
        <h2>%s</h2>
        <form class="central-fr-up" method="post">
           <input type="hidden" name="action" value="backup">
           <label for="backuppassword>">%s: </label><input type="password" name="backuppassword" id="backuppassword" oninput="verifybackup();"><br>
           <label id="username" hidden></label>
           <input id="backupdata" type="submit" value="%s" disabled>
        </form>';
      printf(
         $templatebk,
         TXTBackup,
         TXTplaceholderpass,
         TXTBackup);
      
      
   }
   
   function loadzip()
   {
      $ext = pathinfo($_FILES['ziptable']['name'], PATHINFO_EXTENSION);
      if ($ext == 'sql') {
         $filltable = new IZip();
         printf('<h2 class="form-Title">%s</h2>', TXTmenuTools);
         $templatezip = '
                    <section class="center-box">
                    <section class="container">
                    <section class="flex-item">
                    <h2>%s</h2>
                    </section>';
         printf($templatezip, TXTWait);
         
         $response = $filltable->loadLargeZip($_FILES["ziptable"]["tmp_name"]);
         
         $templatezip = '<section class="container">
                <section class="flex-item">
                <h2>%s</h2>
                </section>';
         
         if ($response[0] = 0) {
            printf($templatezip,
               TXTStatusUpdate);
         } elseif ($response[0] = 1062) {
            printf($templatezip,
               TXTduplicated);
         } else {
            $errortext = TXTError . $response[0];
            printf($templatezip,
               $errortext);
         }
         echo '<form method="post"> <input type="submit" value="' . TXTReturn . '"></form>';
      } else {
         unset($_FILES['ziptable']['tmp_name']);
         echo '<h2 class="form-Title">' . TXTError . ' ' . TXTDownloadfile . '</h2>';
         echo '<form method="post"> <input type="submit" value="' . TXTReturn . '"></form>';
      }
      
   }
   
   function backup()
   {
      $admindata = new UsersController();
      $pass = $_POST['backuppassword'];
      
      if ($admindata->Validate_Admin($pass)) {
         $backupfile = new BackupController();
         $backupfile->backup_db();
         echo '<h2 class="form-Title">' . TXTBackupok . '</h2>';
         echo '<a href="./backup/backup.sql.gzip" download>' . TXTDownloadfile . '</a>';
      } else {
         echo '<h2 ">' . TXTError . ' ' . TXTplaceholderpass . '</h2>';
         echo '<form method="post"> <input type="submit" value="' . TXTReturn . '"></form>';
      }
   }
   
   function changepass()
   {
      $admindata = new UsersController();
      $oldpassword = $_POST['oldpassword'];
      $password = $_POST['password'];
      unset($_POST['action']);
      echo '<h2 class="form-Title">' . $admindata->update_pass_admin($oldpassword, $password) . '</h2>';
      echo '<form method="post"> <input type="submit" value="' . TXTReturn . '"></form>';
   }
   
   function refreshtime($time)
   {
      header("Refresh:" . $time);
   }

?>
<script type="application/javascript">
    function verifypass() {
        username.value = 'Admin';
        if (document.getElementById("verifinewpassword").value === document.getElementById("password").value && document.getElementById("password").value.length > 5) {
            document.getElementById("updatepass").disabled = false;
            document.getElementById("verifinewpassword").style.color = "black";
            document.getElementById("msgpassword").hidden = true;
        } else {
            document.getElementById("updatepass").disabled = true;
            document.getElementById("verifinewpassword").style.color = "red";
            if (document.getElementById("password").value.length < 6) {
                document.getElementById("msgpassword").innerText = 'Muy Corto';
            } else {
                document.getElementById("msgpassword").innerText = 'No Coinciden';
            }
            document.getElementById("msgpassword").hidden = false;
            document.getElementById("msgpassword").hidden = false;

        }
    }

    function verifybackup() {
        document.getElementById("backupdata").disabled = document.getElementById("backuppassword").value.length < 6;
    }
</script>
