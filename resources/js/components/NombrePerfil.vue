<template>
  <b>{{ usuario }}</b>
</template>
<script>
export default {
  props: ["idUser"],
  data() {
    return {
      usuario: "",
    };
  },
  created() {
    this.getUser();
  },
  methods: {
    getUser() {
      fetch(`/user-comentario/${this.idUser}`)
        .then((res) => res.json())
        .then((res) => (this.usuario = res.name));
    },
  },
};
</script>
