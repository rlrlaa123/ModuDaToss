@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  영업 라인업 추가
                </div>

                <div class="panel-body">
                  {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                      {{Form::label('category', 'category')}}
                      {{Form::text('category','',['class' => 'form-control','placeholder' => '영업 라인업명'])}}
                    </div>
                    <div class="form-group">
                      {{Form::label('commision','commision')}}
                      {{Form::text('commision','',['class' => 'form-control','placeholder' => '수수료'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('content', 'content')}}
                        {{Form::textarea('content','',['id'=>'ckeditor','class' => 'form-control','placeholder' => ''])}}
                    </div>
                    <div class="form-group">
                        {{Form::file('image')}}
                    </div>
                    {{Form::submit('제출',['class' => 'btn btn-primary'])}}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
