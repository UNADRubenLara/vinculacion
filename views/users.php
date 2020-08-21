<?php
   if ($_SESSION['role'] == 'Admin') {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuUserControl);
      
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
            $editar = TXTBtnEdit;
            if ($users[$i]['status'] == 1) {
               $status = 'suspend';
               $statusbtn = TXTUserBtnSuspend;
            } else {
               $status = 'activate';
               $statusbtn = TXTUserBtnActivate;
            }
            
            $template_users .= '
			<tr>
			    <td>' . $users[$i]['idusuario'] . '</td>
				<td>' . $users[$i]['username'] . '</td>
				<td>' . $users[$i]['fullname'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="user-edit">
						<input type="hidden" name="username" value="' . $users[$i]['username'] . '">
						<input class="button edit" type="submit" value="' . $editar . '">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="user_status">
						<input type="hidden" name="username" value="' . $users[$i]['username'] . '">
						<input type="hidden" name="STATUS" value="' . $status . '">
						<input class="button ' . $status . '" type="submit" value="' . $statusbtn . '">
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
            TXTId,
            TXTusername,
            TXTUserFullName,
            TXTBtnAdd
         );
      }
   } else {
      printf('<h2 class="errorText">%s</h2>', TXTLoginError);
   }