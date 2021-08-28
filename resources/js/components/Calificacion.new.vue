<template>
  <div class="container-fluid">
    <div class="score-card">
      <!-- TOP SECTION -->
      <div class="top">
        <div class="left">
          <star-rating
            v-model="rating"
            inactive-color="#000"
            active-color="$primary"
            text-class="rate-it-text"
            :item-size="20"
            :inline="true"
          >
          </star-rating>
        </div>
        <div class="right"></div>
      </div>
      <!-- END TOP SECTION -->
      <div class="bottom"></div>
    </div>
  </div>
</template>

<style>
/*Added Styles*/
.score-card {
  background-color: #999;

  display: flex;
  flex-direction: column;

  min-height: 300px;
}

.score-card .top {
  background-color: yellow;

  flex: 2;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
}

.score-card .top #rate-it-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
}

.score-card .top #rate-it-wrapper .vue-rate-it-rating-item {
  margin-right: 5px;
}

.score-card .bottom {
  background-color: blue;
  flex: 2;
}

/* VUE RATE IT */
.rate-it-text {
  display: none;
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
