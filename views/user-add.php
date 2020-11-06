<?php
   if ($_POST['LEVEL'] == 'user-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuAddUser);
      $template = '
<div class="form-add central-fr-up" >
    <form method="POST" >
        <hr>
        <label for="username">' . TXTusername . '</label><input id="username" type="text" pattern="[a-zA-Z0-9]{1,20}$"   name="username" placeholder="' . TXTusername . '"
                                                  minlength="5" maxlength="20" required>
        <label for="password">' . TXTplaceholderpass . '</label><input id="password" type="password" name="hidentext" placeholder="' . TXTplaceholderpass . '"
                                            minlength="6" maxlength="40" required>
        <hr>
        <label for="fullname"> ' . TXTUserFullName . '</label> <input id="fullname" type="text" pattern="[a-zA-ZñÑáéíóú. ]+" name="fullname"
                                                 placeholder="' . TXTUserFullNameplacehoder . '" minlength="5" maxlength="80"
                                                 required>
        <label for="rfc">' . TXTUserRFC . '</label> <input id="rfc" type="text" pattern="[A-Z0-9]+" name="rfc" placeholder="' . TXTUserRFC . '" minlength="10" maxlength="16"
                                      required> <br>
        <hr>
        <label for="addresslocal">' . TXTUserAddress . '</label> <input id="addresslocal" type="text" pattern="[a-zA-Z0-9ñÑáéíóú. #]+" name="address_street"
                                                placeholder="' . TXTUserAddress . '" minlength="5" maxlength="78"
                                                required><br>
        <label for="zip">' . TXTUserZip . '</label><input id="zip" type="number" min="1000" max="99999" placeholder="' . TXTUserZip . '" oninput="LoadZip(this.value);" name="zipzone"/>
        <select id="ziplist" name="idaddress" size="1"></select><br>
        
         <label for="branch"> ' . TXTUserBranch . '</label><input id="branch" type="text" pattern="[a-zA-Z0-9]+" maxlength="20" minlength="4" placeholder="' . TXTmenufind . '..."
               oninput="LoadBranch(this.value);"/>
        <select id="branchlist" name="branch" size="1" required></select>
        <label for="companytypelist">' . TXTUserSize . '</label><br>
         <select id="companytypelist" name="companytype" size="1">
                <option value="1">' . TXTUserSmall . '</option>
                <option value="2">' . TXTUserMedium . '</option>
                <option value="3">' . TXTUserBig . '</option>
            </select><br>
          <label for="phone">' . TXTUserPhone . '</label><input id="phone" type="tel"  pattern="\d{3}[\-]\d{3}[\-]\d{4}" name="phone" placeholder="123-456-6789" minlength="10"
                                         maxlength="13" required> <br>
        <label for="mail">' . TXTUserMail . '</label><input id="mail" type="email" name="mail" placeholder="' . TXTUserMail . '" minlength="5"
                                       required><br>
         <div>
            <input class="button  add" type="submit" value="' . TXTBtnAdd . '">
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