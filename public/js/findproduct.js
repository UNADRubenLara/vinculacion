function findProductByText(str) {
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
                if (ArrayRecived.length >= 1) {
                    let li, select, btn;
                    document.getElementById('productsfind').innerText = null;
                    ArrayRecived.forEach(fillOptions);

                    function fillOptions(products, i) {
                        li = document.createElement("li");
                        btn = document.createElement('button');
                        btn.type = 'submit';
                        btn.value = products['idproduct_detail'];
                        btn.textContent = '>>';
                        li.className = 'ulproduct';
                        li.innerText = products['product_detail'];
                        select = document.getElementById("productsfind");
                        select.appendChild(li);
                        li.appendChild(btn);
                    }
                } else {
                    option = document.createElement("option");
                    option.value = 'vacio';
                    option.text = 'vacio';
                    select = document.getElementById("productsearch");
                    select.appendChild(option);
                }

            }
        }

        let url = './api-web/IFind.php';
        url = url + "?txt=" + str;
        bhttpxml.onreadystatechange = stateChanged;
        bhttpxml.open("GET", url, true);
        bhttpxml.send(null);
    }
}
