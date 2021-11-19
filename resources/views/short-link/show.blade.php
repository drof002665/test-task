@extends('layouts.app')

@section('title', 'Title')

@section('content')
    <p>
        url: <a href="{{$url}}">
            {{$url}}
        </a>
    </p>

    <p>
        short link : <a href="{{route('shortLink.redirect', ['token' => $token])}}">
            {{route('shortLink.redirect', ['token' => $token])}}
        </a>
    </p>
@endsection
