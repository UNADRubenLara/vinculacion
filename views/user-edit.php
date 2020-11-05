<?php
   if ($_POST['LEVEL'] == 'user-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuUpdateUser);
      $users_controller = new UsersController();
      $edit_user = $users_controller->get_user($_POST['username']);
      $template = '
<div class="form-edit central-fr-up" >
    <form method="POST" >
        <hr>
        <label for="username">%s</label><input id="username"  type="text" pattern="[a-zA-Z0-9ñÑáéíóú-_]" name="username" placeholder="%s" value="%s"
                                                  minlength="5" maxlength="20" required>
        <label for="password">%s:</label> <input id="password" type="password" name="hidentext" placeholder="%s" value=""
                                            minlength="6" maxlength="40" required>
        <hr>
        <label for="fullname">%s</label> <input id="fullname" type="text" pattern="[a-zA-Z0-9ñÑáéíóú]" name="fullname"
                                                 placeholder="%s" value="%s" minlength="5" maxlength="80" size="78"
                                                 required>
        <label for="rfc">%s</label> <input id="rfc" type="text" pattern="[a-zA-Z0-9]" name="rfc" placeholder="%s" minlength="10" maxlength="16" value="%s"
                                     size="16" required> <br>
        <hr>
        <label for="addresslocal">%s</label> <input id="addresslocal" type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ .:,;$)]+" name="address_street"
                                                placeholder="%s" value="%s" minlength="5" maxlength="78" size="78"
                                                required><br>
        <label for="zip">%s</label><input id="zip" type="number" min="1000" max="99999" value="%s" placeholder="C.P." oninput="LoadZip(this.value);" name="zipzone"/>
        <select id="ziplist" name="idaddress" size="1" value="%s"><option value="%s">%s</option></select><br>
         <label for="branch">%s</label><input id="branch" type="text" pattern="[a-zA-Z0-9]" maxlength="20" minlength="4" placeholder="%s..."
               oninput="LoadBranch(this.value);"/>
        <select id="branchlist" name="branch"  value="%s" size="1"  required ><option value="%s">%s</option></select>
        <br>
        <label for="companytype">%s</label>
        <select id="companytypelist"  name="companytype" value="%s" size="1">
                <option %s value="1">%s</option>
                <option %s value="2">%s</option>
                <option %s value="3">%s</option>
            </select><br>
          <label for="phone">%s:</label><input id="phone" type="tel" value="%s" name="phone" placeholder="%s" minlength="10"
                                         maxlength="13" required> <br>
        <label for="mail">%s:</label><input id="mail" type="email" name="mail"  value="%s"placeholder="Correo" minlength="5" size="25"
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
';
      $location = $edit_user['C_NOMBRE'] . ',' . $edit_user['D_MUNICIPIO'] . ', ' . $edit_user['D_CIUDAD'] . ', ' . $edit_user['D_ESTADO'];
      
      $companyType = $edit_user['companytype'] == 1 ? $micro = 'selected' : $micro = '';
      $companyType = $edit_user['companytype'] == 2 ? $med = 'selected' : $med = '';
      $companyType = $edit_user['companytype'] == 3 ? $big = 'selected' : $big = '';
      
      printf(
         $template,
         TXTusername,
         TXTusername,
         $edit_user['username'],
         TXTplaceholderpass,
         TXTNewPass,
         TXTUserFullName,
         TXTUserFullName,
         $edit_user['fullname'],
         TXTUserRFC,
         TXTUserRFC,
         $edit_user['rfc'],
         TXTUserAddress,
         TXTUserAddress,
         $edit_user['address_street'],
         TXTUserZip,
         $edit_user['C_CODIGO'],
         $edit_user['ZP_ADDRESS_idADDRESS'],
         $edit_user['ZP_ADDRESS_idADDRESS'],
         $location,
         TXTUserBranchText,
         TXTmenufind,
         $edit_user['branch'],
         $edit_user['branch'],
         $edit_user['branchText'],
         TXTUserSize,
         $edit_user['companytype'],
         $micro,
         TXTUserSmall,
         $med,
         TXTUserMedium,
         $big,
         TXTUserBig,
         TXTUserPhone,
         $edit_user['phone'],
         TXTUserPhone,
         TXTUserMail,
         $edit_user['mail'],
         TXTBtnUpdate,
         $edit_user['idusuario']);
      
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
    <h2 class="item  add">Usuario <b>%s</b></h2>
</div>
<script>
    window.onload = function () {
        reloadPage("users")
    }
</script>


';
      printf($template, TXTStatusUpdate);
      
   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
   echo '<script src="./public/js/findzip.js"></script>';
   echo '<script src="./public/js/findbranch.js"></script>';
   echo '<script src="./public/js/validates.js"></script>';
