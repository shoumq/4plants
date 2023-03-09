<template>
    <div :class="{white: isIndex}">
        <div class="container">
            <div class="products-title" v-if="isIndex">Все товары</div>
            <div class="products-title" v-if="isSearch">Найдено по запросу "{{ q }}":</div>
            <div class="product-flex">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-products",

    props: {
        isIndex: Boolean,
        isSearch: Boolean,
        q: String
    }
}
</script>

<style scoped lang="sass">
.white
    background: white

.products-title
    font-size: 40rem
    font-weight: 600
    text-align: center
    padding-top: 90rem

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

.btn
    margin-top: 20rem
    font-size: 18rem
    padding: 7rem 35rem
</style>
