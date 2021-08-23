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
            <span>{{ Name }}</span>
            <span
                >Recetas: <b>{{ count }}</b></span
            >
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    props: ["userImage", "userName", "userId"],
    data() {
        return {
            Name: this.userName,
            Image: this.userImage,
            count: 0
        };
    },
    created() {
        this.getCountReceta();
    },
    methods: {
        getCountReceta() {
            axios
                .get(`/recetas-count/${this.userId}`)
                .then(res => (this.count = res.data));
        }
    }
};
</script>
