const username = document.getElementById("username");
if (username){
username.addEventListener("input", function () {
    if (username.value.length < 5 || username.value.length > 40) {
        username.setCustomValidity("Verifique su Nombre");
    } else {
        username.setCustomValidity("");
    }
});
}

const pass = document.getElementById("password");
if (pass){
pass.addEventListener("input", function () {
    if (pass.value.length < 6 || pass.value.length > 40) {
        pass.setCustomValidity("Verifique su password");
    } else {
        pass.setCustomValidity("");
    }
});}
if (pass){
    pass.addEventListener("focusout", function () {
        if (pass.value== username.value) {
            alert("Su password no puede ser igual a su nombre de usuario");
            pass.value='';
            pass.setCustomValidity("Su password no puede ser igual a su nombre de usuario");
        } else {
            pass.setCustomValidity("");
        }
    });}
const fullname = document.getElementById("fullname");
if (fullname){
fullname.addEventListener("input", function () {
    if (fullname.value.length < 10 || fullname.value.length > 80) {
        fullname.setCustomValidity("Verifique su nombre completo");
    } else {
        fullname.setCustomValidity("");
    }
});}
const rfc = document.getElementById("rfc");
if (rfc){
rfc.addEventListener("input", function () {
    if (rfc.value.length < 10 || rfc.value.length > 16) {
        rfc.setCustomValidity("Verifique su RFC");
    } else {
        rfc.setCustomValidity("");
    }
});}


const zip = document.getElementById("zip");
if (zip){
zip.addEventListener("input", function () {
    if (zip.value < 999 || zip.value > 99999) {
        zip.setCustomValidity("Verifique su Codigo Postal");
    } else {
        zip.setCustomValidity("");
    }
});}

const addresslocal = document.getElementById("addresslocal");
if (addresslocal){
addresslocal.addEventListener("input", function () {
    if (addresslocal.value.length < 5 || addresslocal.value.length > 78) {
        addresslocal.setCustomValidity("Verifique su Calle y Número");
    } else {
        addresslocal.setCustomValidity("");
    }
});}

const phone = document.getElementById("phone");
if (phone){
phone.addEventListener("input", function () {
    if (phone.value.length < 10 || phone.value.length > 15) {
        phone.setCustomValidity("Verifique su Telefono");
    } else {
        phone.setCustomValidity("");
    }
});}
const mail = document.getElementById("mail");
if (mail){
mail.addEventListener("input", function () {
    if (mail.value.length < 10 || mail.value.length > 50) {
        mail.setCustomValidity("Verifique su Correo");
    } else {
        mail.setCustomValidity("");
    }
});}
const productdetail = document.getElementById("productdetail");
if (productdetail){
productdetail.addEventListener("input", function () {
    if (productdetail.value.length < 10 || productdetail.value.length > 3000) {
        productdetail.setCustomValidity("Describa su producto a detalle");
    } else {
        productdetail.setCustomValidity("");
    }
});}




