@extends('layout')

@section('content')
    <div class="container profile">
        <v-profile
            name="{{ Auth::user()->name }}"
            surname="{{ Auth::user()->surname }}"
            email="{{ Auth::user()->email }}"
            phone="{{ Auth::user()->phone }}"
            date="{{ Auth::user()->created_at }}"
            admin="{{ Auth::user()->admin }}">
        </v-profile>
        <form method="post" action="/logout">
            @csrf
            <button class="btn btn-green" type="submit">Выйти</button>
        </form>
    </div>
@endsection
