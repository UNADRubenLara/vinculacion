<?php
   
   if ($_POST['LEVEL'] == 'product-add' && !isset($_POST['crud'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTAddProduct);
      $actual_user = new UsersController();
      $actual_branch = $actual_user->get_branch($_SESSION['username']);
      
      $template = '
<div class="form-add central-fr-up"  >
<form method= "post" enctype="multipart/form-data">
		<div class="center-box">
		<label>%s: %s</label>
		<br>
		<label>%s: %s</label>
		</div>
		<textarea required id="productdetail" name="product_detail" class="textcapture" placeholder="%s"></textarea>
		<input type="file" name="image" class="loadimage">
		<br>
		<input type="submit" value="%s" >
		<input type="hidden" name="LEVEL" value="product-add">
		<input type="hidden" name="crud" value="add">
	</form>
</div>
<br>
<hr>
';
      
      
      printf($template, TXTplaceholderUser, $_SESSION['username'], TXTProductDetail, $actual_branch, TXTProductDescription, TXTBtnAdd, TXTImage);
      
   } else if ($_POST['LEVEL'] == 'product-add' && $_POST['crud'] == 'add') {
      $product_controller = new ProductController();
      $imgFile = $_FILES['image']['name'];
      if($product_controller->validate_image($imgFile)=='ok'){
         $datos = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
         
      }
      else{
         echo $product_controller->validate_image($imgFile);
         exit();
      }
      
    $username = $_SESSION['iduser'];
   $branch = $_SESSION['branch'];
   $newproduct = array(
      'iduser' => $username,
      'idbranch' => $branch,
      'product_detail' => $_POST['product_detail'],
      'image' => $datos
   );
   $product = $product_controller->add_product($newproduct);
      
      
   } else {
   $controller = new ViewController();
   $controller->load_view('error401');
}
   
   