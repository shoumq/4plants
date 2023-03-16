<template>
    <div class="admin-flex">
        <table>
            <tr>
                <th>ID</th>
                <th>Имя Фамилия</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>Дата регистрации</th>
                <th>Админ</th>
            </tr>
            <tr v-for="(item, index) in dataAllUsers" :key="index">
                <td>{{ item.id }}</td>
                <td>{{ item.name }} {{ item.surname }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.phone }}</td>
                <td>{{ item.created_at.split(':')[0].replace(/-/g, '.').split('T')[0] }}</td>
                <td>{{ item.admin }}</td>
            </tr>

        </table>

        <form class="admin-flex__search" @submit.prevent="getSearchData">
            <p class="admin-flex__search-title">Фильтр</p>
            <div>
                <label for="name">Имя
                    <input type="text" name="name" id="name" v-model="name">
                </label>
            </div>

            <div>
                <label for="surname">Фамилия
                    <input type="text" name="surname" id="surname" v-model="surname">
                </label>
            </div>

            <div>
                <label for="email">E-mail
                    <input type="text" name="email" id="email" v-model="email">
                </label>
            </div>

            <div>
                <label for="phone">Телефон
                    <input type="text" name="phone" id="phone" v-model="phone">
                </label>
            </div>

            <button type="submit" class="btn-green">Найти</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "v-user-search",

    props: ['allUsers'],

    data() {
        return {
            name: '',
            surname: '',
            email: '',
            phone: '',
            dataAllUsers: [],
            date: ''
        }
    },

    methods: {
        getSearchData() {
            axios.get('http://127.0.0.1:8000/admin/users_search', {
                params: {
                    name: this.name,
                    surname: this.surname,
                    email: this.email,
                    phone: this.phone
                }
            })
                .then((response) => {
                    this.dataAllUsers = response.data;
                })
        }
    },

    computed: {
        getDate() {
            return this.date.split(' ')[0].replace(/-/g, '.');
        },
    },

    mounted() {
        this.dataAllUsers = JSON.parse(this.allUsers);
    }
}
</script>

<style scoped>

</style>
