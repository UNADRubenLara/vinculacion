<?php
   if ($_SESSION['VALID']) {
      $template = '
<section class="central-fr-up">
	<section class="containerh center-box">
	     <section class="containerv">
	         <section><h3 class="flex-item"> %s:</h3></section>
	         <section><h3 class="flex-item">( %s )</h3></section>
        </section>
        <section class="containerv">
	         <section><h3 class="flex-item"> %s:</h3></section>
	         <section><h3 class="flex-item"> %s</h3></section>
        </section>
        <section class="containerv">
	          <section><h3 class="flex-item"> %s:</h3></section>
            <section><h3 class="flex-item">( %s )</h3></section>
        </section>
    </section>
	   
</section>
';
      
      printf(
         $template, TXTusername,
         $_SESSION['username'],
         TXTUserFullName,
         $_SESSION['fullname'],
         TXTUserRol,
         $_SESSION['role']
      );
   }