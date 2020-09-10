<?php
   
   include_once 'txt-values.php';
   $template = '

    <div class="center-box">
    
    <h3>%s</h3>
    <form method="POST">
   <section class="central-body containerh">
   <section class="flex-item">
   <label for="username">%s:</label><br>
	<input id="username" type="text" class="user"  name="USER" minlength = "5" maxlength = "15" placeholder = "%s"   autocomplete="username" required />
	</section>
	<section class="flex-item">
	<label for="password">%s:</label><br>
	<input id="password" type="password" class="password"  name="PASS" minlength = "5" maxlength = "50"  placeholder = "%s" type = "password"   autocomplete="current-password" required/>
	</section>
	<section class="flex-item">
	<br>
	<input type="submit"  value="%s">
	</section>
	</section>
	</form>
	<br>
	<br>
	';
   
   printf($template, TXTLoginAdvice, TXTusername, TXTplaceholderUser, TXTplaceholderpass, TXTplaceholderpass, TXTenter);
   
   
   if (isset($_GET['ERROR'])) {
      $template = '
        <div class="errorText">
		<p>%s %s</p>
		</div>';
      printf($template, $_GET['ERROR'], TXTLoginError);
      
   }
   print('
        
        </div>
</div>
');



