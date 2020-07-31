function LoadBranch(str) {
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
                document.getElementById('BranchList').innerText = null;
                if (ArrayRecived.length >= 1) {
                    ArrayRecived.forEach(fillOptions);

                    function fillOptions(zone, i) {
                        option = document.createElement("option");
                        option.value = zone['branch_code'];
                        option.text = zone['branch'];
                        option.title= zone['b_description']+" "+ zone['b_description']+" "+zone['b_includes']+""+zone['b_exclude']
                        select = document.getElementById("BranchList");
                        select.appendChild(option);
                    }
                } else {
                    option = document.createElement("option");
                    option.value = 99999;
                    option.text = 'Sin CP';
                    select = document.getElementById("BranchList");
                    select.appendChild(option);
                }


            }
        }


        var url = "./api-web/branchsearch.php";
        url = url + "?txt=" + str;
        url = url + "&sid=" + Math.random();
        httpxml.onreadystatechange = stateChanged;
        httpxml.open("GET", url, true);
        httpxml.send(null);

    }