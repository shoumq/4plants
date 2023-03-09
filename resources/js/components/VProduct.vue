<template>
    <div className="product-item">
        <img className="product-item__img"
             :src="image" alt="">
        <div className="container">
            <div className="product-item__title">{{ title }}</div>
            <div className="product-item__desc">{{ desc }}</div>
            <div className="product-item__price">{{ price }} ₽</div>
            <button className="btn btn-green" @click="zakaz">Подробнее</button>
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

    methods: {
        zakaz() {
            // window.alert(1)
        }
    }
}
</script>

<style scoped lang="sass">
.product
    &-flex
        display: grid
        grid-template-columns: repeat(3, 1fr)
        gap: 30rem
        margin-top: 50rem

    &-item
        box-shadow: 0 0 5rem #b6b6b6
        border-radius: 10rem
        padding-bottom: 15rem

        &__img
            width: 100%
            overflow: hidden
            border-radius: 10rem 10rem 0 0

        &__title
            font-size: 27rem
            font-weight: 600
            padding: 6rem 0

        &__desc
            font-size: 17rem
            font-weight: 500
            color: #333333

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
