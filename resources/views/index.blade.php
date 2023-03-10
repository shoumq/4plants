@extends('layout')

@section('content')
    <v-slider></v-slider>
    <v-products is-index="True">
        @foreach($products as $key => $data)
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
@endsection
