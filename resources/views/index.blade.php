@extends('layout')

@section('content')
    <v-slider></v-slider>
    <v-products is-index="True">
        @foreach($products as $key => $data)
            <v-product
                title="{{ $data->title }}"
                desc="{{ $data->desc }}"
                image="{{ $data->image }}"
                price="{{ $data->price }}">
            </v-product>
        @endforeach
    </v-products>
@endsection
