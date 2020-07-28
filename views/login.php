<?php
include_once 'txt-values.php';
$template = '
<body>
<div class="log-Div">
    <div class="login">
    <h3 class="form-Title">%s</h3>
    <form method="POST">
   	<label for="username">%s:</label> <br>
	<input type="text" class="user" id="username" name="USER" minlength = "5" maxlength = "15" placeholder = "%s"  required />
	<label for="password">%s:</label>
	<input type="password" class="password" id="password" name="PASS" minlength = "5" maxlength = "50"  placeholder = "%s" type = "password" required/>
	<input type="submit"  value="%s">
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
</body>
');
echo '<script src="./public/js/validates.js"></script>';

