<?php 
$users_controller = new UsersController();

if( $_POST['LEVEL'] == 'user-edit' && $_SESSION['ROLE'] == 'Admin' && !isset($_POST['crud']) ) {

	$user = $users_controller->get($_POST['USERNAME']);

	if( empty($user) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el usuario <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("users")
				}
			</script>
		';

		printf($template, $_POST['USERNAME']);
	} else {
		$role_admin = ($user[0]['role'] == 'Admin') ? 'checked' : '';
		$role_user = ($user[0]['role'] == 'User') ? 'checked' : '';

		$template_user = '
			<h2 class="p1">Editar Usuario</h2>
			<form method="POST" class="item">
				<div class="p_25">
					<input type="text" placeholder="usuario" value="%s" disabled required>
					<input type="hidden" name="user" value="%s">
				</div>
				<div class="p_25">
					<input type="email" name="email" placeholder="email" value="%s" required>
				</div>
				<div class="p_25">
					<input type="text" name="name" placeholder="nombre" value="%s" required>
				</div>
				<div class="p_25">
					<input type="text" name="fecha" placeholder="cumpleaños" value="%s" required>
				</div>
				<div class="p_25">
					<input type="password" name="PASS" placeholder="password" value="" required>
				</div>
				<div class="p_25">
					<input type="radio" name="role" id="admin" value="Admin"  required><label for="admin">Administrador</label>
					<input type="radio" name="role" id="noadmin" value="User"  required><label for="noadmin">Usuario</label>
				</div>
				<div class="p_25">
					<input  class="button  edit" type="submit" value="Editar">
					<input type="hidden" name="LEVEL" value="user-edit">
					<input type="hidden" name="crud" value="set">
				</div>
			</form>
		';

		printf(
			$template_user,
			$user[0]['username'],
			$user[0]['username'],
			$user[0]['email'],
			$user[0]['name'],
			$user[0]['fecha'],
			//$user[0]['PASS'],
			$role_admin,
			$role_user
		);	
	}

} else if( $_POST['LEVEL'] == 'user-edit' && $_SESSION['ROLE'] == 'Admin' && $_POST['crud'] == 'set' ) {

	$save_user = array(
		'user' =>  $_POST['USERNAME'],
		'email' =>  $_POST['email'], 
		'name' =>  $_POST['name'], 
		'fecha' =>  $_POST['fecha'],
		'pass' =>  $_POST['PASS'],
		'role' =>  $_POST['role']
	);

	$user = $users_controller->set($save_user);

	$template = '
		<div class="container">
			<p class="item  edit">Usuario <b>%s</b> salvado</p>
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