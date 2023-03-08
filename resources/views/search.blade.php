@extends('layout')

@section('content')
    <v-products is-search="True" q="{{ $q }}">
        @foreach($pr as $key => $data)
            <v-product
                title="{{ $data->title }}"
                desc="{{ $data->desc }}"
                image="{{ $data->image }}"
                price="{{ $data->price }}">
            </v-product>
        @endforeach
    </v-products>
@endsection
