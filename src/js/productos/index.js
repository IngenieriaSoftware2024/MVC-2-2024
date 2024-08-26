import { Dropdwon, Tab } from "bootstrap";
import { config } from "fullcalendar";
import { Toast, validarFormulario } from "../funciones";
import Swal from "sweetalert2";
import DataTable from "datatables.net-bs5";
import { lenguaje } from "../lenguaje";

const formulario = document.getElementById('FormProducto');
const TablaProductos = document.getElementById('ProductosIngresados');
const BtnGuardar = document.getElementById('BtnGuardar');
const BtnModificar = document.getElementById('BtnModificar');
const BtnCancelar = document.getElementById('BtnCancelar');

BtnModificar.parentElement.classList.add('d-none');
BtnCancelar.parentElement.classList.add('d-none');

const datatable = new DataTable('#ProductosIngresados', {
    data: null,
    language: lenguaje,
    columns: [
        {
            title: 'No.',
            data: 'producto_id',
            width: '%',
            render: (data, type, row, meta) => {
                return meta.row + 1;
            }
        },
        {
            title: 'Nombre',
            data: 'producto_nombre'
        },
        {
            title: 'Precio',
            data: 'producto_precio'
        },
        {
            title: 'Acciones',
            data: 'producto_id',
            searchable: false,
            orderable: false,
            render: (data, type, row, meta) => {
                // Solo los administradores verán los botones de modificar y eliminar
                if (userRole === 'TIENDA_ADMIN') {
                    return `
                        <div class='d-flex justify-content-center'>
                            <button class='btn btn-warning modificar mx-1' data-id="${data}" data-nombre="${row.producto_nombre}" data-precio="${row.producto_precio}">
                                <i class='bi bi-pencil-square'></i> Modificar
                            </button>
                            <button class='btn btn-danger eliminar mx-1' data-id="${data}">
                                <i class='bi bi-trash'></i> Eliminar
                            </button>
                        </div>
                    `;
                } else {
                    // Si no es administrador, puedes mostrar un botón de "Ver" o dejar vacío
                    return `
                       <div class='d-flex justify-content-center'>
                            <button class='btn btn-info ver mx-1' data-id="${data}">
                                <i class='bi bi-check'></i>Adquirir
                            </button>
                        </div>
                    `;
                }
            }
        },
    ]
});

const guardar = async (e) => {
    e.preventDefault();
    BtnGuardar.disabled = true;

    if (!validarFormulario(formulario, ['producto_id'])) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        });
        BtnGuardar.disabled = false;
        return;
    }

    try {
        const body = new FormData(formulario);
        const url = '/MVC-2-2024/API/productos/guardar';

        const config = {
            method: 'POST',
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje } = data;

        if (codigo === 1) {
            Swal.fire({
                title: '¡Éxito!',
                text: mensaje,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });
            formulario.reset();
            Buscar();
        } else {
            Swal.fire({
                title: '¡Error!',
                text: mensaje,
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });
        }
    } catch (error) {
        console.log(error);
    }

    BtnGuardar.disabled = false;
};

const Buscar = async () => {
    const url = '/MVC-2-2024/API/productos/buscar';

    const config = {
        method: 'GET'
    };

    const respuesta = await fetch(url, config);
    const datos = await respuesta.json();
    datatable.clear().draw();

    if (datos) {
        datatable.rows.add(datos).draw();
    }
};

const llenarDatos = (e) => {
    const elemento = e.currentTarget.dataset;

    TablaProductos.parentElement.parentElement.classList.add('d-none');
    BtnGuardar.parentElement.classList.add('d-none');
    BtnModificar.parentElement.classList.remove('d-none');
    BtnCancelar.parentElement.classList.remove('d-none');

    formulario.producto_id.value = elemento.id;
    formulario.producto_nombre.value = elemento.nombre;
    formulario.producto_precio.value = elemento.precio;
};

const Cancelar = () => {
    TablaProductos.parentElement.parentElement.classList.remove('d-none');
    BtnGuardar.parentElement.classList.remove('d-none');
    BtnModificar.parentElement.classList.add('d-none');
    BtnCancelar.parentElement.classList.add('d-none');
    formulario.reset();
    Buscar();
};

const Modificar = async (e) => {
    e.preventDefault();

    if (!validarFormulario(formulario)) {
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        });
        return;
    }

    try {
        const body = new FormData(formulario);
        const url = '/MVC-2-2024/API/productos/modificar';

        const config = {
            method: 'POST',
            body
        };

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje } = data;

        if (codigo === 3) {
            Swal.fire({
                title: '¡Éxito!',
                text: mensaje,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });
            formulario.reset();
            Cancelar();
            Buscar();
        } else {
            Swal.fire({
                title: '¡Error!',
                text: mensaje,
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                background: '#e0f7fa',
                customClass: {
                    title: 'custom-title-class',
                    text: 'custom-text-class'
                }
            });
        }
    } catch (error) {
        console.log(error);
    }
};

const Eliminar = async (e) => {
    const id = e.currentTarget.dataset.id;

    let confirmacion = await Swal.fire({
        title: '¿Está seguro de que desea eliminar este producto?',
        text: "Esta acción es irreversible.",
        icon: 'warning',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Sí, eliminar',
        denyButtonText: 'No, cancelar',
        confirmButtonColor: '#3085d6',
        denyButtonColor: '#d33',
        background: '#fff3e0',
        customClass: {
            title: 'custom-title-class',
            text: 'custom-text-class',
            confirmButton: 'custom-confirm-button',
            denyButton: 'custom-deny-button'
        }
    });

    if (confirmacion.isConfirmed) {
        try {
            const body = new FormData();
            body.append('id', id);

            const url = '/MVC-2-2024/API/productos/eliminar';
            const config = {
                method: 'POST',
                body
            };

            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            const { codigo, mensaje } = data;

            if (codigo === 4) {
                Swal.fire({
                    title: '¡Éxito!',
                    text: mensaje,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#e0f7fa',
                    customClass: {
                        title: 'custom-title-class',
                        text: 'custom-text-class'
                    }
                });
                formulario.reset();
                Buscar();
            } else {
                Swal.fire({
                    title: '¡Error!',
                    text: mensaje,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#e0f7fa',
                    customClass: {
                        title: 'custom-title-class',
                        text: 'custom-text-class'
                    }
                });
            }
        } catch (error) {
            console.log(error);
        }
    }
};

Buscar();

BtnCancelar.addEventListener('click', Cancelar)
formulario.addEventListener('submit', guardar)
BtnModificar.addEventListener('click', Modificar)

datatable.on('click', '.modificar', llenarDatos)
datatable.on('click', '.eliminar', Eliminar)