<?php
   printf('<h2 class="form-Title">%s</h2>', TXTmenuGestiondeusuarios);
   
   $users_controller = new UsersController();
   $users = $users_controller->lst();
   
   if (empty($users)) {
      printf('
		<div class="central-fr">
			<p class="error">%s</p>
		</div>
	', TXTnousers);
   } else {
      $template_users = '
		<div >
		<table  class="table-list">
			<tr>
			    <th>%s</th>    
				<th>%s</th>
				<th>%s</th>
				<th colspan="2">
					<form method="POST">
						<input type="hidden" name="LEVEL" value="user-add">
						<input class="button add" type="submit" value="%s">
					</form>
				</th>
			</tr>';
      
      for ($i = 0; $i < count($users); $i++) {
         $editar = TXTuserbtnedit;
         $suspender = TXTuserbtnsuspend;
         $template_users .= '
			<tr>
			    <td>' . $users[$i]['idusuario'] . '</td>
				<td>' . $users[$i]['username'] . '</td>
				<td>' . $users[$i]['fullname'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="user-edit">
						<input type="hidden" name="USERNAME" value="' . $users[$i]['username'] . '">
						<input class="button edit" type="submit" value="' . $editar . '">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="user-delete">
						<input type="hidden" name="USERNAME" value="' . $users[$i]['username'] . '">
						<input class="button delete" type="submit" value="' . $suspender . '">
					</form>
				</td>
			</tr>
			
		';
      }
      
      $template_users .= '
		</table>
	</div>
	';
      
      printf($template_users,
         TXTuseridv,
         TXTusername,
         TXTuserfullnamev,
         TXTuserbtnadd
      );
   }