<template>
    <div class="admin-flex">
        <table>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Дата добавления</th>
                <th>Активно</th>
            </tr>
            <tr v-for="(item, index) in dataAllPr" :key="index">
                <td>{{ item.id }}</td>
                <td>
                    <a :href="'/product_edit/' + item.id" style="color:black">{{ item.title }}</a>
                </td>
                <td>{{ item.created_at }}</td>
                <td>{{ item.active }}</td>
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
        }
    },

    computed: {
        getDate() {
            return this.date.split(' ')[0].replace(/-/g, '.');
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
