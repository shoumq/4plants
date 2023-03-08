<template>
    <div class="container">
        {{ randData.image }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            randData: []
        }
    },

    methods: {
        getUsers() {
            axios.get('https://randomfox.ca/floof/')
                .then((response) => {
                    this.randData = response.data;
                })
        }
    },

    mounted() {
        setInterval(this.getUsers, 1000);
    }
}
</script>
