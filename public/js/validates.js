const username = document.getElementById("username");

username.addEventListener("input", function (input) {
    if (username.value.length < 5 || username.value.length > 40) {
        username.setCustomValidity("Verifique su Nombre");
    } else {
        username.setCustomValidity("");
    }
});
