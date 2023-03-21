@extends('layout')

@section('content')
    <div class="container admin">
        <v-admin-nav></v-admin-nav>
        <div class="product-flex">
            <form method="post" action="/admin/api/edit_product" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" id="id" class="add-input" value="{{ $pr[0]->id }}" style="display: none !important;">
                <label class="add-label" for="title">Название
                    <input type="text" name="title" id="title" class="add-input" value="{{ $pr[0]->title }}">
                </label>
                <label class="add-label" for="desc">Описание
                    <textarea type="text" name="desc" id="desc" class="add-input" cols="30" rows="4">{{ $pr[0]->desc }}</textarea>
                </label>
                <label class="add-label" for="price">Цена
                    <input type="text" name="price" id="price" class="add-input" value="{{ $pr[0]->price }}">
                </label>
                <input type="file" name="image" id="image" alt="" class="add-input">
                <button type="submit" class="btn-green add-btn">Изменить</button>
            </form>
        </div>
    </div>
@endsection
