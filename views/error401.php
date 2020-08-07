<?php
   include_once 'txt-values.php';
   $template =
      '
	<div class="center-all">
	<h2>%s</h2>
	<input type="button" value="BACK" onclick="history.back()">
	</div>
';
   printf($template, TXTError401);