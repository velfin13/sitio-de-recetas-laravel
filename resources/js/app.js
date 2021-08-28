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
Vue.component("calificacion-button", require("./components/Calificacion.vue").default);
Vue.component("eliminar-receta", require("./components/EliminarReceta.vue").default);
Vue.component("eliminar-comentario", require("./components/EliminarComReceta.vue").default);
Vue.component("foto-perfil", require("./components/GetPerfilUser.vue").default);
Vue.component("comentario-nombre", require("./components/NombrePerfil.vue").default);
Vue.component("user-recetas", require("./components/CountRecetas.vue").default);
Vue.component("all-categories", require("./components/AllCategories.vue").default);
Vue.component("star-rating", Raters.StarRating);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueSplide from '@splidejs/vue-splide';
Vue.use(VueSplide);

const app = new Vue({
    el: "#app"
});

// splide
document.addEventListener("DOMContentLoaded", function () {
    for (let index = 0; index <= 1000; index++) {
        let selector = `#splide-vertical-${index}`;

        if ($(selector).length) {
            new Splide(selector, {
                direction: 'ttb',
                perPage: 1,
                pagination: false,
                arrows: false,
                height: "380px",
                breakpoints: {
                    0: {
                        perPage: 1,
                    },
                    /* Small devices (portrait tablets and large phones, 600px and up) */
                    600: {
                        perPage: 1,
                    },
                    /* Medium devices (landscape tablets, 768px and up) */
                    768: {
                        perPage: 1,
                    },
                    /* Large devices (laptops/desktops, 992px and up) */
                    920: {
                        perPage: 1,
                    },
                    /* Extra large devices (large laptops and desktops, 1200px and up) */
                    1200: {
                        perPage: 1,
                    }
                }
            }).mount();
        }
    }

    new Splide('#splide-horizontal', {
        direction: "ltr",
        autoplay: true,
        interval: 4000,
        resetProgress: true,
        pagination: false,
        height: '27rem',
        autoHeight: true,
        perPage: 5,
        breakpoints: {
            0: {
                perPage: 1,
            },
            /* Small devices (portrait tablets and large phones, 600px and up) */
            600: {
                perPage: 1,
            },
            /* Medium devices (landscape tablets, 768px and up) */
            768: {
                perPage: 1.5,
            },
            /* Large devices (laptops/desktops, 992px and up) */
            920: {
                perPage: 4,
            },
            /* Extra large devices (large laptops and desktops, 1200px and up) */
            1200: {
                perPage: 3,
            }
        }
    }).mount();

    if ($("#splide-category-horizontal").length) {
        new Splide('#splide-category-horizontal', {
            type: "loop",
            autoplay: true,
            interval: 4000,
            perPage: 8,
            height: '100px',
            breakpoints: {
                0: {
                    perPage: 1.1,
                },
                411: {
                    perPage:1.3,
                },
                /* Small devices (portrait tablets and large phones, 600px and up) */
                600: {
                    perPage: 2,
                },
                /* Medium devices (landscape tablets, 768px and up) */
                768: {
                    perPage: 3,
                },
                /* Large devices (laptops/desktops, 992px and up) */
                920: {
                    perPage: 4,
                },
                /* Extra large devices (large laptops and desktops, 1200px and up) */
                1200: {
                    perPage: 8,
                }
            }
        }).mount();
    }

    if ($("#splide-latest-recipes-horizontal").length) {
        new Splide('#splide-latest-recipes-horizontal', {
            type: "loop",
            autoplay: true,
            interval: 4500,
            cover: true,
            heightRatio: 0.5,
            height: '10rem',
            pagination: false,
            perPage: 5,
            breakpoints: {
                0: {
                    perPage: 1,
                },
                /* Small devices (portrait tablets and large phones, 600px and up) */
                600: {
                    perPage: 1.1,
                },
                /* Medium devices (landscape tablets, 768px and up) */
                768: {
                    perPage: 2.3,
                },
                /* Large devices (laptops/desktops, 992px and up) */
                920: {
                    perPage: 2,
                },
                /* Extra large devices (large laptops and desktops, 1200px and up) */
                1200: {
                    perPage: 2.5,
                }
            }
        }).mount();
    }
});

// owl carousel
document.addEventListener("DOMContentLoaded", function () {
    $(".categories-carousel").owlCarousel({
        autoplay: true,
        loop: true,
        center: true,
        nav: true,
        items: 3,
    });

    $(".lastest-recipes-carousel").owlCarousel({
        rtl: false,
        loop: false,
        margin: 25,
        autoHeight: true,
        autoWidth: true,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

    $(".owl-carousel").owlCarousel({
        rtl: false,
        loop: false,
        margin: 100,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            },
            2000: {
                perPage: 3,
            }
        }
    });
});

/* datatable */
document.addEventListener("DOMContentLoaded", function () {
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

// sidebar
document.addEventListener("DOMContentLoaded", function () {
    var fullHeight = function () {
        $(".js-fullheight").css("height", $(window).height());
        $(window).resize(function () {
            $(".js-fullheight").css("height", $(window).height());
        });
    };
    fullHeight();

    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
    });
});

// modal video
document.addEventListener("DOMContentLoaded", function () {
    new ModalVideo('.js-modal-btn');
});

// magnific popup
$(document).ready(function () {
    // $('.image-link').magnificPopup({
    //     type: 'image'
    // });
});
