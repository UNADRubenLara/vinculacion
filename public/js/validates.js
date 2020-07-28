const username = document.getElementById("username");
username.addEventListener("input", function (input) {
    if (username.value.length < 5 || username.value.length > 40) {
        username.setCustomValidity("Verifique su Nombre");
    } else {
        username.setCustomValidity("");
    }
});

const pass = document.getElementById("password");
pass.addEventListener("input", function (input){
    if (pass.value.length < 6 || pass.value.length > 40) {
        pass.setCustomValidity("Verifique su password");
    } else {
        pass.setCustomValidity("");
    }
});
const fullname = document.getElementById("fullname");
fullname.addEventListener("input", function (input){
    if (fullname.value.length < 10 || fullname.value.length > 80) {
        fullname.setCustomValidity("Verifique su nombre completo");
    } else {
        fullname.setCustomValidity("");
    }
});
const rfc = document.getElementById("rfc");
rfc.addEventListener("input", function (input){
    if (rfc.value.length < 10 || rfc.value.length > 16) {
        rfc.setCustomValidity("Verifique su RFC");
    } else {
        rfc.setCustomValidity("");
    }
});
const addreslocal = document.getElementById("addreslocal");
addreslocal.addEventListener("input", function (input){
    if (addreslocal.value.length < 10 || addreslocal.value.length > 80) {
        addreslocal.setCustomValidity("Verifique su calle y numero");
    } else {
        addreslocal.setCustomValidity("");
    }
});
const zip = document.getElementById("zip");
zip.addEventListener("input", function (input){
    if (zip.value < 100 || zip.value > 99999 ) {
        zip.setCustomValidity("Verifique su Codigo Postal");
    } else {
        zip.setCustomValidity("");
    }
});
const addresref = document.getElementById("addresref");
addresref.addEventListener("input", function (input){
    if (addresref.value.length < 10 || addresref.value.length > 80) {
        addresref.setCustomValidity("Verifique su Colonia");
    } else {
        addresref.setCustomValidity("");
    }
});
const phone = document.getElementById("phone");
phone.addEventListener("input", function (input){
    if (phone.value.length < 10 || phone.value.length > 80) {
        phone.setCustomValidity("Verifique su Telefono");
    } else {
        phone.setCustomValidity("");
    }
});
const mail = document.getElementById("mail");
mail.addEventListener("input", function (input){
    if (mail.value.length < 10 || mail.value.length > 30) {
        mail.setCustomValidity("Verifique su Correo");
    } else {
        mail.setCustomValidity("");
    }
});



