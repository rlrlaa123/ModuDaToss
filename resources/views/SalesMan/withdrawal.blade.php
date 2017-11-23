@extends('layouts.app')
@if(Auth::user()->id == $user->id)
  @section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-header">

              </div>
              <div class="panel-body">
                {!! Form::open(['action' => ['SalesController@withdrawalrequest',$user->id], 'method' => 'POST']) !!}
                  <div class="form-group">
                    출금신청 가능 금액 : {{$user->Benefit + $user->Recommender}} 원
                  </div>
                  <div class="form-group">
                    {{Form::label('requestmoney','출금 요청 금액')}}
                    {{Form::text('requestmoney','',['class' => 'form-control','placeholder' => '출금 요청 금액'])}}
                  </div>
                  <div class="form-group">
                    입금정보
                    <p> {{ $user->name}} </p>
                    <p> {{ $user->bankName}} </p>
                    <p> {{ $user->account_number}} </p>
                    입금예정일
                    <p> 날짜 </p>
                  </div>




                  {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
              </div>
              <div class="panel-footer">
                footer
              </div>
            </div>
        </div>
      </div>
  </div>
  @endsection
@else
  <p>접근 권한이 없습니다</p>
@endif
