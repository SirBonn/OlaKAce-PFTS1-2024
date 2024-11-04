import "./bootstrap";
var toggleButton = document.getElementById("toggleButton");
var formCollapse = document.getElementById("formCollapse");

formCollapse.addEventListener("show.bs.collapse", function () {
    toggleButton.textContent = "Ocultar formulario";
});

formCollapse.addEventListener("hide.bs.collapse", function () {
    toggleButton.textContent = "Nuevo Post";
});

