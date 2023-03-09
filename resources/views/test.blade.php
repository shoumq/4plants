@extends('layout')

@section('content')
    <form method="post" action="/setimages" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image" alt="">
        <button type="submit">Push</button>
    </form>

    @foreach($allImages as $data)
        <div style="font-size: 20rem">{{$data->name}}</div>
        <img src="{{ asset('storage/images/'. $data->name) }}" alt="" style="width: 300rem; height: 300rem">
    @endforeach
@endsection
