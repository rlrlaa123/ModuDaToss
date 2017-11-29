@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            벤더사 추가
          </div>

          <div class="panel-body">
            {!! Form::open(['action' => ['MemberController@store'], 'method' => 'POST']) !!}
              <div class="form-group">
                {{Form::label('email', 'email')}}
                {{Form::text('email','',['class' => 'form-control','placeholder' => '이메일'])}}
              </div>
              <div class="form-group">
                {{Form::label('password', 'password')}}
                {{Form::text('password','',['class' => 'form-control','placeholder' => '비밀번호'])}}
              </div>
              <div class="form-group">
                {{Form::label('name', 'name')}}
                {{Form::text('name','',['class' => 'form-control','placeholder' => '이름'])}}
              </div>
              <div class="form-group">
                {{Form::label('phoneNumber', 'phoneNumber')}}
                {{Form::text('phoneNumber','',['class' => 'form-control','placeholder' => '핸드폰 번호'])}}
              </div>
              <div class="form-group">
                {{Form::label('bankName', 'bankName')}}
                {{Form::text('bankName','',['class' => 'form-control','placeholder' => '은행이름'])}}
              </div>
              <div class="form-group">
                {{Form::label('accountNumber', 'accountNumber')}}
                {{Form::text('account_number','',['class' => 'form-control','placeholder' => '계좌 번호'])}}
              </div>
              <div class="form-group">
                {{Form::label('photo', 'photo')}}
                {{Form::text('photo','',['class' => 'form-control','placeholder' => '사진'])}}
              </div>
              <div class="form-group">
                {{Form::label('signature', 'signature')}}
                {{Form::text('signature','',['class' => 'form-control','placeholder' => '서명'])}}
              </div>
              <div class="form-group">

              <?php $n = count($Category); ?>
              <select name="category">
                <?php for($i = 0 ;$i < $n; $i++){
                  ?>
                  <option value="<? echo $Category[$i]['category']; ?>"><? echo $Category[$i]['category']; ?></option>
              <?
                }
              ?>


              </select>
              </div>
              <div class="form-group">
                {{Form::hidden('type', 2,['class' => 'form-control'])}}
              </div>

              {{Form::submit('벤더사 추가',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
          </div>
          <div class="panel-footer">
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
