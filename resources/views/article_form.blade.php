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
                    <h2>Редактировать статью</h2>
                    <hr/>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('home/article/'.$article->id) }}">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Название</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" value="{{ $article->title }}"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Текст</label>
                            <div class="col-sm-9">
                                <textarea name="text" rows="5" class="form-control">{{ $article->text }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success"> Сохранить</button>
                            </div>
                        </div>
                    </form>

                    <hr style="margin-top: 40px;"/>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
