@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
   <body>
        <div class="wrapper">
            <h1>Work Title</h1>
            <form action="/works" method="POST">
                @csrf
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="work[title]" placeholder="タイトル" value="{{ $work->title }}">
                    <p class="title__error" style="color:red">{{ $errors->first('work.title') }}</p>
                </div>
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="work[sentence]" placeholder="今日も1日お疲れさまでした。">{{ $work->sentence }}</textarea>
                    <p class="sentence__error" style="color:red">{{ $errors->first('work.sentence') }}</p>
                </div>
                <h2>カテゴリー</h2>
                @foreach($categories as $category)
                    <label>
                        @if($work->category_id==$category->id)
                            <input type="radio" value="{{ $category->id }}" name="work[category_id]" checked="checked">
                                {{$category->name}}
                            </input>
                        @else
                            <input type="radio" value="{{ $category->id }}" name="work[category_id]">
                                {{$category->name}}
                            </input>
                        @endif
                    </label>
                @endforeach
                <input type="submit" value="保存"/>
            </form>
            <div class="back">[<a href="/works">back</a>]</div>
        </div>
    </body>
</html>
@endsection