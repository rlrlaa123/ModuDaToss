@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  업종 추가
                </div>

                <div class="panel-body">
                  {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                      {{Form::label('category', 'category')}}
                      {{Form::text('category','',['class' => 'form-control','placeholder' => '상품명'])}}
                    </div>
                    <div class="form-group">
                      {{Form::label('commision','commision')}}
                      {{Form::text('commision','',['class' => 'form-control','placeholder' => '수수료'])}}
                    </div>
                    {{Form::submit('제출',['class' => 'btn btn-primary'])}}
                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
