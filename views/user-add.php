<?php
if ($_POST['LEVEL'] == 'user-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
    printf('<h2 class="form-Title">%s</h2>', TXTmenuadduser);
    $template = '
<div class="user-add central-fr-up" >
<form>
    <hr>
    <strong>Nombre de usuario:</strong><input id="username" type="text" name="NOMBREUSUARIO" placeholder="Nombre de usuario" minlength="5" maxlength="20" required>
    <strong>Contraseña:</strong> <input id="password" type="password" name="PASSWORD"  placeholder="contrasena" minlength="6" maxlength="40" required>
    <hr>
    <strong>Nombre completo:</strong> <input id="fullname" type="text" name="NOMBRECOMPLETO" placeholder="Nombre o denominacion" minlength="5" maxlength="80" size="78"required>
    <strong>RFC:</strong> <input id="rfc" type="text" name="RFC" placeholder="RFC" minlength="10" maxlength="16" size="16" required> <br><hr>
    <strong>Calle y número:</strong> <input id="addresslocal" type="text" name="CALLENUMERO" placeholder="Calle y Numero" minlength="5" maxlength="78" size="78"  required><br>
    <input id="zip" type="number" min="100" max="99999" placeholder="C.P." oninput="LoadZip(this.value);" name="zipzone" />
    <section id="displayZip"><select id="ZipList" name="ZipChose" size="1"></select></section>
    <strong>Telefono:</strong><input id="phone" type="tel" name="TELEFONO" placeholder="Telefono" minlength="10" maxlength="13" required> <br>
    <strong>Correo:</strong><input id="mail" type="email" name="CORREO" placeholder="Correo" minlength="5" size="25" required><br>
    <strong>Clasificacion:</strong>
    <select name="CLASIFICACION" required>
    <option value="1">Micro</option>
    <option value="2">Mediana</option>
    <option value="3">Grande</option>
    </select>
    <hr>
     <div >
				<input  class="button  add" type="submit" value="Agregar">
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
    $users_controller = new UserAddControler();
        $new_user = array(
        'username' => $_POST['username'],
        'fullname' => $_POST['fullname'],
        'pass' => $_POST['pass'],
        'role' => $_POST['role']
    );

       var_dump($new_user);
       exit();
    $user = $users_controller->add($new_user);

    $template = '
		<div>
			<p class="item  add">Usuario <b>%s</b> salvado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("users")
			}
  		</script>
		
		
	';

    printf($template, $_POST['USER']);
} else {
    $controller = new ViewController();
    $controller->load_view('error401');
}
echo '<script src="./public/js/validates.js"></script>';
echo '<script src="./public/js/findzip.js"></script>';


