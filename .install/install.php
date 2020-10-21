<?php
   $template = '<!doctype html>
<html lang="es">
<head>
   <meta charset="utf-8">
   <title>Installer</title>
   <meta name="Vinculacion" content="Installer">
   <link rel="stylesheet" href="../public/css/styles.css">
   <link rel="stylesheet" href="../public/css/normalize.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      * {box-sizing: border-box;}
      
      input[type=text], select {
         width: 80%;
         padding: 5px;
         border: 1px solid #ccc;
         border-radius: 4px;
         box-sizing: border-box;
         margin-top: 2px;
         margin-bottom: 6px;
         resize: vertical;
      }
      
      input[type=submit] {
         background-color: #4CAF50;
         color: white;
         padding: 8px 1px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
      }
      
      input[type=submit]:hover {
         background-color: #45a049;
      }
      input[type=submit]:disabled {
         background-color: #b9bfcc;
      }
      
      .container {
         border-radius: 5px;
         background-color: #f2f2f2;
         padding: 20px;
      }
   </style>
</head>
<body>

<h3>Setup</h3>

<div class="container">
   <form action="createandinstall.php" method="post">
      <label for="pass1">Admin New Password</label><label id="pass1msg" style="color: red"></label><br>
      <input type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ :,;$)]+" id="pass1" name="password" placeholder="password" oninput="verifypass();"><br>
   
      <label for="pass2">Verify Admin New Password</label><label id="pass2msg" style="color: red"></label><br>
      <input type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ :,;$)]+" id="pass2" name="password" placeholder="Re-type password" oninput="verifypass();"><br>
      <hr>
      <label for="host">Host</label><br>
      <input type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ :,;$)]+" id="host" name="host" value="' . $_SERVER['SERVER_NAME'] . '" ><br>
      <label for="dbname">DBName</label><br>
      <input type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ :,;$)]+" id="dbname" name="dbname" placeholder="DB_Name"><br>
      <label for="dbuser">DBUser</label><br>
      <input type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ :,;$)]+" id="dbuser" name="dbuser" placeholder ="DB_UserName"><br>
      <label for="dbpassword">DBPassword</label><br>
      <input type="text" pattern="[a-zA-Z0-9ñÑáéíóú\-_(#@ :,;$)]+" id="dbpassword" name="dbpassword" placeholder="DBPassword"><br>
      <input type="submit" id="create" value="Iniciar Instalación" hidden="true"><br>
      <label hidden="true" id="wait">Espere, creando base de datos, puede tardar un poco.</label>
     </form>
     <button type="button" id="TestConnection" hidden="true" onclick="test_BD();" >TestConnection</button>
   
</div>

</body>
</html>
<script type="application/javascript">
function  verifypass(){
     if(document.getElementById("pass1").value===document.getElementById("pass2").value){
         document.getElementById("TestConnection").hidden=false;
         document.getElementById("pass2").style.color="black";
          document.getElementById("pass2msg").innerText="";
     }else {
         document.getElementById("TestConnection").hidden=true;
         document.getElementById("pass2").style.color="red";
         document.getElementById("pass2msg").innerText=" No coinciden";
     }
}

function test_BD() {
     pass1=document.getElementById("pass1").value;
     pass2=document.getElementById("pass2").value;
     hostname=document.getElementById("host").value;
     dbname=document.getElementById("dbname").value;
     dbuser=document.getElementById("dbuser").value;
     dbpassword=document.getElementById("dbpassword").value;
    if (pass1===pass2){
        let bhttpxml;
        try {
// Firefox, Opera 8.0+, Safari
            bhttpxml = new XMLHttpRequest();
        } catch (e) {
// Internet Explorer
            try {
                bhttpxml = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (ex) {
                try {
                    bhttpxml = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (eb) {
                    alert("Browser version not suported");
                    return false;
                }
            }
        }

        function stateChanged() {
          if (bhttpxml.readyState == 4) {
            Recived = bhttpxml.responseText;
            if (Recived=="mysql"){
            document.getElementById("create").hidden = false;
            document.getElementById("TestConnection").hidden = true;
           }
            else
                {
                alert(Recived);
             }
            }
        }
        

        let url = "bdsetup.php";
        url = url + "?host=" + hostname +"&dbname="+dbname+"&dbuser="+dbuser+"&dbpassword="+dbpassword;
        bhttpxml.onreadystatechange = stateChanged;
        bhttpxml.open("GET", url, true);
        bhttpxml.send(null);
    
    }
    else {
        alert("password diferente");
    }
}
const pass = document.getElementById("pass1");
const passmsg = document.getElementById("pass1msg");
if (pass){
pass.addEventListener("input", function () {
    if (pass.value.length < 6 || pass.value.length > 40) {
        passmsg.innerText=" Pasword muy corto";
    } else {
        passmsg.innerText="";
    }
});}
const create = document.getElementById("create");
const wait = document.getElementById("wait");
if (create){
create.addEventListener("click", function () {
      wait.hidden=false;
   });}

</script>
';
   
   
   print $template;