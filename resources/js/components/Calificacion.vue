<template>
  <div class="container-fluid">
    <div class="score-card">
      <!-- TOP SECTION -->
      <div class="top">
        <div class="row">
          <div class="first col-12 col-md-12 col-xl-4">
            <h2 class="text-center">
              <b
                >¿Que tal te parecio <br />
                esta receta 🤔?</b
              >
            </h2>
            <div class="rating-wrapper">
              <star-rating
                v-model="rating"
                inactive-color="#FCFCFC"
                active-color="#000000"
                text-class="rate-it-text"
                :item-size="20"
                :inline="true"
                :spacing="20"
              >
              </star-rating>
            </div>
            <button
              id="set-rating-button"
              @click="setRating()"
              class="btn btn-light"
            >
              👍 Puntuar
            </button>
          </div>
          <div class="second col-12 col-md-12 col-xl-4">
            <div class="row-bar">
              <div class="left-bar">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="right-bar">
                <div class="bar-container">
                  <div class="bar-5" style="width: 0%"></div>
                </div>
              </div>
            </div>
            <div class="row-bar">
              <div class="left-bar">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>
              <div class="right-bar">
                <div class="bar-container">
                  <div class="bar-4" style="width: 0%"></div>
                </div>
              </div>
            </div>
            <div class="row-bar">
              <div class="left-bar">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>
              <div class="right-bar">
                <div class="bar-container">
                  <div class="bar-3" style="width: 0%"></div>
                </div>
              </div>
            </div>
            <div class="row-bar">
              <div class="left-bar">
                <!-- dos estrellas llenas -->
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>
              <div class="right-bar">
                <div class="bar-container">
                  <div class="bar-2" style="width: 0%"></div>
                </div>
              </div>
            </div>
            <div class="row-bar">
              <div class="left-bar">
                <!-- 1 estrella llena -->
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>
              <div class="right-bar">
                <div class="bar-container">
                  <div class="bar-1" style="width: 0%"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="third col-12 col-md-12 col-xl-4">
            <div class="counter">
              <h3 class="number">
                <b>{{ totaluser }}</b>
              </h3>
              <h4 class="text">Valoraciones</h4>
            </div>
          </div>
        </div>
      </div>
      <!-- END TOP SECTION -->

      <!-- BOTTOM SECTION -->
      <div class="bottom">
        <span v-if="totaluser === 0" class="text"
          ><b>{{ totaluser }}</b> personas han puntado esta receta 😒</span
        >

        <span v-if="totaluser != 0" class="text"
          ><b>{{ totaluser }}</b> personas han puntado esta receta 🤩</span
        >
      </div>
      <!-- END BOTTOM SECTION -->
    </div>
  </div>
</template>

<style>
/* IDS */
#set-rating-button {
  background-color: white;
  padding: 10px 20px 10px;
  border: 1px black solid;
  border-radius: 0px;
  border-color: #f0f0f0;
}

/*SCORE CARD*/
.score-card {
  background-color: #fbfbfb;

  display: flex;
  flex-direction: column;

  min-height: 300px;

  padding: 20px;
}

.score-card .top {
  flex: 2;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
}

.score-card .top .first {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  padding-top: 20px;
  padding-bottom: 20px;
}

.score-card .top .first .rating-wrapper {
  margin-top: 10px;
  margin-bottom: 20px;
}

.score-card .top .second {
  display: flex;
  flex-direction: column;
  justify-content: center;

  padding-top: 20px;
  padding-bottom: 0px;
}

.score-card .top .second .row-bar {
  /* background-color: yellow; */
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;

  margin-top: 10px;
  margin-bottom: 10px;
}

.score-card .top .second .row-bar .left-bar {
  display: flex;
  flex: 1;

  justify-content: flex-start;
  align-content: center;

  width: 50%;
}

.score-card .top .second .row-bar .right-bar {
  padding-left: 5px;

  display: flex;
  flex: 3;

  flex-direction: column;
  justify-content: center;
  align-content: center;
  width: 50%;
}

.score-card .top .third {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  padding-top: 10px;
  padding-bottom: 10px;
}

.score-card .top .third .counter {
  text-align: center;
}

.score-card .top .third .counter .number {
  font-size: 40px;
}

.score-card .top .third .counter .text {
  text-align: center;
}

.score-card .bottom {
  background-color: #f7f7f7;

  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  padding-top: 5px;
  padding-bottom: 5px;
}

.score-card .bottom .text {
  font-size: 18px;
}

/* VUE RATE IT */
.rate-it-text {
  display: none;
}

/* BARS */
.bar-container {
  background-color: #f1f1f1;
}

.bar-5 {
  width: 100%;
  height: 18px;
  background-color: #57bb8a;
}

.bar-4 {
  width: 100%;
  height: 18px;
  background-color: #9ace6a;
}

.bar-3 {
  width: 100%;
  height: 18px;
  background-color: #ffcf02;
}

.bar-2 {
  width: 100%;
  height: 18px;
  background-color: #ff9f02;
}

.bar-1 {
  width: 100%;
  height: 18px;
  background-color: #ff6f31;
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
      rating: 0,
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
        var data = axios.get(`/api/rating/${this.idReceta}}`).then((res) => {
          var datos = res.data.data;

          datos.forEach((element) => {
            if (element.user_id === parseInt(this.idUser, 10)) {
              existe = true;
            } else {
              existe = false;
            }
          });

          if (existe) {
            fetch("/api/rating/new", {
              method: "put",
              body: JSON.stringify({
                receta: this.idReceta,
                user: this.idUser,
                rating: this.rating,
              }),
              headers: {
                "content-type": "application/json",
              },
            })
              .then(function (res) {
                return res.json();
              })

              .then((data) => {
                swal("Gracias!", "Nueva calificaion!!!", "success");
                this.getRating();
              })
              .catch((err) => {
                swal(`Error`, "Opps..Ocurrió un error inesperado", "error");
              });
            return;
          } else {
            fetch("/api/rating/new", {
              method: "post",
              body: JSON.stringify({
                receta: this.idReceta,
                user: this.idUser,
                rating: this.rating,
              }),
              headers: {
                "content-type": "application/json",
              },
            })
              .then(function (res) {
                return res.json();
              })

              .then((data) => {
                swal("Gracias!", "Gracias por calificar", "success");
                this.getRating();
              })
              .catch((err) => {
                swal(`Error`, "Opps..Ocurrió un error inesperado", "error");
              });
          }
        });
      }
    },
    getRating() {
      this.actualiza();
      fetch(`/api/rating/${this.idReceta}}`)
        .then((res) => res.json())
        .then((res) => {
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
        .catch((err) => {
          console.log(err);
        });
    },
    /* verifica si el usuario ya ha calificado antes */
    actualiza() {
      var existe = {};
      var data = axios.get(`/api/rating/${this.idReceta}}`).then((res) => {
        var datos = res.data.data;

        datos.forEach((element) => {
          if (element.user_id === parseInt(this.idUser, 10)) {
            existe = element;
          }
        });

        if (existe) {
          this.rating = existe.rating;
          return;
        }
      });
    },
  },
};
</script>
