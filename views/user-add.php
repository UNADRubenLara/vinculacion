<?php
   if ($_POST['LEVEL'] == 'user-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuAddUser);
      $template = '
<div class="form-add central-fr-up" >
    <form method="POST" >
        <hr>
        <label for="username">Nombre de usuario:</label><input id="username" type="text" name="username" placeholder="Nombre de usuario"
                                                  minlength="5" maxlength="20" required>
        <label for="password">Contraseña:</label><input id="password" type="password" name="hidentext" placeholder="contrasena"
                                            minlength="6" maxlength="40" required>
        <hr>
        <label for="fullname"> Nombre completo:</label> <input id="fullname" type="text" name="fullname"
                                                 placeholder="Nombre o denominacion" minlength="5" maxlength="80"
                                                 required>
        <label for="rfc"> RFC:</label> <input id="rfc" type="text" name="rfc" placeholder="RFC" minlength="10" maxlength="16"
                                      required> <br>
        <hr>
        <label for="addresslocal">Calle y número:</label> <input id="addresslocal" type="text" name="address_street"
                                                placeholder="Calle y Numero" minlength="5" maxlength="78"
                                                required><br>
        <label for="zip">Codigo Postal:</label><input id="zip" type="number" min="1000" max="99999" placeholder="C.P." oninput="LoadZip(this.value);" name="zipzone"/>
        <select id="ziplist" name="idaddress" size="1"></select><br>
        
         <label for="branch"> Rama:</label><input id="branch" type="text" maxlength="20" minlength="4" placeholder="Busqueda..."
               oninput="LoadBranch(this.value);"/>
        <select id="branchlist" name="branch" size="1" required></select>
        <label for="companytypelist">Tamaño:</label><br>
         <select id="companytypelist" name="companytype" size="1">
                <option value="1">Micro</option>
                <option value="2">Mediana</option>
                <option value="3">Grande</option>
            </select><br>
          <label for="phone">Telefono:</label><input id="phone" type="tel" name="phone" placeholder="Telefono" minlength="10"
                                         maxlength="13" required> <br>
        <label for="mail">Correo:</label><input id="mail" type="email" name="mail" placeholder="Correo" minlength="5"
                                       required><br>
         <div>
            <input class="button  add" type="submit" value="Agregar">
            <input type="hidden" name="LEVEL" value="user-add">
            <input type="hidden" name="crud" value="add">
        </div>


    </form>
<br>
</div>
<br><br><br><br>
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