@extends('layout')

@section('content')
    <div class="container admin">
        <v-admin-nav></v-admin-nav>
        <div class="product-flex">
            <div class="product-scroll">
                @foreach($image as $data)
                    <img src="/storage/images/{{ $data->name }}" class="product-img"/>
                @endforeach
            </div>
        </div>
    </div>
@endsection
