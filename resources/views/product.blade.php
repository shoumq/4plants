@extends('layout')

@section('content')
    <v-products>
        @foreach($pr as $key => $data)
            <a href="/product?id={{ $data->id }}" style="color: #000">
                <v-product
                    title="{{ $data->title }}"
                    desc="{{ $data->desc }}"
                    image="{{ $data->image }}"
                    price="{{ $data->price }}">
                </v-product>
            </a>
        @endforeach
    </v-products>

    <form method="get" action="/set_images" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image" alt="">
        <button type="submit">Push</button>
    </form>
@endsection
