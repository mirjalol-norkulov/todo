<template>
    <div class="profile flex">
        <div class="py-1 px-2 rounded-l-full text-sm bg-red-500 text-white">
            {{ user.name }}
        </div>
        <button
            class="py-1 px-2 focus:outline-none rounded-r-full bg-red-500 text-white"
            @click="logout"
        >
            <i class="lni-exit"></i>
        </button>
    </div>
</template>

<script>
export default {
    name: "Profile",
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    methods: {
        async logout() {
            try {
                const { data } = await this.$axios.post("/logout");

                if (data.redirect) {
                    window.location.replace(data.redirect);
                }
            } catch (e) {
                alert(e.message);
            }
        }
    }
};
</script>

<style scoped>
.profile {
    position: absolute;
    top: 1rem;
    right: 1rem;
}
</style>
