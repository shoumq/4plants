@extends('layout')

@section('content')
    <div class="container admin">
        <v-admin-nav></v-admin-nav>
        <v-pr-search all-pr="{{ json_encode($products) }}"></v-pr-search>
    </div>
@endsection
