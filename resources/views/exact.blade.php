@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div>
        <h2>Related tags</h2>
        @foreach ($tags as $tag)
            <h3>{{$tag}}</h3>
        @endforeach
    </div>
    <h1>{{$article->Title}}</h1>
    <p>Code: {{$article->Code}}</p>
    <div>{{$article->Contents}}</div>
    <p>Written by {{$article->Author}} on {{$article->created_at}}<</p>
@endsection

