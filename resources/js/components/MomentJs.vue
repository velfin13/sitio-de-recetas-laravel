<template>
  <span >asdasd</span>
</template>

<script>
export default {
  props: ["date"],
  mounted() {
    console.log("date moment js", this.date);
  },
  computed: {
    setDateTime() {
      return "asdasd";
    },
  },
};
</script>

<style>
</style>