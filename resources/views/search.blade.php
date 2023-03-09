@extends('layout')

@section('content')
    @if (count($pr) === 0)
        <div class="container">
            <div style="font-size: 20rem" class="products-title-index">По запросу "{{ $q }}" ничего не найдено.</div>
        </div>
    @else
        <v-products is-search="True" q="{{ $q }}">
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
    @endif
@endsection
