@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  영업 라인업 추가
                </div>
                {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="panel-body">
                    <div class="form-group">
                      {{Form::label('category', '업종명')}}
                      {{Form::text('category','',['class' => 'form-control','placeholder' => '영업 라인업명'])}}
                    </div>
                    <div class="form-group">
                      {{Form::label('commision','지정 수수료(%)')}}
                      {{Form::number('commision','',['class' => 'form-control','placeholder' => '수수료','min' => 0])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('content', '영업팁')}}
                        {{Form::textarea('content','',['id'=>'ckeditor','class' => 'form-control','placeholder' => ''])}}
                    </div>
                    <div class="form-group">
                        {{Form::file('image')}}
                    </div>
                </div>
                <div class="panel-footer">
                  {{Form::submit('등록',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
