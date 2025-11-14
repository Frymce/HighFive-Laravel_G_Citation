@extends('layouts.master')

@section('title')
    Citations
@endsection

@section('content')

    <h1>Citations</h1>
    @if($citations)
        @foreach($citations as $citation)
            @include('partials.citation')
        @endforeach
    @else
        @include('articles.no-citation')
    @endif

@endsection
