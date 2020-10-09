<?php
// fuente https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
   header("Access-Control-Allow-Origin: *");
   header('Access-Control-Allow-Credentials: true');
   header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
   header("Access-Control-Allow-Headers: X-Requested-With");
   header('Content-Type: text/html; charset=utf-8');
   header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
   $template =
      '
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>API-WEB</title>
</head>
<body>
	<div>
    <h1>API-WEB</h1>
    <form method="get" action="zipsearch.php">
    <input type="text" name="txt">
    <input type="submit" value="ZIP">
    </form>
    <form method="get" action="brandsearch.php">
    <input type="text" name="txt">
    <input type="submit" value="brand">
    </form>
    <input type="button" value="BACK" onclick="history.back()">
	
	</div>
</body>
</html>

	
';
   printf($template);
