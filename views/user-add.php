<?php
   if ($_POST['LEVEL'] == 'user-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuadduser);
      $template = '
<div class="user-add central-fr-up" >
    <form method="POST" >
        <hr>
        <strong>Nombre de usuario:</strong><input id="username" type="text" name="username" placeholder="Nombre de usuario"
                                                  minlength="5" maxlength="20" required>
        <strong>Contraseña:</strong> <input id="password" type="password" name="hidentext" placeholder="contrasena"
                                            minlength="6" maxlength="40" required>
        <hr>
        <strong>Nombre completo:</strong> <input id="fullname" type="text" name="fullname"
                                                 placeholder="Nombre o denominacion" minlength="5" maxlength="80" size="78"
                                                 required>
        <strong>RFC:</strong> <input id="rfc" type="text" name="rfc" placeholder="RFC" minlength="10" maxlength="16"
                                     size="16" required> <br>
        <hr>
        <strong>Calle y número:</strong> <input id="addresslocal" type="text" name="address_street"
                                                placeholder="Calle y Numero" minlength="5" maxlength="78" size="78"
                                                required><br>
        <strong>Codigo Postal:</strong><input id="zip" type="number" min="1000" max="99999" placeholder="C.P." oninput="LoadZip(this.value);" name="zipzone"/>
        <select id="ziplist" name="idaddress" size="1"></select><br>
        
         <strong>Rama:</strong><input id="branch" type="text" maxlength="20" minlength="4" placeholder="Busqueda..."
               oninput="LoadBranch(this.value);"/>
        <select id="branchlist" name="branch" size="1" required></select>
        <strong>Tamaño:</strong>
         <select id="companytypelist" name="companytype" size="1">
                <option value="1">Micro</option>
                <option value="2">Mediana</option>
                <option value="3">Grande</option>
            </select><br>
          <strong>Telefono:</strong><input id="phone" type="tel" name="phone" placeholder="Telefono" minlength="10"
                                         maxlength="13" required> <br>
        <strong>Correo:</strong><input id="mail" type="email" name="mail" placeholder="Correo" minlength="5" size="25"
                                       required><br>
        <hr>
        <div>
            <input class="button  add" type="submit" value="Agregar">
            <input type="hidden" name="LEVEL" value="user-add">
            <input type="hidden" name="crud" value="add">
        </div>


    </form>
</div>
<br>
<hr>


';
      printf($template);
     
   } else if ($_POST['LEVEL'] == 'user-add' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'add') {
      $new_user = array(
         'username' => $_POST['username'],
         'hidentext' => $_POST['hidentext'],
         'fullname' => $_POST['fullname'],
         'rfc' => $_POST['rfc'],
         'address_street' => $_POST['address_street'],
         'phone' => $_POST['phone'],
         'mail' => $_POST['mail'],
         'idaddress' => $_POST['idaddress'],
         'branch' => $_POST['branch'],
         'companytype' => $_POST['companytype']
      );
      $users_controller = new UsersController();
      $user = $users_controller->add($new_user);
      
      $template = '
<div>
    <p class="item  add">Usuario <b>%s</b></p>
</div>
<script>
    window.onload = function () {
        reloadPage("users")
    }
</script>


';
      
      printf($template, $user);
   
   } else {
     $controller = new ViewController();
     $controller->load_view('error401');
   }
   echo '<script src="./public/js/findzip.js"></script>';
   echo '<script src="./public/js/findbranch.js"></script>';
   echo '<script src="./public/js/validates.js"></script>';