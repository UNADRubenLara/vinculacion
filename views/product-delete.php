<?php
   
   if ($_POST['LEVEL'] == 'product-delete' && !isset($_POST['crud']) && $_POST['idproduct'] != null) {
      printf('<h2 class="form-Title">%s</h2>', TXTUpdateProduct);
      $actual_user = new UsersController();
      $actual_branch = $actual_user->get_branch($_SESSION['username']);
      $actual_product = new ProductController();
      $product = $actual_product->get_product($_POST['idproduct']);
      
      $template = '
<div class="form-edit central-fr-up"  >
<form method= "post" enctype="multipart/form-data">
		<div class="center-box">
		<label>%s: %s</label>
		<br>
		<label>%s: %s</label>
		</div>
		<textarea id="productdetail" readonly id="productdetail" name="product_detail" class="textcapture" placeholder="%s" >%s</textarea>
		<img  class="imgproduct" src = "data:image/png;base64,%s" width = "150px" height = "150px"/>
		<br>
		<label>%s   </label><input type="submit" class="delete" value="%s" >
		<input type="hidden" name="crud" value="delete">
		<input type="hidden" name="LEVEL" value="product-delete">
		<input  type="hidden" name="idproduct_detail" value="%s">
			</form>
</div>
<br>
';
      $image = $product['image'];
      printf($template, TXTplaceholderUser, $_SESSION['username'], TXTProductDetail, $actual_branch, TXTProductDescription, $product['product_detail'], $image, TXTDeleteProduct,TXTBtndelete, $product['idproduct_detail']);
      
   } else if ($_POST['LEVEL'] == 'product-delete' && $_POST['crud'] == 'delete') {
      
      $idproduct = $_POST['idproduct_detail'];
      $product_controller = new ProductController();
      $delete_product = $product_controller->delete_product($idproduct);
      header("Refresh:0" );

   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
   
  
