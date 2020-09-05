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
                let select;
                let maxprod=20;
                select = document.getElementById("productsfind");
                while (select.lastElementChild) {
                    select.removeChild(select.lastElementChild);
                }
                if (ArrayRecived.length >= 1 && ArrayRecived.length <= maxprod) {
                    let li, select, btn,goProduct;
                    document.getElementById('productsfind').innerText = null;
                    ArrayRecived.forEach(fillOptions);
                    function fillOptions(products, i) {
                        li = document.createElement("li");
                        btn = document.createElement('button');
                        goProduct=document.createElement("img");
                        btn.type = 'submit';
                        btn.value = products['idproduct_detail'];
                        goProduct.setAttribute("src", "./public/img/findperson.png")
                        goProduct.setAttribute("width", "50%");
                        goProduct.setAttribute("height", "auto");
                        li.className = 'ulproduct';
                        li.innerText = products['product_detail'];
                        select = document.getElementById("productsfind");
                        select.appendChild(li);
                        li.appendChild(btn);
                        btn.appendChild(goProduct);
                    }
                }
                if(!ArrayRecived) {
                   li = document.createElement("li");
                    li.className = 'ulproduct';
                        li.innerText = 'Sin Resultados!';
                        select.appendChild(li);
                     }
                if(ArrayRecived.length >=maxprod ) {
                    alert(ArrayRecived.length  );
                        li.innerText = "Más de 20 resultados, ser más específico";
                        select.appendChild(li);

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
