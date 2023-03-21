@extends('layout')

@section('content')
    <div class="container admin">
        <v-admin-nav></v-admin-nav>
        <div class="selectim">
            <v-add-image images="{{ json_encode($images) }}" products="{{ json_encode($products) }}">
                @csrf
            </v-add-image>
        </div>
    </div>
@endsection
