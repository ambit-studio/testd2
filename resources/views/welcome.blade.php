@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Тестовое задание</h1>
                </div>

                <div class="panel-body mainpage">
                    <h3>Добро пожаловать </h3>  
                    <a href="{{ url('/home') }}">Начать работу <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
