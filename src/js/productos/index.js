import { Dropdwon } from "bootstrap";
import { config } from "fullcalendar";

const formulario = document.getElementById('FormProducto')

const guardar = async (e) =>{
    e.preventDefault();
    
    try {
        const body = new FormData(formulario)
        const url = '/MVC-2-2024/API/productos/guardar';

        const config ={
            method : 'POST',
            body
        }

    } catch (error) {
        
        const respuesta = await fetch(url, config);

        console.log(respuesta);
    }
}

formulario.addEventListener('submit', guardar)