@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>Articles</h1>
    <p>Заполнение одного поля очистит значение второго! Они работают по отдельности, какую кнопку нажмешь - тот фильтр и сработает</p>
    <form method="GET">
        <div>
            <label for="filter" >Filter by code</label>
            <input type="text"  id="code" name="code" placeholder="Article code..." value="{{$code}}">
        </div>
        <button type="submit" >Filter by code</button>
    </form>

    <form method="GET">
        <div>
            <label for="title" >Filter by title</label>
            <input type="text"  id="title" name="title" placeholder="Article title..." value="{{$title}}">
        </div>
        <button type="submit" >Filter by title</button>
    </form>

    <form method="GET">
        <div>
            <label for="tag" >Filter by tag</label>
            <input type="text"  id="tag" name="tag" placeholder="Articles with tag..." value="{{$tag}}">
        </div>
        <button type="submit" >Filter by tag</button>
    </form>

    <table id="myTable">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Code</th>
            <th>Contents</th>
            <th>created_at</th>
            <th>Author</th>
        </tr>

            @foreach ($posts as $post)
                <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->Title}}</td>
                <td>{{$post->Code}}</td>
                <td>{{$post->Contents}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->Author}}</td>
                </tr>
            @endforeach

    </table>
    {{$posts->links()}}
@endsection

