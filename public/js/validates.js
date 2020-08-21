const username = document.getElementById("username");
username.addEventListener("input", function () {
    if (username.value.length < 5 || username.value.length > 40) {
        username.setCustomValidity("Verifique su Nombre");
    } else {
        username.setCustomValidity("");
    }
});

const pass = document.getElementById("password");
pass.addEventListener("input", function () {
    if (pass.value.length < 6 || pass.value.length > 40) {
        pass.setCustomValidity("Verifique su password");
    } else {
        pass.setCustomValidity("");
    }
});
const fullname = document.getElementById("fullname");
fullname.addEventListener("input", function () {
    if (fullname.value.length < 10 || fullname.value.length > 80) {
        fullname.setCustomValidity("Verifique su nombre completo");
    } else {
        fullname.setCustomValidity("");
    }
});
const rfc = document.getElementById("rfc");
rfc.addEventListener("input", function () {
    if (rfc.value.length < 10 || rfc.value.length > 16) {
        rfc.setCustomValidity("Verifique su RFC");
    } else {
        rfc.setCustomValidity("");
    }
});


const zip = document.getElementById("zip");
zip.addEventListener("input", function () {
    if (zip.value < 999 || zip.value > 99999) {
        zip.setCustomValidity("Verifique su Codigo Postal");
    } else {
        zip.setCustomValidity("");
    }
});
const addresslocal = document.getElementById("addresslocal");
addresslocal.addEventListener("input", function () {
    if (addresslocal.value.length < 5 || addresslocal.value.length > 78) {
        addresslocal.setCustomValidity("Verifique su Calle y Número");
    } else {
        addresslocal.setCustomValidity("");
    }
});

const phone = document.getElementById("phone");
phone.addEventListener("input", function () {
    if (phone.value.length < 10 || phone.value.length > 15) {
        phone.setCustomValidity("Verifique su Telefono");
    } else {
        phone.setCustomValidity("");
    }
});
const mail = document.getElementById("mail");
mail.addEventListener("input", function () {
    if (mail.value.length < 10 || mail.value.length > 40) {
        mail.setCustomValidity("Verifique su Correo");
    } else {
        mail.setCustomValidity("");
    }
});



