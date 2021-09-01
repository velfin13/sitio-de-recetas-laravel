<template>
    <img :src="link" alt="thumbnail" />
</template>
<script>
export default {
    props: {
        link:{
            type:String,
            default:"",
            require:true,
        }
    },
    data: () => {
        return {
            link
        };
    },
    created() {
        this.validar();
    },
    methods: {
        validar() {
            if (this.link) {
                var id = this.link.split("/")[4];
                var url = `https://img.youtube.com/vi/${id}/default.jpg`;
                this.link = url;
            }
        }
    }
};
</script>
