<?php
   
   if ($_POST['LEVEL'] == 'product-add' && !isset($_POST['crud'])) {
      
      $actual_user = new UsersController();
      $actual_branch = $actual_user->get_branch($_SESSION['username']);
      
      printf('<section class="form-add central-fr-up" >
      <h2 class="form-Title">%s</h2>', TXTAddProduct);
      $template = '
      <section class="container">
      <form method= "post" enctype="multipart/form-data">
		<section class="flex-item">
		<section class="center-box">
		<label>%s: %s</label>
		<hr>
		<label>%s: %s</label>
		</section>
		<section class="flex-item">
		<textarea required id="productdetail" name="product_detail" class="textcapture" pattern="[a-zA-Z0-9ñÑáéíóú.* #]+" placeholder="%s"></textarea>
		<br>
		<label for="loadimage" class="upload">%s</label><input hidden id="loadimage" type="file" name="image">
		</section>
		<section class="flex-item">
		<input type="submit" class="add" value="%s" >
		<input type="hidden" name="LEVEL" value="product-add">
		<input type="hidden" name="crud" value="add">
		</section>
	</form>
	</section>
</section>

';
      
      
      printf($template, TXTplaceholderUser, $_SESSION['username'], TXTProductDetail, $actual_branch, TXTProductDescription, TXTAddImage, TXTBtnAdd, TXTImage);
   } else if ($_POST['LEVEL'] == 'product-add' && $_POST['crud'] == 'add') {
      $product_controller = new ProductController();
      $imgFile = $_FILES['image']['name'];
      if ($product_controller->validate_image($imgFile) == 'ok') {
         $datos = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
      } else {
         echo $product_controller->validate_image($imgFile);
         $datos = base64_encode(file_get_contents("./public/img/nocamera.png"));
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
      $controller = new ViewController();
      $controller->load_view('products');
   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
   
   