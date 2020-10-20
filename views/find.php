<?php
   if ($_SESSION['VALID'] && !isset($_POST['find'])) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenufind);
      $actual_user = new UsersController();
      
      $template = '
<div class="central-fr-up">
<section class="center-box">
  <input type="text" id="productsearch" oninput="findProductByText(this.value)" placeholder="%s">
    <input id="iduser" hidden value="%s">
    <form method="post">
    <ul id="productsfind" name="productfind"></ul>
    <input type="hidden" name="LEVEL" value="product-display">
    </form>
    </section>
</div>
';
      $idvariable = $_SESSION['iduser'];
      printf($template, TXTFindProduct, $idvariable,);
      
      echo '<script src="./public/js/findproduct.js"></script>';
   }
   if ($_SESSION['VALID'] && isset($_POST['find'])) {
      echo htmlentities($_POST['find']);
   }
