const { default: Swal } = require("sweetalert2");
const { validarFormulario } = require("../funciones");

const formulario = document.querySelector('form')

const IniciarSesion = async (e) => {
    e.preventDefault();

    if (!validarFormulario(formulario)) {
        Swal.fire({
            title: "Campos vacios",
            text: "Debe llenar todos los campos",
            icon: "info"
        })
        return
    }
}

formulario.addEventListener('submit', IniciarSesion)