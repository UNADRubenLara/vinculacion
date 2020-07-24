<?php 
$users_controller = new UsersController();

if( $_POST['LEVEL'] == 'user-delete' && $_SESSION['ROLE'] == 'Admin' && !isset($_POST['crud']) ) {

	$user = $users_controller->get($_POST['USER']);

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

		printf($template, $_POST['USER']);
	} else {
		$template_user = '
			<h2 class="p1">Eliminar Usuario</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar el Usuario: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="user" value="%s">
					<input type="hidden" name="LEVEL" value="user-delete">
					<input type="hidden" name="crud" value="del">
				</div>
			</form>
		';

		printf(
			$template_user,
			$user[0]['USER'],
			$user[0]['USER']
		);	
	}

} else if( $_POST['LEVEL'] == 'user-delete' && $_SESSION['role'] == 'Admin' && $_POST['crud'] == 'del' ) {

	$user = $users_controller->del($_POST['USER']);

	$template = '
		<div class="container">
			<p class="item  delete">Usuario <b>%s</b> eliminado</p>
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