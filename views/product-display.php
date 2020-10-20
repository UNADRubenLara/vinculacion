<?php
   if ($_POST['LEVEL'] == 'product-display' && isset($_POST['find']) && isset($_SESSION['VALID'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTAppName);
      $actual_product = new ProductController();
      $product = $actual_product->get_product($_POST['find']);
      $actual_user = new UsersController();
      $actual_branch = $actual_user->get_branch($product['idusuario']);
      $product_user = $actual_user->get_user($product['idusuario']);
      $image = $product['image'];
      $template = '
      <section class="form-edit center-box central-fr-up"  >
      <section class="container">
		<section class="flex-item-hr">
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
		';
      
      if ($_SESSION['role'] != 'Admin') {
         $template .= '
       <form method="post">
		<label >%s   </label>
		<input type="submit" name="vincula" class="edit" value="%s" >
		<input type="hidden" name="action" value="vincular">
		<input type="hidden" name="LEVEL" value="product-display">
		<input  type="hidden" name="idproduct_detail" value="%s">
		</form>
		</section>
        </section>';
         
         printf($template,
            TXTProductDetail,
            $actual_branch,
            $image,
            TXTProductDescription,
            $product['product_detail'],
            TXTlink,
            TXTBtnLink,
            $product['idproduct_detail']
         );
      } else {
         $template .= '
        </section>
        </section>';
         $image = $product['image'];
         printf($template,
            TXTProductDetail,
            $actual_branch,
            $image,
            TXTProductDescription,
            $product['product_detail']
         );
      }
      
   } else if ($_POST['LEVEL'] == 'product-display' && $_POST['action'] == 'vincular') {
      $actual_product = new ProductController();
      $product = $actual_product->get_product($_POST['idproduct_detail']);
      $provider = new UsersController();
      $providerdata = $provider->get_data_user($product['idusuario']);
      $message = new MessageController();
      $mesagerror = $message->create_message($_POST['idproduct_detail'], $product['idusuario']);
      if ($mesagerror) {
         
         $template = '
       <section class="form-edit center-box central-fr-up"  >
          <section class="containerv">
            <section class="containerh">
		              <section class="flex-item-rh central-fr-up">
		                          <h2  > %s </h2>
		                          <section class="border"><label>%s: %s</label><br></section>
		                          <section class="border"><label >%s: </label><label >%s</label><br>
		                          <label >%s: </label><label >%s</label></section >
		              </section>
		             <section class=" flex-item-rh central-fr-up ulproduct">
                        
                        <label >%s: </label><label >%s</label><br>
                        <label >%s: </label><label >%s</label><br>
                        <label >%s: </label><label >%s</label><br>
                        <label >%s: </label><label >%s</label><br>
                        <label >%s: </label><label >%s</label><br>
                        <label >%s: </label><label >%s</label><br>
                        <label >%s: </label><label >%s</label><br>
                        <label >%s: </label><label >%s</label><br>
		               </section>
		       </section>
		       <section class="form-edit container">
          <form>
          <input type="submit" value="OK">
          <input type="hidden" name="ok" value="ok">
          </form>
          </section>
	       <section class="flex-item-rh central-fr-up">
             <img  class="imgproduct" src = "data:image/png;base64,%s"/>
          </section>
          
        </section>
         ';
         
         $phone = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $providerdata['phone']);
         printf(
            $template,
            TXTUserData,
            TXTProductDetail,
            $product['product_detail'],
            TXTUserFullName,
            $providerdata['fullname'],
            TXTUserBranchText,
            $providerdata['branchText'],
            TXTUserMail,
            $providerdata['mail'],
            TXTUserPhone,
            $phone,
            TXTUserAddress_street,
            $providerdata['address_street'],
            TXTUserUbication,
            $providerdata['C_NOMBRE'],
            TXTUserCity,
            $providerdata['D_CIUDAD'],
            TXTUserZip,
            $providerdata['C_CODIGO'],
            TXTUserLocation,
            $providerdata['D_MUNICIPIO'],
            TXTUserState,
            $providerdata['D_ESTADO'],
            $image = $product['image']
         );
      }
      
   } else {
      $controller = new ViewController();
      $controller->load_view('error401');
   }
