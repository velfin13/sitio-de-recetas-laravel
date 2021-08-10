<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="heading">Opiniones de los usuarios</h3>

                <div class="row">
                    <div class="col-md-6">
                        <star-rating
                            v-model="rating"
                            :increment="0.5"
                            text-class="custom-text"
                        >
                        </star-rating>
                    </div>
                    <div class="col-md-6"></div>
                </div>

                <br />
                <div class="row">
                    <div class="col-md-6">
                        <button @click="setRating()" class="btn btn-primary">
                            Publicar
                        </button>
                    </div>
                </div>

                <h3 class="heading">Reseñas</h3>
                <div class="review-rating">
                    <div class="left-review">
                        <div class="review-title">{{ totalrate ? totalrate : 0 }}</div>
                        <div class="review-star">
                            <star-rating
                                :inline="true"
                                :read-only="true"
                                :show-rating="false"
                                v-model="totalrate"
                                :increment="0.1"
                                :star-size="20"
                                active-color="#000000"
                            ></star-rating>
                        </div>
                        <div class="review-people">
                            <i class="fa fa-user"></i> {{ totaluser }}
                        </div>
                    </div>
                    <div class="right-review">
                        <div class="row-bar">
                            <div class="left-bar">5</div>
                            <div class="right-bar">
                                <div class="bar-container">
                                    <div class="bar-5" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row-bar">
                            <div class="left-bar">4</div>
                            <div class="right-bar">
                                <div class="bar-container">
                                    <div class="bar-4" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row-bar">
                            <div class="left-bar">3</div>
                            <div class="right-bar">
                                <div class="bar-container">
                                    <div class="bar-3" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row-bar">
                            <div class="left-bar">2</div>
                            <div class="right-bar">
                                <div class="bar-container">
                                    <div class="bar-2" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row-bar">
                            <div class="left-bar">1</div>
                            <div class="right-bar">
                                <div class="bar-container">
                                    <div class="bar-1" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
/* Star Rating */
* {
    box-sizing: border-box;
}
.fa {
    font-size: 12px;
}
.left-bar {
    float: left;
    width: 5%;
    margin-top: 10px;
}
.right-bar {
    margin-top: 10px;
    float: left;
    width: 95%;
}
.row-bar:after {
    content: "";
    display: table;
    clear: both;
}
.review-rating:after {
    content: "";
    display: table;
    clear: both;
}
.left-review {
    float: left;
    width: 30%;
    margin-top: 10px;
    text-align: center;
}
.right-review {
    float: left;
    width: 70%;
    margin-top: 10px;
}
.review-title {
    font-size: 56pt;
}
.review-star {
    margin: 0 0 10px 0;
}
.review-people .fa {
    font-size: 11pt;
}
.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
}
.bar-5 {
    height: 18px;
    background-color: #57bb8a;
}
.bar-4 {
    height: 18px;
    background-color: #9ace6a;
}
.bar-3 {
    height: 18px;
    background-color: #ffcf02;
}
.bar-2 {
    height: 18px;
    background-color: #ff9f02;
}
.bar-1 {
    height: 18px;
    background-color: #ff6f31;
}
.star-rating {
    text-align: center;
    margin: auto;
    width: 45%;
}
.star-rating .fa:hover {
    color: orange;
}
.heading {
    font-size: 25px;
    color: #999;
    border-bottom: 2px solid #eee;
}
@media (max-width: 400px) {
    .left-bar,
    .right-bar,
    .left-review,
    .right-review {
        width: 100%;
    }
}
.custom-text {
    font-weight: bold;
    font-size: 1.9em;
    border: 1px solid #cfcfcf;
    padding-left: 10px;
    padding-right: 10px;
    border-radius: 5px;
    color: #999;
    background: #fff;
}
</style>

<script>
import axios from "axios";
import swal from "sweetalert";
export default {
    props: ["idUser", "idReceta"],
    data() {
        return {
            totaluser: 0,
            totalrate: 0,
            rating: 0
        };
    },

    created() {
        this.getRating();
    },

    methods: {
        data: () => {},
        setRating() {
            if (this.idUser === "null") {
                swal(
                    `No puedes calificar!!`,
                    "Para poder calificar debes iniciar session",
                    "warning"
                );
                return;
            } else {
                var existe = false;
                var data = axios
                    .get(`/api/rating/${this.idReceta}}`)
                    .then(res => {
                        var datos = res.data.data;

                        datos.forEach(element => {
                            if (element.user_id === parseInt(this.idUser, 10)) {
                                existe = true;
                            } else {
                                existe = false;
                            }
                        });

                        if (existe) {
                            fetch("/api/rating/new", {
                                method: "post",
                                body: JSON.stringify({
                                    receta: this.idReceta,
                                    user: this.idUser,
                                    rating: this.rating
                                }),
                                headers: {
                                    "content-type": "application/json"
                                }
                            })
                                .then(function(res) {
                                    return res.json();
                                })

                                .then(data => {
                                    swal(
                                        "Gracias!",
                                        "Nueva calificaion",
                                        "success"
                                    );
                                    this.getRating();
                                })
                                .catch(err => {
                                    swal(
                                        `Error`,
                                        "Opps..Ocurrió un error inesperado",
                                        "error"
                                    );
                                });
                            return;
                        } else {
                            fetch("/api/rating/new", {
                                method: "post",
                                body: JSON.stringify({
                                    receta: this.idReceta,
                                    user: this.idUser,
                                    rating: this.rating
                                }),
                                headers: {
                                    "content-type": "application/json"
                                }
                            })
                                .then(function(res) {
                                    return res.json();
                                })

                                .then(data => {
                                    swal(
                                        "Gracias!",
                                        "Gracias por calificar",
                                        "success"
                                    );
                                    this.getRating();
                                })
                                .catch(err => {
                                    swal(
                                        `Error`,
                                        "Opps..Ocurrió un error inesperado",
                                        "error"
                                    );
                                });
                        }
                    });
            }
        },
        getRating() {
            this.actualiza();
            fetch(`/api/rating/${this.idReceta}}`)
                .then(res => res.json())
                .then(res => {
                    var mydata = res.data;
                    this.totaluser = mydata.length;
                    var sum = 0;
                    for (var i = 0; i < mydata.length; i++) {
                        sum += parseFloat(mydata[i]["rating"]);
                    }
                    var avg = sum / mydata.length;
                    this.totalrate = parseFloat(avg.toFixed(1));
                    var bar1 = 0;
                    var bar2 = 0;
                    var bar3 = 0;
                    var bar4 = 0;
                    var bar5 = 0;
                    for (var j = 0; j < mydata.length; j++) {
                        if (parseInt(mydata[j]["rating"]) == "1") {
                            bar1 += 1;
                        }
                        if (parseInt(mydata[j]["rating"]) == "2") {
                            bar2 += 1;
                        }
                        if (parseInt(mydata[j]["rating"]) == "3") {
                            bar3 += 1;
                        }
                        if (parseInt(mydata[j]["rating"]) == "4") {
                            bar4 += 1;
                        }
                        if (parseInt(mydata[j]["rating"]) == "5") {
                            bar5 += 1;
                        }
                    }
                    $(".bar-5").css("width", bar5 + "%");
                    $(".bar-4").css("width", bar4 + "%");
                    $(".bar-3").css("width", bar3 + "%");
                    $(".bar-2").css("width", bar2 + "%");
                    $(".bar-1").css("width", bar1 + "%");
                })
                .catch(err => {
                    console.log(err);
                });
        },
        /* verifica si el usuario ya ha calificado antes */
        actualiza() {
            var existe = {};
            var data = axios.get(`/api/rating/${this.idReceta}}`).then(res => {
                var datos = res.data.data;

                datos.forEach(element => {
                    if (element.user_id === parseInt(this.idUser, 10)) {
                        existe = element;
                    }
                });

                if (existe) {
                    this.rating = existe.rating;
                    return;
                }
            });
        }
    }
};
</script>
