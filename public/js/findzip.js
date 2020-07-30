function LoadZip(str) {
    var httpxml;
    try {
        // Firefox, Opera 8.0+, Safari
        httpxml = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            httpxml = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                httpxml = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Browser version not suported");
                return false;
            }
        }
    }

    function stateChanged() {

        if (httpxml.readyState == 1) {

            document.getElementById("msg").innerHTML = "Please Wait ...";

        }
        if (httpxml.readyState == 4) {
            var ArrayRecived = JSON.parse(httpxml.responseText);
            var msg = "";
            var msg = "<select id='ZipList' name='ZipChose' size='1'>";

            ArrayRecived.forEach(fillOptions);
            msg +='</select>';

            function fillOptions(zone,i ) {
                msg+= "<option value="+zone['idADDRESS']+">"+zone['C_NOMBRE']+", "+ zone['D_MUNICIPIO']+","+zone['D_ESTADO']+"</option>";
            }
            document.getElementById("displayZip").innerHTML=msg;
        }




        document.getElementById("msg").style.display = 'none';

    }


var url = "./api-web/zipsearch.php";
url = url + "?txt=" + str;
url = url + "&sid=" + Math.random();
httpxml.onreadystatechange = stateChanged;
httpxml.open("GET", url, true);
httpxml.send(null);
document.getElementById("msg").innerHTML = "Please Wait ...";
document.getElementById("msg").style.display = 'inline';

}