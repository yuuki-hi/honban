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
        <div class="wrapper">
            <h4>USER NAME:{{Auth::user()->name}}</h4>
            
            <div>
                <h4>お気に入り作品</h4>
                <div class="flex">
                    <div class='flex'>
                        @foreach (Auth::user()->works as $work)
                            <div class='work'>
                                <img src="/img/images.png">
                                <a href="/works/{{ $work -> id }}">{{ $work -> title }}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="user_news">
                        <h2>NEWS</h2>
                    </div>
                </div>
            </div>
            
            <div>
                <?php   $random_work = Auth::user()->works->random();    ?>
                <p>{{$random_work->title}}と同じカテゴリ："{{$random_work->category->name}}"の作品</p>
                <?php   
                    $i=0;
                    while(1){
                        if($i>100)
                            break;
                        $recommend_work = $random_work->category->works->random();
                        if($recommend_work->id != $random_work->id){
                            break;
                        }
                        $i++;
                    }
                    
                    
                ?>
                <div class='work'>
                    <img src="/img/images.png">
                    <a href="/works/{{ $recommend_work -> id }}">{{ $recommend_work -> title }}</a>
                </div>
                
            </div>
            
    
            <a href="/works">作品一覧</a>
        </div>
    </body>
</html>
@endsection

