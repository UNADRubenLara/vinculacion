function LoadZip(str) {
    document.getElementById('ziplist').innerText = null;
    let httpxml;
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

        if (httpxml.readyState == 4) {
            let ArrayRecived = JSON.parse(httpxml.responseText);
            let option, select;
            document.getElementById('ziplist').innerText = "espera";
            if (ArrayRecived.length >= 1) {
                ArrayRecived.forEach(fillOptions);

                function fillOptions(zone, i) {
                    option = document.createElement("option");
                    option.value = zone['idADDRESS'];
                    option.text = zone['C_NOMBRE'] + ", " + zone['D_MUNICIPIO'] + "," + zone['D_ESTADO'];
                    select = document.getElementById("ziplist");
                    select.appendChild(option);
                }
            }

        }
        if (httpxml.readyState == 2) {
            option = document.createElement("option");
            option.value = 99999;
            option.text = "No existe";
            select = document.getElementById("ziplist");
            select.appendChild(option);
        }

    }


    let url = "./api-web/zipsearch.php";
    url = url + "?txt=" + str;
    //url = url + "&sid=" + Math.random();
    httpxml.onreadystatechange = stateChanged;
    httpxml.open("GET", url, true);
    httpxml.send(null);

}