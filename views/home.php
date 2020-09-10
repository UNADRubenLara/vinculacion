<?php
   $template = '
<div class="central-fr-up">
	<div class="container center-box">
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
	</div>
</div>
';
   printf(
      $template, TXTusername,
      $_SESSION['username'],
      TXTUserFullName,
      $_SESSION['fullname'],
      TXTUserRol,
      $_SESSION['role']
   );