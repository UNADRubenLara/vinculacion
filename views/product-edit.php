<?php
   
   if ($_POST['LEVEL'] == 'product-edit' && !isset($_POST['crud']) && $_POST['idproduct'] != null) {
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
		<textarea id="productdetail" name="product_detail" class="textcapture" placeholder="%s" >%s</textarea>
		<img src = "data:image/png;base64,%s" width = "150px" height = "150px"/>
		<br>
		<input type="file" name="image" class="loadimage">
		<br>
		<input type="submit" value="%s" >
		<input type="hidden" name="LEVEL" value="product-edit">
		<input type="hidden" name="crud" value="edit">
		<input type="hidden" name="sameimage" value="%s">
		<input  type="hidden" name="branchcode" value="%s">
		<input  type="hidden" name="idproduct_detail" value="%s">
	</form>
</div>
<br>
<hr>
';
      $image = $product['image'];
      printf($template, TXTplaceholderUser, $_SESSION['username'], TXTProductDetail, $actual_branch, TXTProductDescription, $product['product_detail'], $image, TXTBtnUpdate, $image, $product['idbranch'], $product['idproduct_detail']);
      
   } else if ($_POST['LEVEL'] == 'product-edit' && $_POST['crud'] == 'edit') {
            
            if ($_FILES['image']['type'] == "image/jpeg" && $_FILES['image']['size'] <= 200000) {
               $datos = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
            } else {
               $datos = $_POST['sameimage'];
            }
            
      $username = $_SESSION['iduser'];
      $product = array(
         'idproduct_detail' => $_POST['idproduct_detail'],
         'iduser' => $username,
         'idbranch' => $_POST['branchcode'],
         'product_detail' => $_POST['product_detail'],
         'image' => $datos
      );
      $product_controller = new ProductController();
      $updated_product = $product_controller->update_product($product);
      header("Refresh:0" );
      
   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
   
   