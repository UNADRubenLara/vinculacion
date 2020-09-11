<?php
     if ($_POST['LEVEL'] == 'product-display' && isset($_POST['find']) && isset($_SESSION['VALID'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTAppName);
      $actual_product = new ProductController();
      $product = $actual_product->get_product($_POST['find']);
      $actual_user = new UsersController();
      $actual_branch = $actual_user->get_branch($product['idusuario']);
      $product_user=$actual_user->get_user($product['idusuario']);
      $template = '
      <section class="form-edit center-box central-fr-up"  >
      <section class="container">
		<section class="flex-item-hr">
		<label>%s: %s</label>
		<br>
		<label>%s: %s</label>
		<hr>
		</section>
		<section class="flex-item-hr"></section>
		<img  class="imgproduct" src = "data:image/png;base64,%s"/>
		</section>
		<section class="flex-item-hr">
		<textarea id="productdetail" readonly id="productdetail" name="product_detail" class="textcapture" placeholder="%s" >%s</textarea>
		</section>
		<section class="flex-item-hr">
		<form method="post">
		<label >%s   </label>
		<input type="submit" name="vincula" class="edit" value="%s" >
		<input type="hidden" name="action" value="vincular">
		<input type="hidden" name="LEVEL" value="product-display">
		<input  type="hidden" name="idproduct_detail" value="%s">
		</form>
		</section>
</section>
';
      $image = $product['image'];
      printf($template, TXTplaceholderUser, $product_user, TXTProductDetail, $actual_branch, $image,TXTProductDescription, $product['product_detail'],  TXTlink,TXTBtnLink, $product['idproduct_detail']);
      
   } else if ($_POST['LEVEL'] == 'product-display' && $_POST['action'] == 'vincular') {
      
      
      header("Refresh:3" );
   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
