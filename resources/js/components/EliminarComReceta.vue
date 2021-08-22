<template>
    <button class="btn btn-danger" @click="deleteComent">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>
</template>
<script>
import Swal from "sweetalert2";
import axios from "axios";
export default {
    props: ["idComentario", "idReceta"],
    methods: {
        deleteComent() {
            Swal.fire({
                title: "Deseas eliminar esta comentario?",
                text: "Una vez eliminado no se puede recuperar!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "si, eliminar!",
                cancelButtonText: "cancelar"
            }).then(result => {
                if (result.isConfirmed) {
                    const params = {
                        id: this.idComentario
                    };

                    //enviar peticion al server
                    axios
                        .post(`/comment/${this.idComentario}`, {
                            params,
                            _method: "delete"
                        })
                        .then(res => {
                            window.location = `/recetas/${this.idReceta}`;
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
