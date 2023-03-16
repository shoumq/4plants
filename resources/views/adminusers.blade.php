@extends('layout')

@section('content')
    <div class="container admin">
        <v-admin-nav></v-admin-nav>
        <v-user-search all-users="{{ json_encode($users) }}"></v-user-search>
    </div>
@endsection
