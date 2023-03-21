@extends('layout')

@section('content')
    <div class="container admin">
        <v-admin-nav></v-admin-nav>
        <div class="product-flex">
            <form method="post" action="/admin/api/add_products" enctype="multipart/form-data">
                @csrf
                <label class="add-label" for="title">Название
                    <input type="text" name="title" id="title" class="add-input">
                </label>
                <label class="add-label" for="desc">Описание
                    <input type="text" name="desc" id="desc" class="add-input">
                </label>
                <label class="add-label" for="price">Цена
                    <input type="text" name="price" id="price" class="add-input">
                </label>
                <input type="file" name="image" id="image" alt="" class="add-input">
                <button type="submit" class="btn-green add-btn">Добавить</button>
            </form>
        </div>
    </div>
@endsection
