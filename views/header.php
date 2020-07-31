<?php
include_once 'txt-values.php';
$head = '
<!DOCTYPE html>
<html lang="es">
 <head>
        <title class="ti">%s</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./public/css/normalize.css">
        <link rel="stylesheet" href="./public/css/styles.css">
     	<link rel="icon" href="./public/img/favicon.ico" type="image/x-icon" />
    </head>
    
    <header>
';
printf(
    $head,
    TXTAppName
);

if ($_SESSION['VALID']) {
    $template = '
		<nav class="menus ">
            <h3 class="dateHour">%s</h3>
            <br>
            <h3 class="salute">Hola %s</h3>
            <ul class="header-btn color6">
                <li class="color1"><a href="./">%s</a></li>
                <li class="color1"><a href="users">%s</a></li>
                <li class="color1"><a href="productos">%s</a></li>
                <li class="color1"><a href="out">%s</a></li>
            </ul>
		</nav>
	';

    $dateHour = date('h:i:s A');
    printf(
        $template,
        $dateHour,
        $_SESSION['username'],
        TXTmenuinit,
        TXTmenuusers,
        TXTmenuproduct,
        TXTmenuout
    );
}
print('
	</header>
	');