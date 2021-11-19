@extends('layouts.app')

@section('title', 'Title')

@section('content')
    <form method="post" action="{{route('shortLink.store')}}">
        {!! csrf_field() !!}
        <label>
            <input type="text" name="url" value="{{old('url')}}" placeholder="https://example.com">
        </label>

        <input type="submit" value="create">
    </form>
@endsection
