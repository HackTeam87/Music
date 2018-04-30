@extends('layouts.site._index')

<!-- Main Content -->

@section('content')

            <nav class="navbar navbar-default sidebar" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a href="{{URL::to('createusuario')}}">Crear</a></li>
                                    <li><a href="#">Modificar</a></li>
                                    <li><a href="#">Reportar</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Informes</a></li>
                                </ul>
                            </li>
                            <li ><a href="#">Libros<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
                            <li ><a href="#">Tags<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
                            <li ><a href="#"><?php echo date('H:i:s d.m.Y');?><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>

    <div class="container">
    @foreach($music as $musics)
        <!-- Page Heading -->
            {{--<h1 class="my-4">{!!$musics->title!!}--}}
            {{--<small>Secondary Text</small>--}}
            {{--</h1>--}}
            <div class="row">
                <div class="col-md-7">
                    <a href="music/{{$musics->id}}">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="/blog/images/{!!$musics->img!!}" alt="img"
                             width="45%"/>
                    </a>
                </div>
                <div class="col-md-5">
                    <h3>{!!$musics->title!!}</h3>
                    <p>{!! $musics->text !!}</p>
                    <a class="btn btn-primary" href="music/{{$musics->id}}">Слушать</a>
                </div>
            </div>
            <hr>
    @endforeach


    <!-- Pagination -->
        <ul class="pagination justify-content-center page-item">
            {{ $music->links() }}
        </ul>

    </div>
@endsection

