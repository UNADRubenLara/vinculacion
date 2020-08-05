<?php
   if ($_POST['LEVEL'] == 'user-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuupdateuser);
      $users_controller = new UsersController();
      $edit_user=$users_controller->get_user($_POST['USERNAME']);
     $template = '
<div class="user-edit central-fr-up" >
    <form method="POST" >
        <hr>
        <strong>Nombre de usuario:</strong><input id="username" disabled type="text" name="username" placeholder="Nombre de usuario" value="%s"
                                                  minlength="5" maxlength="20" required>
        <strong>Contraseña:</strong> <input id="password" type="password" name="hidentext" placeholder="contraseña" value=""
                                            minlength="6" maxlength="40" required>
        <hr>
        <strong>Nombre completo:</strong> <input id="fullname" type="text" name="fullname" value="%s"
                                                 placeholder="Nombre o denominacion" minlength="5" maxlength="80" size="78"
                                                 required>
        <strong>RFC:</strong> <input id="rfc" type="text" name="rfc" placeholder="RFC" minlength="10" maxlength="16" value="%s"
                                     size="16" required> <br>
        <hr>
        <strong>Calle y número:</strong> <input id="addresslocal" type="text" name="address_street" value="%s"
                                                placeholder="Calle y Numero" minlength="5" maxlength="78" size="78"
                                                required><br>
        <strong>Codigo Postal:</strong><input id="zip" type="number" min="1000" max="99999" value="%s" placeholder="C.P." oninput="LoadZip(this.value);" name="zipzone"/>
        <select id="ziplist" name="idaddress" size="1" value="%s"><option value="%s">%s</option></select><br>
        
        
         <strong>Rama:</strong><input id="branch" type="text" maxlength="20" minlength="4" placeholder="Busqueda..."
               oninput="LoadBranch(this.value);"/>
        <select id="branchlist" name="branch"  value="%i" size="1"  required ></select>
        <strong>Tamaño:</strong>
         <select id="companytypelist" name="companytype" value="%s" size="1">
                <option value="1">Micro</option>
                <option value="2">Mediana</option>
                <option value="3">Grande</option>
            </select><br>
          <strong>Telefono:</strong><input id="phone" type="tel" value="%s" name="phone" placeholder="Telefono" minlength="10"
                                         maxlength="13" required> <br>
        <strong>Correo:</strong><input id="mail" type="email" name="mail"  value="%s"placeholder="Correo" minlength="5" size="25"
                                       required><br>
        <hr>
        <div>
            <input class="button  edit" type="submit" value="%s">
            <input type="hidden" name="LEVEL" value="user-edit">
            <input type="hidden" name="crud" value="edit">
            <input type="hidden" name="idusuario" value="%s">
            
        </div>


    </form>
</div>
<br>
<hr>


';
     $location=$edit_user[2].','.$edit_user[3].', '.$edit_user[4];
      printf($template, $edit_user['username'],$edit_user['fullname'],$edit_user['rfc'],
         $edit_user['address_street'],$edit_user[1],$edit_user[0],$edit_user[0],$location, $edit_user['branch'],$edit_user['companytype'], $edit_user['phone'],
         $edit_user['mail'],TXTuserbtnupdate,$edit_user['idusuario']);
      
   } else if ($_POST['LEVEL'] == 'user-edit' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'edit') {
   
      $update_user = array(
         'idusuario' => $_POST['idusuario'],
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
      $users_controller->update($update_user);
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
      
      printf($template, $update_user['username']);
      
   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
   echo '<script src="./public/js/findzip.js"></script>';
   echo '<script src="./public/js/findbranch.js"></script>';
   echo '<script src="./public/js/validates.js"></script>';