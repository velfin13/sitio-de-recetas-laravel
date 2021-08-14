<template>
    <div>
        <!-- si la imagen es null -->
        <img
            src="/images/noImage.jpg"
            width="64"
            height="64"
            alt="profile"
            v-if="photo === null"
        />
        <!-- si el usuario tiene imagen de perfil -->
        <img
            :src="photo"
            width="64"
            height="64"
            alt="profile"
            v-if="photo !== null"
        />
    </div>
</template>
<script>
export default {
    data: () => {
        return { photo: null };
    },
    props: ["idUser"],
    created() {
        this.getUser();
    },
    methods: {
        getUser() {
            fetch(`/comment/${this.idUser}`)
                .then(res => res.json())
                .then(res => {
                    if (res.imagen === null) {
                        this.photo = null;
                    } else {
                        this.photo = `/storage/${res.imagen}`;
                    }
                });
        }
    }
};
</script>
