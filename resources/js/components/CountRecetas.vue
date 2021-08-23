<template>
  <div class="user">
    <div class="user__avatar">
      <img
        class="rounded-circle"
        alt="100x100"
        :src="Image"
        data-holder-rendered="true"
      />
    </div>
    <div class="user__details">
      <span><b>{{ Name }}</b></span>
      <span
        >Recetas: <b>{{ count }}</b></span
      >
    </div>
  </div>
  <!-- <div class="dropdown">
    <a
      class="user"
      href="#"
      role="button"
      id="dropdownMenuLink"
      data-bs-toggle="dropdown"
      aria-expanded="false"
    >
      <div class="user__avatar dropdown-toggle">
        <img
          class="rounded-circle"
          alt="100x100"
          :src="Image"
          data-holder-rendered="true"
        />
      </div>
      <div class="user__details">
        <span>{{ Name }}</span>
        <span
          >Recetas: <b>{{ count }}</b></span
        >
      </div>
    </a>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <li><a class="dropdown-item" href="#">Action</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
    </ul>
  </div> -->
</template>

<script>
import axios from "axios";

export default {
  props: ["userImage", "userName", "userId"],
  data() {
    return {
      Name: this.userName,
      Image: this.userImage,
      count: 0,
    };
  },
  created() {
    this.getCountReceta();
  },
  methods: {
    getCountReceta() {
      axios
        .get(`/recetas-count/${this.userId}`)
        .then((res) => (this.count = res.data));
    },
  },
};
</script>
