@extends('layouts.app')

@section('content')
    <form action="{{ route('mypage.update',$user->id) }}" method="POST" role="form" class="form__auth">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <input type="name" name="name" class="form-control" placeholder="이름" value="{{$user->name}}"/>
            {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('bankName') ? 'has-error' : '' }}">
            <input type="bankName" name="bankName" class="form-control" placeholder="은행" value="{{$user->bankName}}"/>
            {!! $errors->first('bankName', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('accountNumber') ? 'has-error' : '' }}">
            <input type="accountNumber" name="accountNumber" class="form-control" placeholder="계좌번호" value="{{$user->accountNumber}}"/>
            {!! $errors->first('accountNumber', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <input type="photo" name="photo" class="form-control" placeholder="사진" value="{{$user->photo}}"/>
            {!! $errors->first('photo', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                신청하기
            </button>
        </div>
    </form>
@stop