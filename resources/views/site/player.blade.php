@extends('layouts.site._index')
@section('content')
<div class="container">
    <p><a class="back" href="{{URL::previous()}}">Назад</a></p>
    <div class="row">

        @foreach($music as $musics)

            <div class="col-sm-12 marg">
                <div class="col-sm-3">

                    <div class="work_title">
                        <h1>{{$musics->title}}</h1>
                    </div>
                    <div class="audioplayer">

                        <audio controls autoplay="autoplay">
                            <source src="/blog/music/{{$musics->songs}}" type="audio/mpeg">
                        </audio>
                    </div>

                </div>
                <div class="col-sm-4">
                    <img src="/blog/images/{{$musics->img}}" class="media" alt="img" width="60%"/>
                </div>
                <div class="col-sm-4">
                    <p>{!!  $musics->text!!}</p>
                </div>

            </div>

        @endforeach

    </div>
</div>

<style>

    .back {
        font-size: 20px;
    }

    .marg {
        margin: 30px 30px 3px 30px;
        text-align: center;
    }


</style>

@endsection