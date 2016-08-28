@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $article->title }}</h1>
                </div>

                <div class="panel-body">
                    {{ $article->text }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
