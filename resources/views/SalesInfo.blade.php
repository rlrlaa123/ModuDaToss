@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">영업 정보 등록</div>
                <div class="panel-body">
                    {!! Form::open(['action' => 'SalesController@store', 'method' => 'POST']) !!}
                      <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('body','Body')}}
                        {{Form::textarea('body','',['class' => 'form-control','placeholder' => 'Body text'])}}
                      </div>
                      {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
