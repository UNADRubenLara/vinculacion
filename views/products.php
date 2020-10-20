<?php
   if ($_SESSION['role'] != 'Admin') {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuproduct);
      $product_controller = new ProductController();
      $products = $product_controller->list_user_products($_SESSION['iduser']);
      $template_products = '
		<div >
		<form method="POST">
						<input type="hidden" name="LEVEL" value="product-add">
						<input class="button add" type="submit" value="%s">
		</form>
		<table  class="table-list">
			<tr>
			    <th>%s</th>
				<th>%s</th>
				<th colspan="2">
				</th>
			</tr>';
      
      if (empty($products)) {
         printf($template_products,
            TXTBtnAdd,
            TXTId,
            TXTProductDetail
         );
         printf('
		<div class="central-fr-up">
			<p class="error">%s</p>
		</div>
	', TXTnoproducts);
      } else {
         for ($i = 0; $i < count($products); $i++) {
            $editar = TXTBtnEdit;
            $template_products .= '
			<tr>
			   <td>' . $products[$i]['idproduct_detail'] . '</td>
				<td>' . substr($products[$i]['product_detail'], 0, 60) . '</td>
			<td>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="product-edit">
						<input type="hidden" name="idproduct" value="' . $products[$i]['idproduct_detail'] . '">
						<input class="button edit" type="submit" value="' . $editar . '">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="LEVEL" value="product-delete">
						<input type="hidden" name="idproduct" value="' . $products[$i]['idproduct_detail'] . '">
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
            TXTBtnAdd,
            TXTId,
            TXTProductDetail
         
         );
      }
   } else {
      $username = $_POST['username'];
      printf('<h2 class="form-Title">%s [%s]</h2>', TXTmenuproduct, $username);
      $product_controller = new ProductController();
      $products = $product_controller->list_user_products($_POST['idusuario']);
      if (empty($products)) {
         printf('
		<div class="central-fr-up">
			<p class="error">%s</p>
		</div>
	', TXTnoproducts);
         header("Refresh:2");
      } else {
         $template_admin = '
		<div >
		<table  class="table-list">
			<tr>
			   <th>%s</th>
				<th>%s</th>
				<th></th>
			</tr>';
         for ($i = 0; $i < count($products); $i++) {
            $template_admin .= '
			<tr>
			   <td>' . $products[$i]['idproduct_detail'] . '</td>
				<td>' . substr($products[$i]['product_detail'], 0, 60) . '</td>
				<td>
				 <form method="post">
				 <input type="hidden" name="LEVEL" value="product-display">
		       <input type="hidden" name="find" value="' . $products[$i]['idproduct_detail'] . '" >
				 <input class="edit" type="submit" value="' . TXTView . '" >
				 </form>
             </td>
			</tr>
			
		';
         }
         
         $template_admin .= '
		</table>
	</div>
	';
         
         printf($template_admin,
            TXTId,
            TXTProductDetail);
      }
   }
      
   
