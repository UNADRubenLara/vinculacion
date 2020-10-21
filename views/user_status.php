<?php
   if ($_POST['LEVEL'] == 'user_status' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTStatus);
      $users_controller = new UsersController();
      $status_user = $users_controller->get_user($_POST['username']);
      $template = '
        <div class="user-edit central-fr-up" >
        <form method="POST" >
        <hr>
        <label for="">Nombre de usuario:</label><input id="username" readonly type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ :,;$)]+" name="username"
        placeholder="Nombre de usuario" value="%s" minlength="5" maxlength="20" required> <h2 class="%s">%s</h2>
        <hr>
        <label for="">Contraseña:</label> <input id="password" type="password" name="hidentext" placeholder="contraseña" value=""
                                            minlength="6" maxlength="40" required>
        <input type="submit" class="%s" name="change" value="%s">
        <hr>
         <input type="hidden" name="crud" value="change">
         <input type="hidden" name="LEVEL" value="user_status">
         <input type="hidden" name="newStatus" value="%s">';
      
      if ($status_user['status'] == 1) {
         $txtStatus = TXTUserStatusActive;
         $statusChange = '2';
         $status = 'Activo';
         $ChangeToStatus = 'suspend';
         $classStatus = 'activate';
         $txtChangeToStatus = TXTUserBtnSuspend;
      } else {
         $txtStatus = TXTUserStatusInactive;
         $statusChange = '1';
         $ChangeToStatus = 'activate';
         $classStatus = 'suspend';
         $txtChangeToStatus = TXTUserBtnActivate;
         
      }
      
      printf($template, $_POST['username'], $classStatus, $txtStatus, $ChangeToStatus, $txtChangeToStatus, $statusChange);
      
      
   } elseif ($_POST['LEVEL'] == 'user_status' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'change') {
      
      $users_controller = new UsersController();
      $changeUser = array(
         'username' => $_POST['username'],
         'valid' => $_POST['hidentext'],
         'newStatus' => $_POST['newStatus']
      );
      echo '<t1 class="errorText">' . $users_controller->change_status($changeUser) . '</t1>';
      
      $template = '
<script>
    window.onload = function () {
        reloadPage("users")
    }
</script>
';
      
      printf($template);
      
   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
   echo '<script src="./public/js/findzip.js"></script>';
   echo '<script src="./public/js/findbranch.js"></script>';
   echo '<script src="./public/js/validates.js"></script>';
   
      
   