@extends('layouts.master')

@section('title')
    Editer la citation {{$citation->content}}
@endsection

@section('content')
    <form action="{{url('citation/'.$citation['id'].'/edit')}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('patch')
        @include('partials.form_citation')
    </form>
@endsection

