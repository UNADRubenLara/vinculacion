<?php
   $template = '
<div>
	<h2>%s</h2>
	<h2>%s</h2>
	<h2>%s</h2>
</div>
';
   printf(
      $template,
      $_SESSION['username'],
      $_SESSION['fullname'],
      $_SESSION['role']
   );