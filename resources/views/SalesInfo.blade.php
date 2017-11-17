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
                        {{Form::label('CustomerName', 'CustomerName')}}
                        {{Form::text('CustomerName','',['class' => 'form-control','placeholder' => '고객명'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('BusinessName','BusinessName')}}
                        {{Form::text('BusinessName','',['class' => 'form-control','placeholder' => '사업장명'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('CustomerAddress','CustomerAddress')}}
                        {{Form::text('CustomerAddress','',['class' => 'form-control','placeholder' => '고객 주소'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('PhoneNumber','PhoneNumber')}}
                        {{Form::text('PhoneNumber','',['class' => 'form-control','placeholder' => '전화 번호'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('Characteristic','Characteristic')}}
                        {{Form::text('Characteristic','',['class' => 'form-control','placeholder' => '특이 사항'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('Category','Category')}}
                        {{Form::text('Category','',['class' => 'form-control','placeholder' => '카테고리'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('note','note')}}
                        {{Form::text('note','',['class' => 'form-control','placeholder' => '비고'])}}
                      </div>
      
                      <div class="form-group">
                        {{Form::label('CustomerEmail','CustomerEmail')}}
                        {{Form::text('CustomerEmail','',['class' => 'form-control','placeholder' => '고객 이메일'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('pay','pay')}}
                        {{Form::text('pay','',['class' => 'form-control','placeholder' => '금액'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('ContactTime','ContactTime')}}
                        {{Form::text('ContactTime','',['class' => 'form-control','placeholder' => '접촉시간'])}}
                      </div><div class="form-group">
                        {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
                      </div>

                      {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
