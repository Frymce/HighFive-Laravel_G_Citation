@extends('layouts.master')

@section('title')
    Editer la blague {{$blague->content}}
@endsection

@section('content')
    <form action="{{url('blague/'.$blague['id'].'/edit')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('patch')
        @include('partials.blague_form')
    </form>
@endsection

