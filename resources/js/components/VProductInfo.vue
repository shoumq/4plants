<template>
    <div>
        <div class="product-title">{{ title }}</div>
        <div class="product-desc">{{ desc }}</div>
        <div class="product-kolvo">
            <label for="kolvo">Количество</label>
            <input @input="changeInputKolvo" id="kolvo" type="number" class="input" v-model="kolvo">
        </div>
        <div class="product-price">{{ priceData }} ₽</div>
        <button class="btn btn-green">Заказать</button>
    </div>
</template>


<script>
export default {
    name: 'v-product-info',

    props: {
        title: String,
        desc: String,
        price: Float64Array
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
            }
        }
    },

    mounted() {
        this.changeInputKolvo();
    }
}
</script>

<style lang="sass" scoped>
.input
    outline: none
    border: 1px solid dimgray
    font-size: 16rem
    padding: 2rem 4rem
    border-radius: 3rem

.btn
    padding: 5rem 25rem
    margin-top: 20rem
    font-size: 20rem
</style>
