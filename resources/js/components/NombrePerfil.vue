<template>
    <small>{{ usuario }}</small>
</template>
<script>
export default {
    props: ["idUser"],
    data() {
        return {
            usuario: ""
        };
    },
    mounted() {
        console.log("fecha", this.usuario);
    },
    methods: {
        getUser() {}
    }
};
</script>
