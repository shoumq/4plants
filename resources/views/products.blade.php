@extends('layout')

@section('content')
    <div class="container admin">
        <v-products-all all-products="{{ json_encode($products) }}"></v-products-all>
    </div>
@endsection
