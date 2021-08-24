

<template>
  <splide :options="options">
    <splide-slide>
      <img
        src="https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aW1nfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80"
      />
    </splide-slide>
    <splide-slide>
      <img
        src="https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aW1nfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80"
      />
    </splide-slide>
    <splide-slide>
      <img
        src="https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aW1nfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80"
      />
    </splide-slide>
  </splide>
</template>

<script>
import { Splide, SplideSlide } from "@splidejs/vue-splide";
export default {
  components: {
    Splide,
    SplideSlide,
  },
  data() {
    return {
      options: {
        direction: "ttb",
        heightRatio: 0.6,
        perPage: 2,
      },
    };
  },
};
</script>