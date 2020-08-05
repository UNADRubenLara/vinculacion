<?php
   if ($_POST['LEVEL'] == 'user_status' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTStatus);
      $users_controller = new UsersController();
      $template = '
        <div class="user-edit central-fr-up" >
        <form method="POST" >
        <hr>
        <strong>Nombre de usuario:</strong><input id="username" disabled type="text" name="username" placeholder="Nombre de usuario" value="%s"
                                                  minlength="5" maxlength="20" required>
        <hr>
        <strong>Contraseña:</strong> <input id="password" type="password" name="hidentext" placeholder="contraseña" value=""
                                            minlength="6" maxlength="40" required>
        <hr>
         <input type="hidden" name="crud" value="STATUS">';
   } else if ($_POST['LEVEL'] == 'user_status' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'suspend') {
      printf($template, $_POST['USERNAME']);
      
      $suspend_user = array(
         'idusuario' => $_POST['idusuario'],
         'username' => $_POST['username'],
         'valid' => $_POST['hidentext']
      );
      $users_controller = new UsersController();
      $users_controller->suspend($suspend_user);
  
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
      
      
   