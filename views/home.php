<?php
   $template = '
<section class="central-fr-up containerv">
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
	     <section class="containerh central-fr-up center-box">
	            <h3 class="flex-item"> %s </h3>
	            <h3 class="flex-item"> %s </h3>
	     </section>
</section>
';
   $messages=new MessageController();
   $activesmessages=$messages->actives_messages($_SESSION['iduser']);
   printf(
      $template, TXTusername,
      $_SESSION['username'],
      TXTUserFullName,
      $_SESSION['fullname'],
      TXTUserRol,
      $_SESSION['role'],
      TXTUserActiveMessages,
      count($activesmessages)
   );