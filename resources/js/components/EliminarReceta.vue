<template>
    <a class="btn btn-danger" @click="eliminarReceta">
        <i class="fa fa-trash" aria-hidden="true" style="color:white"></i>
    </a>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";

export default {
    props: ["recetaId"],
    methods: {
        eliminarReceta() {
            Swal.fire({
                title: "Deseas eliminar esta receta?",
                text: "Una vez eliminada no se puede recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "si, eliminar!",
                cancelButtonText: "cancelar"
            }).then(result => {
                if (result.isConfirmed) {
                    const params = {
                        id: this.recetaId
                    };

                    //enviar peticion al server
                    axios
                        .post(`/recetas/${this.recetaId}`, {
                            params,
                            _method: "delete"
                        })
                        .then(res => {
                            Swal.fire(
                                "Eliminada!",
                                "Receta eliminada con exito.",
                                "success"
                            );

                            //eliminar receta del DOM
                            this.$el.parentNode.parentNode.parentNode.removeChild(
                                this.$el.parentNode.parentNode
                            );
                        })
                        .catch(erro => {
                            console.log(erro);
                        });
                }
            });
        }
    }
};
</script>
