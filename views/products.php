<?php
   if ($_SESSION['role'] != '') {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuproduct);
      $product_controller = new ProductController();
      $products = $product_controller->list_user_products($_SESSION['iduser']);
      if (empty($products)) {
         printf('
		<div class="central-fr">
			<p class="error">%s</p>
		</div>
	', TXTnoproducts);
      } else {
         $template_products = '
		<div >
		<table  class="table-list">
			<tr>
			    <th>%s</th>
				<th>%s</th>
				<th colspan="2">
					<form method="POST">
						<input type="hidden" name="LEVEL" value="product-add">
						<input class="button add" type="submit" value="%s">
					</form>
				</th>
			</tr>';
         
         for ($i = 0; $i < count($products); $i++) {
            $editar = TXTBtnEdit;
            
            
            $template_products .= '
			<tr>
			   <td>' . $products[$i]['idproduct_detail'] . '</td>
				<td>' . substr($products[$i]['product_detail'], 0, 25) . '</td>
			<td>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="product-edit">
						<input type="hidden" name="idproduct" value="' . $products[$i]['idproduct_detail'] . '">
						<input class="button edit" type="submit" value="' . $editar . '">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="delete" value="product_delete">
						<input type="hidden" name="idDelete" value="' . $products[$i]['idproduct_detail'] . '">
						<input class="button delete" type="submit" value="' . TXTBtndelete . '">
					</form>
				</td>
			</tr>
			
		';
         }
         
         $template_products .= '
		</table>
	</div>
	';
         
         printf($template_products,
            TXTId,
            TXTProductDetail,
            TXTBtnAdd
         );
      }
   } else {
      printf('<h2 class="errorText">%s</h2>', TXTLoginError);
   }
