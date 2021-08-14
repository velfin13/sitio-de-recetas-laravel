/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import Raters from "vue-rate-it";
import "sweetalert2/dist/sweetalert2.min.css";
import "owl.carousel";
require("./bootstrap");

require("datatables.net-autofill-bs4");
require("datatables.net-bs4");
require("datatables.net-autofill-bs4");
require("datatables.net-buttons-bs4");
require("datatables.net-responsive-bs4");
window.Vue = require("vue");
window.$ = require("jquery");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.config.ignoredElements = ["trix-editor", "trix-toolbar"];

Vue.component("fecha-receta", require("./components/FechaReceta.vue").default);
Vue.component("like-button", require("./components/LikeButton.vue").default);
Vue.component(
    "calificacion-button",
    require("./components/Calificacion.vue").default
);
Vue.component(
    "eliminar-receta",
    require("./components/EliminarReceta.vue").default
);

Vue.component(
    "eliminar-comentario",
    require("./components/EliminarComReceta.vue").default
);

Vue.component(
    "foto-perfil",
    require("./components/GetPerfilUser.vue").default
);

Vue.component(
    "comentario-nombre",
    require("./components/NombrePerfil.vue").default
);

Vue.component("star-rating", Raters.StarRating);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});

/* carrucekl con owl */

jQuery(document).ready(function() {
    jQuery(".owl-carousel").owlCarousel({
        margin: 10,
        loop: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            950: {
                items: 3
            }
        }
    });
});

/* datatable */
$(document).ready(function() {
    $("#example").DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            decimal: "",
            emptyTable: "No hay información",
            info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
            infoFiltered: "(Filtrado de _MAX_ total entradas)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrar _MENU_ Entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "Sin resultados encontrados",
            paginate: {
                first: "Primero",
                last: "Ultimo",
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    });
});
