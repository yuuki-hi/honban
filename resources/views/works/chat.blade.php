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
            <h1>{{$work->title}}</h1>
            <p>{{$work->id}}</p>
            <h2>チャット</h2>
            
            <div>
                <p>a</p>
                
                @foreach($work->chats()->get() as $chat)
                    <p>ユーザー：{{$chat->user->name}}</p>
                    <p>{{$chat->sentence}}</p>
                @endforeach
            </div>
                            
            <form action="/works/{{$work->id}}/chat" method="POST">
                @csrf
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="chat[sentence]" placeholder="コメントを入力してください">{{ old('chat.sentence') }}</textarea>
                    <input style="display:none;" type="text" name="chat[user_id]" value={{Auth::user()->id}}>{{ old('chat.user_id') }}</textarea>
                    <input style="display:none;" type="text" name="chat[work_id]" value={{$work->id}}>{{ old('chat.work_id') }}</textarea>
                    <p class="sentence__error" style="color:red">{{ $errors->first('chat.sentence') }}</p>
                </div>
                <input type="submit" value="送信"/>
            </form>
            <div class="back">[<a href="/works">back</a>]</div>
        </div>
    </body>
</html>
@endsection