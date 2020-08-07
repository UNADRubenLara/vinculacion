function LoadBranch(str) {
    if (str.length > 3) {
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
                let ArrayRecived = JSON.parse(bhttpxml.responseText);
                let option, select;
                document.getElementById('branchlist').innerText = null;
                if (ArrayRecived.length >= 1) {
                    ArrayRecived.forEach(fillOptions);

                    function fillOptions(zone, i) {
                        option = document.createElement("option");
                        option.value = zone['branch_code'];
                        option.text = zone['branch'];
                        option.title = zone['b_description'] + " " + zone['b_description'] + " " + zone['b_includes'] + "" + zone['b_exclude']
                        select = document.getElementById("branchlist");
                        select.appendChild(option);
                    }
                } else {
                    option = document.createElement("option");
                    option.value = 99999;
                    option.text = 'Codigo Invalido';
                    select = document.getElementById("branchlist");
                    select.appendChild(option);
                }


            }
        }


        let url = './api-web/brandsearch.php';
        url = url + "?txt=" + str;
        bhttpxml.onreadystatechange = stateChanged;
        bhttpxml.open("GET", url, true);
        bhttpxml.send(null);
    }
}