@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Works</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/style.css">
        
        
    </head>
    <body>
        <h1 class="title">
            {{ $work->title }}
        </h1>
        <img class="work_image" src="/img/images.png">
        <div class="content">
            <div class="content_work">
                <h3>本文</h3>
                <p>{{ $work->sentence }}</p>    
            </div>
        </div>
        <div>
            <p>カテゴリー:{{ $work->category->name }}</p>
        </div>
     
     
 <!--登録ボタン   -->
<?php
    $new_mysqli = new mysqli('localhost', 'dbuser', 'kanon723', 'seikabutu');
     
    $sql = 'SELECT * FROM user_work WHERE user_id = ' . Auth::user()->id . ' AND work_id = ' . $work->id . '';
     
    $result = $new_mysqli->query($sql);
        
    if($result->num_rows){
?>
    	<form action="/bookmark_delete" method="POST">
            @csrf
            <input style="display: none;" type="text" name="user_id" value="{{Auth::user()->id}}">
            <input style="display: none;" type="text" name="work_id" value="{{ $work->id }}">
            <input type="submit" value="登録解除">
        </form>
<?php  
    }else{
?>
        <form action="/bookmark_register" method="POST">
            @csrf
            <input style="display: none;" type="text" name="user_id" value="{{Auth::user()->id}}">
            <input style="display: none;" type="text" name="work_id" value="{{ $work->id }}">
            <input type="submit" value="登録">
        </form>
<?php
    }
?>
 <!--登録ボタン   -->


    <a href="/works/{{$work->id}}/chat">チャット</a>

<?php
$query=$work->title;
$url="https://news.google.com/news/rss/search/section/q/".$query."/".$query."?hl=ja&gl=JP&ned=jp";
$rss=simplexml_load_file($url);
?>

    <h2>NEWS</h2>
    @for($i=0;$i<2;$i++) 
        <div style="border:solid 1px #000;　margin:10px;">
            <a href="{{$rss->channel->item[$i]->link}}">{{$rss->channel->item[$i]->title}}</a>
        </div>
    @endfor

    <div class="footer">
        <p class="edit">[<a href="/works/{{ $work->id }}/edit">edit</a>]</p>
        <a href="/works">戻る</a>
    </div>
        
        
    <form method="POST" action="/works/{{$work->id}}/upload" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button>アップロード</button>
    </form>
    
    <img src="{{ asset($work->image) }}">
        
        
        
    </body>
</html>
@endsection
