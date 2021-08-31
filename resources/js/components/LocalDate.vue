<template>
  <span class="date" v-text="setLocalDate"></span>
</template>

<script>
export default {
  props: {
    date: {
      type: String,
    },
  },
  computed: {
    setLocalDate() {
      moment.locale('es-ES');
      return moment(this.date).fromNow();
    },
  },
};
</script>