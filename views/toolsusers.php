<?php
   if ($_SESSION['VALID'] and isset($_POST['evaluation'])) {
      $evaluatemsg = new MessageController();
      
      $evaluatemsg->evaluate_messages($_POST['idmessage'], $_POST['evaluation']);
      header("Refresh:0");
      
   } elseif ($_SESSION['VALID']) {
      printf('<h2 class="form-Title">%s</h2>', TXTMsgToEval);
      $messages = new MessageController();
      $messagestoevaluate = $messages->actives_messages($_SESSION['iduser']);
      $userslist = new UsersController();
      $productlist = new ProductController();
      
      $template_msg = '
		<div >
		<table  class="table-list">
			<tr>
			    <th colspan="2">%s</th>
				<th >%s</th>
				
			</tr>';
      
      for ($i = 0; $i < count($messagestoevaluate); $i++) {
         
         $image = $productlist->get_image_product($messagestoevaluate[$i]['idproducto']);
         
         $editar = TXTBtnEdit;
         $template_msg .= '
			<tr>
			   <td>' . $userslist->get_user($messagestoevaluate[$i]['idproveedor']) . '</td>
				<td class="table-list" >' . substr($productlist->get_product($messagestoevaluate[$i]['idproducto'])['product_detail'], 0, 60) . '</td>
			<td>
			        <img  class="thimgproduct" src = "data:image/png;base64,' . $image['image'] . '"/>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="toolsusers">
						<input type="hidden" name="idmessage" value="' . $messagestoevaluate[$i]['idmessage'] . '">
						<select name="evaluation" size="1">
                      <option class="delete" value="0">' . TXTNotSuccessful . '</option>
                      <option  value="1">' . TXTSuccessful . '</option>
                      <option  value="2">' . TXTSuccessfulandcontract . '</option>
                      <option class="add" value="3" selected>' . TXTSuccessfulandprovider . '</option>
                 </select>
						<input type="submit" value="' . TXTEvaluate . '">
					</form>
				</td>
			</tr>
			<tr >
			<td class="space" colspan="3"></td>
			</tr>
			
		';
      }
      $template_msg .= '
		</table>
	</div>
	';
      printf($template_msg,
         TXTProductDetail,
         TXTEvaluate
      );
      
   }
   