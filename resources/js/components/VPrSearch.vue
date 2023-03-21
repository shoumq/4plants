<template>
    <div class="admin-flex">
        <table>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Дата добавления</th>
                <th>Активно</th>
                <th>Удалить</th>
            </tr>
            <tr v-for="(item, index) in dataAllPr" :key="index">
                <td>{{ item.id }}</td>
                <td>
                    <a :href="'/product_edit/' + item.id" style="color:black">{{ item.title }}</a>
                </td>
                <td>{{ getTime(item.created_at) }}</td>
                <td>{{ item.active }}</td>
                <td>
                    <a @click="delProduct(item.id)" style="cursor: pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3"
                             viewBox="0 0 16 16">
                            <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                        </svg>
                    </a>
                </td>
            </tr>
        </table>

        <form class="admin-flex__search" @submit.prevent="getSearchData">
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

            <div>
                <label class="act" for="act">
                    <input @input="getAct" type="checkbox" id="act" value="act" v-model="active">
                    Активно
                </label>
            </div>

            <button type="submit" class="btn-green">Найти</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "v-pr-search",

    props: ['allPr'],

    data() {
        return {
            title: '',
            desc: '',
            active: true,
            dataAllPr: [],
            act: 1,
        }
    },

    methods: {
        getTime(time) {
            return String(time).split('T')[0] + ' | ' + String(String(time).split('T')[1]).split('.')[0];
        },

        getSearchData() {
            axios.get('http://127.0.0.1:8000/admin/product_search', {
                params: {
                    title: this.title,
                    desc: this.desc,
                    active: this.act,
                }
            })
                .then((response) => {
                    this.dataAllPr = response.data;
                    console.log(this.dataAllPr)
                })
        },

        getAct() {
            if (this.active === true) {
                this.act = 0
            }
            else {
                this.act = 1
            }
        },

        delProduct(id) {
            axios.get('http://127.0.0.1:8000/admin/api/del_products/' + id);
            this.dataAllPr = JSON.parse(this.allPr);
            window.location.reload();
        },
    },

    mounted() {
        this.dataAllPr = JSON.parse(this.allPr);
        console.log(this.dataAllPr[0])
    }
}
</script>

<style scoped lang="sass">
input[type="checkbox"]
    width: auto

.act
    display: flex
    align-items: center
    gap: 5rem
    user-select: none
    margin-top: 10rem
</style>
