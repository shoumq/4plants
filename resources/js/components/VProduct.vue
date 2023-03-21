<template>
    <div class="product-item">
        <img class="product-item__img"
             :src="'/storage/images/' + image" alt="">
        <div class="container container-flex">
            <div>
                <div class="product-item__title">{{ title }}</div>
                <div class="product-item__desc">{{ descData }}</div>
                <div class="product-item__price">{{ price }} ₽</div>
            </div>
            <button class="btn btn-green" @click="zakaz">Подробнее</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-product",

    props: {
        title: String,
        desc: String,
        price: String,
        image: String,
    },

    data() {
        return {
            descData: this.desc
        }
    },

    methods: {
        assertMaxChars () {
            if (this.descData.length >= 76) {
                this.descData = this.descData.substring(0,76) + '...';
            }
        }
    },

    mounted() {
        this.assertMaxChars();
    }
}
</script>

<style scoped lang="sass">
.product
    &-item
        box-shadow: 0 0 5rem #b6b6b6
        border-radius: 10rem
        padding-bottom: 15rem
        display: grid
        grid-gap: 1px
        grid-template-rows: 1fr 158rem 36rem

        &__img
            width: 100%
            overflow: hidden
            border-radius: 10rem 10rem 0 0
            height: 270rem
            object-fit: cover

        &__title
            font-size: 27rem
            font-weight: 600
            padding: 6rem 0

        &__desc
            font-size: 17rem
            font-weight: 500
            color: #333333
            height: 50rem
            overflow: hidden
            text-overflow: ellipsis

        &__price
            margin-top: 10rem
            font-size: 21rem
            font-weight: 700
            color: #333333

.btn
    margin-top: 20rem
    font-size: 18rem
    padding: 7rem 35rem
</style>
