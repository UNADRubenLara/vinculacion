<?php
   if ($_SESSION['VALID'] && !isset($_POST['find'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenufind);
      $actual_user = new UsersController();
   
      $template = '
<div class="central-fr-up">
<section class="center-box">
<input type="text" id="productsearch" oninput="findProductByText(this.value)" placeholder="Buscar descripción del producto mínimo 4 caracteres">
    <form method="post">
    <ul id="productsfind" name="productfind"></ul>
    </form>
    </section>
</div>
';
      print($template);
   
      echo '<script src="./public/js/findproduct.js"></script>';
   }

