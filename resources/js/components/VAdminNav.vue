<template>
    <div class="admin_nav">
        <a href="/admin/users">Пользователи</a>
        <a href="/admin/products">Товары</a>
        <a href="/admin/add_products">Добавить товар</a>
        <a href="/admin/api/add_images">Добавить картинки</a>
    </div>
</template>

<script>
export default {
    name: "v-admin-users"
}
</script>

<style lang="sass" scoped>
.admin_nav
    display: flex
    gap: 40rem
    padding: 5rem 0

    a
        color: #000000
        font-weight: 600
        font-size: 20rem
</style>
