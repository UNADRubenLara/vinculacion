<?php
if ($_POST['LEVEL'] == 'user-add' && $_SESSION['ROLE'] == 'Admin' && !isset($_POST['crud'])) {
    printf('<h2 class="form-Title">%s</h2>', TXTmenuadduser);
    $template='
	<div class="form-box">
		<form method="POST" class="">
			<div >
				<input type="text" name="username" placeholder="Usuario" required>
			</div>
			<div >
				<input type="text" name="fullname" placeholder="Nombre Completo" required>
			</div>
			<div >
				<input type="password" name="pass" placeholder="password" required>
			</div>
			<div >
				<input type="radio"  name="role" id="admin" value="Admin" required><label for="admin" class="ligth-text">Administrador</label>
				<input type="radio"  name="role" id="noadmin" value="User" required><label for="user" class="ligth-text">Usuario</label>
			</div>
			<div >
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="LEVEL" value="user-add">
				<input type="hidden" name="crud" value="set">
			</div>
		</form>
		</div>

	';
    printf($template);

} else if ($_POST['LEVEL'] == 'user-add' && $_SESSION['ROLE'] == 'Admin' && $_POST['crud'] == 'set') {
    $users_controller = new UsersController();

    $new_user = array(
        'username' => $_POST['username'],
        'fullname' => $_POST['fullname'],
        'pass' => $_POST['pass'],
        'role' => $_POST['role']
    );

    $user = $users_controller->set($new_user);

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