<?php
if ($_POST['LEVEL'] == 'user-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
    printf('<h2 class="form-Title">%s</h2>', TXTmenuadduser);
    $template = '
<div class="user-add" >
<form>
    <hr>
    <strong>Nombre de usuario:</strong><input id="username" type="text" name="NOMBREUSUARIO" placeholder="Nombre de usuario" minlength="5" maxlength="20" required>
    <strong>Contraseña:</strong> <input type="password" name="PASSWORD"  placeholder="contrasena" minlength="6" maxlength="40" required>
    <hr>
    <strong>Nombre completo o Denominación:</strong> <input type="text" name="NOMBRECOMPLETO" placeholder="Nombre o denominacion" minlength="10" maxlength="80" size="80" required><br>
    <strong>RFC:</strong> <input type="text" name="RFC" placeholder="RFC" minlength="10" maxlength="16" size="16" required>
    <strong>Calle y número:</strong> <input type="text" name="CALLENUMERO" minlength="5" maxlength="78" size="78" placeholder="Calle y Numero" required><br>
    <strong>Codigo Postal:</strong> <input type="number" name="cp" minlength="1" maxlength="8" size="8" placeholder="Codigo Postal" required><br>
    <strong>Colonia:</strong>
    <hr>
    <strong>Telefono:</strong><input type="tel" name="TELEFONO" minlength="10" maxlength="13" required> <br>
    <strong>Correo:</strong><input type="email" name="CORREO" minlength="5" size="25" required><br>
    <hr>
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
    $users_controller = new UsersController();
    $cpdata =
    $new_user = array(
        'username' => $_POST['username'],
        'fullname' => $_POST['fullname'],
        'pass' => $_POST['pass'],
        'role' => $_POST['role']
    );

    $user = $users_controller->add($new_user);

    $template = '
		<div class="container">
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


