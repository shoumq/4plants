<template>
    <div class="user">
        <div class="user-name">{{ getName }} {{ getAdmin }}</div>
        <div class="user-date">Дата регистрации: {{ getDate }}</div>
        <div class="user-info">
            <div class="user-info__text">Номер телефона: <b>{{ phone }}</b></div>
            <div class="user-info__text">E-mail: <b>{{ email }}</b></div>
        </div>
    </div>
</template>


<script>
export default {
    name: 'v-profile',

    props: {
        name: String,
        surname: String,
        phone: String,
        email: String,
        date: String,
        admin: String
    },

    data() {
        return {
            kolvo: 1,
            priceData: ''
        }
    },

    methods: {
        changeInputKolvo() {
            this.priceData = parseFloat(this.price) * this.kolvo;
            if (this.kolvo <= 1) {
                this.kolvo = 1;
                this.priceData = 300;
            }
        }
    },

    computed: {
        getName() {
            return this.name + ' ' + this.surname
        },

        getDate() {
            return this.date.split(' ')[0].replace(/-/g, '.');
        },

        getAdmin() {
            if (this.admin === '1') return ' (админ)'
        }
    },

    mounted() {
        this.changeInputKolvo();
    }
}
</script>

<style lang="sass" scoped>
.user
    margin-top: 70rem

    &-name
        font-size: 37rem

    &-date
        font-size: 17rem

    &-info
        margin-top: 20rem
        display: flex
        flex-direction: column
        gap: 4rem

        &__text
            font-size: 20rem
</style>
