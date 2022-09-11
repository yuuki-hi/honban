@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <div class="wrapper">
            <h1>Works</h1>
            <div>
                @foreach ($works as $work)
                    <div>
                        <h2>
                            <a href="/works/{{ $work->id }}">{{ $work->title }}</a>
                        </h2>
                        <p class='body'>{{ $work->sentence }}</p>
                    </div>
                @endforeach
            </div>
            [<a href='/works/create'>create</a>]
            [<a href='/'>user</a>]
            <div class='paginate'>
                {{ $works->links() }}
            </div>
        </div>
    </body>
</html>
@endsection