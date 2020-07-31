<?php
$template = '
<article class="item">
	<h2 >%s</h2>
	<p ><b>%s</b></p>
	<p ><b>%s</b></p>
</article>
';

printf(
    $template,
    $_SESSION['username'],
    $_SESSION['fullname'],
    $_SESSION['role']
);