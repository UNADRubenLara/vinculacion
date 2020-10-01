<?php
   if ($_SESSION['role'] == 'Admin' && $_SESSION['VALID']) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuTools);
      $template = '
       <section class="container">
      <section class="center-box flex-item">
                     <form class="central-fr-up" method="post" enctype="multipart/form-data">
                       <h2 >%s: </h2>
                       <br>
                       <input type="file" name="ziptable">
                       <input type="hidden" name="action" value="loadzip">
                       <input type="submit" value="%s" >
                    </form>
            
            
        </section>
        
      ';
      printf($template, TXTloadZipTable, TXTUserBtnActivate);
      
      $template = '
     
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
       
            </section>

      
      ';
      printf(
         $template,
         TXTpasschange,
         TXTOldPass,
         TXTNewPass,
         TXTverifyPass,
         TXTNotMatch,
         TXTBtnUpdate
      );
      
      
      $template = '
 <section class="center-box flex-item">
        <h2>%s</h2>
        <form class="central-fr-up" method="post">
                       <input type="hidden" name="action" value="backup">
                       <label for="backuppassword>">%s: </label><input type="password" id="backuppassword" oninput="verifybackup();"><br>
                       <label id="username" hidden></label>
                       <input id="backupdata" type="submit" value="%s" disabled>
                    </form>
      ';
      printf(
         $template,
         TXTBackup,
         TXTplaceholderpass,
         TXTBackup
      );
      
   }
   if ($_SESSION['role'] == 'Admin' && $_SESSION['VALID'] && isset($_POST['action'])) {
      if ($_POST['action'] == 'loadzip') {
         if ($_FILES['ziptable']['tmp_name'] == null) {
            echo '<h2>' . TXTErrorOutRange . '</h2>';
            refreshtime(2);
         } else {
            $filltable = new IZip();
            printf('<h2 class="form-Title">%s</h2>', TXTmenuTools);
            $template = '
      <section class="center-box">
            <section class="container">
                <section class="flex-item">
                    <h2>%s</h2>
                </section>
      ';
            printf($template, TXTWait);
            if (isset($filltable)) {
               if (!empty($filltable)) {
                  $response = $filltable->loadLargeZip($_FILES["ziptable"]["tmp_name"]);
               }
            }
            $template = '<section class="container">
                <section class="flex-item">
                    <h2>%s</h2>
                </section>
      ';
            
            if ($response[0] = 0) {
               printf($template,
                  TXTStatusUpdate);
            } elseif ($response[0] = 1062) {
               printf($template,
                  TXTduplicated);
            } else {
               $errottext = TXTError . $response[0];
               printf($template,
                  $errottext);
               
            }
         }
      } elseif ($_POST['action'] == 'changepassword') {
         $admindata = new UsersController();
         $oldpassword = $_POST['oldpassword'];
         $password = $_POST['password'];
         echo '<h2 class="form-Title">' . $admindata->update_pass_admin($oldpassword, $password) . '</h2>';
         refreshtime(2);
      } elseif ($_POST['action'] == 'backup') {
         $backupfile=new BackupController();
         $backupfile->backup_db();
         echo '<h2 class="form-Title">' . 'Respaldo hecho' . '</h2>';
         echo '<a href="./backup/backup.sql" target="_blank">'.TXTDownloadfile.'</a>';
         
      } else {
         refreshtime(0);
      }
      
      
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
        document.getElementById("backupdata").disabled = document.getElementById("backuppassword").value.length < 6 ? true : false;
    }
</script>
