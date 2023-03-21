<template>
    <div class="admin-flex">
        <div class="admin-flex__search">
            <p class="admin-flex__search-title">Фильтр</p>
            <div>
                <label for="name">Название
                    <input type="text" name="name" id="name" v-model="title">
                </label>
            </div>

            <div>
                <label for="surname">Описание
                    <input type="text" name="surname" id="surname" v-model="desc">
                </label>
            </div>

            <button type="submit" class="btn-green" @click="getSearchData">Найти</button>
        </div>

        <div class="product-flex">
            <a :href="'/product?id=' + item.id" style="color: #000" v-for="(item, index) in dataAllProducts" :key="index">
                <div class="product-item">
                    <img class="product-item__img"
                         :src="'/storage/images/' + item.image" alt="">
                    <div class="container container-flex">
                        <div>
                            <div class="product-item__title">{{ item.title }}</div>
                            <div class="product-item__desc">{{ assertMaxChars(item.desc) }}</div>
                            <div class="product-item__price">{{ item.price }} ₽</div>
                        </div>
                        <button class="btn btn-green">Подробнее</button>
                    </div>
                </div>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-products-all",

    props: ['allProducts'],

    data() {
        return {
            title: '',
            desc: '',
            dataAllProducts: [],
            descData: ''
        }
    },

    methods: {
        getSearchData() {
            axios.get('http://127.0.0.1:8000/admin/products_search/', {
                params: {
                    title: this.title,
                    desc: this.desc,
                }
            })
                .then((response) => {
                    this.dataAllProducts = response.data;
                })
        },

        assertMaxChars(desc) {
            if (desc.length >= 56) {
                return desc.substring(0, 56) + '...';
            } else {
                return desc
            }
        }
    },

    computed: {
        getDate() {
            return this.date.split(' ')[0].replace(/-/g, '.');
        },
    },

    mounted() {
        this.dataAllProducts = JSON.parse(this.allProducts);
        this.assertMaxChars();
    }
}
</script>

<style scoped lang="sass">


.admin-flex__search
    width: 300rem

.product
    &-flex
        display: grid
        grid-template-columns: repeat(3, 1fr)
        gap: 30rem
        margin-top: 0 !important
        width: 100%

    &-item
        box-shadow: 0 0 5rem #b6b6b6
        border-radius: 10rem
        padding-bottom: 15rem
        width: 100%

        &__img
            width: 100%
            overflow: hidden
            height: 200rem
            border-radius: 10rem 10rem 0 0

        &__title
            font-size: 27rem
            font-weight: 600
            padding: 6rem 0

        &__desc
            font-size: 17rem
            font-weight: 500
            color: #333333
            margin-bottom: 10rem

        &__price
            font-weight: 600

.btn
    margin-top: 20rem
    font-size: 18rem
    padding: 7rem 35rem
</style>
