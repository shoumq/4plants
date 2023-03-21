<template>
    <div>
        <div class="form-sim">
            <select name="selectim" id="selectim" class="form-sim" v-model="selectim">
                <option v-for="(item, index) in productsData"
                        :key="index" :value="item.id">{{ item.title }}
                </option>
            </select>
            <button type="submit" @click="getImages" class="btn-green">Найти</button>
        </div>


        <div class="flex">
            <table class="img-sim">
                <tr>
                    <th>ID</th>
                    <th>Изображение</th>
                    <th>Удалить</th>
                </tr>
                <tr v-for="(item, index) in imagesData" :key="index">
                    <td>{{ item.id }}</td>
                    <td>
                        <img class="img-sim__img"
                             :src="'/storage/images/' + item.name" alt="">
                    </td>
                    <td>
                        <a @click="delImage(item.id)" style="cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash3"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            </table>

            <form method="post" :action="'http://127.0.0.1:8000/admin/api/add_imagesfun/' + this.selectim" class="admin-flex__search" enctype="multipart/form-data">
                <slot>

                </slot>
                <p class="admin-flex__search-title">Добавить</p>
                <input type="file" name="image" id="image" alt="" class="add-input">

                <button type="submit" class="btn-green">Добавить</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "v-add-image",

    props: ['images', 'products'],

    data() {
        return {
            imagesData: [],
            productsData: [],
            selectim: 1,
        }
    },

    methods: {
        getImages() {
            axios.get('/admin/api/find_images/' + this.selectim)
                .then(response => {
                    this.imagesData = response.data;
                    console.log(this.imagesData)
                })
        },

        getSearchData() {
            axios.post('/admin/api/add_images/' + this.selectim);
            axios.get('/admin/api/find_images/' + this.selectim)
                .then(response => {
                    this.imagesData = response.data;
                    console.log(this.imagesData)
                })
        },

        delImage(id) {
            axios.get('/admin/api/delete_images/' + id);
            axios.get('/admin/api/find_images/' + this.selectim)
                .then(response => {
                    this.imagesData = response.data;
                })
        }
    },

    mounted() {
        this.imagesData = JSON.parse(this.images);
        this.productsData = JSON.parse(this.products);
    }
}
</script>

<style lang="sass" scoped>
.img-sim
    &__img
        width: 200rem
        height: 200rem
        object-fit: cover

.flex
    display: flex
    align-items: flex-start
    margin-top: 40rem
    gap: 30rem
</style>
