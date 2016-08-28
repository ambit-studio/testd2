@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Панель управления</h1>
                </div>

                <div class="panel-body">

                    @if ($users)
                        <h2>Пользователи</h2>
                        <hr/>

                        <div class="row">
                            <h4 class="col-sm-2 name">Имя</h4>
                            <h4 class="col-sm-4 centered">Права администратора</h4>
                        </div>
                        <hr/>

                        @foreach ($users as $user)
                        <form class="form-horizontal" role="form" method="POST" action="access/{{ $user->id }}">
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ $user->name }}</label>
                                <div class="col-sm-4 centered">
                                    <input name="is_admin" type="checkbox" @if ($user->role->role == 'admin') checked @endif></input>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    @endif

                    <hr/>

                    <h2>Статьи</h2>

                    <hr/>

                    @foreach ($articles as $article)
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('home/article/'.$article->id) }}">
                                    {{ $article->title }}
                                </a>
                                <small class="author">(<small>автор:</small> <b>{{ $article->user->name }}</b>)</small>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('home/article/'.$article->id.'/edit') }}">
                                    <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                    <form role="form" method="POST" action="home/article/{{ $article->id }}" class="inline">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>                                
                                </a>
                            </div>
                        </div>

                        <hr/>

                    @endforeach


                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form class="form-horizontal" role="form" method="POST" action="home/article">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Название</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Текст</label>
                            <div class="col-sm-9">
                                <textarea name="text" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Добавить статью</button>
                            </div>
                        </div>
                    </form>

                    <hr/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
