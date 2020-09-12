<?php
   if ($_SESSION['role'] == 'Admin' && $_SESSION['VALID']) {
      printf('<h2 class="form-Title">%s</h2>', TXTmenuTools);
      $template='
      
      ';
   }
