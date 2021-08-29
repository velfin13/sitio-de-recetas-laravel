<template>
  <div class="like-wrapper">
    <span
      class="like-btn"
      @click="likeReceta"
      :class="{ 'like-active': isActive }"
    >
    </span>
    <!-- <p>{{ cantidadLikes }} Likes</p> -->
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: ["recetaId", "like", "likes"],
  data: function () {
    return {
      isActive: this.like,
      totalLikes: this.likes,
    };
  },

  methods: {
    likeReceta() {
      axios
        .post(`/recetas/${this.recetaId}`)
        .then((res) => {
          if (res.data.attached.length > 0) {
            this.$data.totalLikes++;
          } else {
            this.$data.totalLikes--;
          }

          this.isActive = !this.isActive;
        })
        .catch((err) => {
          if (err.response.status === 401) {
            window.location = "/register";
          }
        });
    },
  },
  computed: {
    cantidadLikes: function () {
      return this.totalLikes;
    },
  },
};
</script>

<style>
.like-btn{
  height: 30px !important;
}
</style>
