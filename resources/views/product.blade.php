@extends('layout')

@section('content')
    <div class="container product">
        <div class="product-flex">
            <div class="product-slider">
                <v-product-slider data-arr="{{ json_encode($image) }}"></v-product-slider>
            </div>
            <v-product-info
                title="{{ $pr[0]->title }}"
                desc="{{ $pr[0]->desc }}"
                price="{{ $pr[0]->price }}">
            </v-product-info>
        </div>
    </div>
@endsection
