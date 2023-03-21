<template>
    <div class="header">
        <div class="container">
            <div class="flex">
                <a href="/" class="logo">
                    <img :src="logo" alt="" class="logo-img">
                    <p class="logo-name"> {{ app_name }}</p>
                </a>

                <form action="/search" method="get" class="search">
                    <input class="search-input" placeholder="Поиск.." name="q" id="q">
                    <button class="btn btn-green">Найти
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>

                <a href="/profile" class="phone">{{ userName }}</a>
            </div>
        </div>
    </div>

    <div class="header-under">
        <div class="container">
            <div class="c1">
                <a href="/products" class="header-under__item">Товары</a>
                <a href="#" class="header-under__item">О нас</a>
                <a href="#" class="header-under__item">Контакты</a>
            </div>
            <a href="tel:{{phone}}" class="phone">{{ phone }}</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-header",

    props: {
        logo: String,
        app_name: String,
        phone: String,
        userName: String,
    }
}
</script>

<style scoped lang="sass">
.logo
    display: flex
    align-items: center
    gap: 10rem
    width: 150rem

    &-img
        width: 35rem

    &-name
        font-size: 26rem
        color: #333333
        text-decoration: none !important
        font-weight: 600

.header
    position: relative
    background: white
    padding: 12rem 0
    box-shadow: 0 0 4rem #d0d0d0
    z-index: 2 !important

.phone
    font-size: 20rem
    color: #333333
    font-weight: 500

.flex
    display: flex
    justify-content: space-between
    align-items: center

.search
    display: flex
    height: 33rem

    &-input
        padding: 0 8rem
        border-radius: 5rem 0 0 5rem
        outline: none
        border: 1px solid #d7d7d7
        width: 250rem
        font-size: 15rem
        transition: .3s

        &:focus
            border-left: 1px solid #a9a9a9
            border-top: 1px solid #a9a9a9
            border-bottom: 1px solid #a9a9a9

    .btn-green
        border-radius: 0 5rem 5rem 0
        font-size: 15rem
        display: flex
        align-items: center
        gap: 8rem

        .bi
            font-weight: 600

.header-under
    box-shadow: 0 0 4rem #d0d0d0
    padding: 13rem 0
    position: relative
    top: -1rem
    z-index: 0
    background: rgba(253, 253, 253, 0.5)

    .container
        display: flex
        justify-content: space-between

        .c1
            display: flex
            gap: 40rem

    &__item
        font-size: 20rem
        color: #333333
        font-weight: 500
        transition: .2s

        &:hover
            color: #69aa1f
</style>
