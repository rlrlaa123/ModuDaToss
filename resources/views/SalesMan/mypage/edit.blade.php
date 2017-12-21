@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            회원정보수정
        </div>
        <hr>
        <div class="panel-body">
            <form action="{{ route('mypage.update',$user->id) }}" method="POST" role="form" class="form__auth">
                {!! csrf_field() !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label>이름</label>
                    <input type="name" name="name" class="form-control" placeholder="이름" value="{{$user->name}}"/>
                    {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
                </div>
                @if(Auth::user()->type != 0)
                    <div class="form-group {{ $errors->has('bankName') ? 'has-error' : '' }}">
                        <label>은행</label>
                        <input type="bankName" name="bankName" class="form-control" placeholder="은행" value="{{$user->bankName}}"/>
                        {!! $errors->first('bankName', '<span class="form-error">:message</span>') !!}
                    </div>

                    <div class="form-group {{ $errors->has('accountNumber') ? 'has-error' : '' }}">
                        <label>계좌번호</label>
                        <input type="accountNumber" name="accountNumber" class="form-control" placeholder="계좌번호" value="{{$user->accountNumber}}"/>
                        {!! $errors->first('accountNumber', '<span class="form-error">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label>사진</label>
                        <input type="photo" name="photo" class="form-control" placeholder="사진" value="{{$user->photo}}"/>
                        {!! $errors->first('photo', '<span class="form-error">:message</span>') !!}
                    </div>
                @endif

                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">
                        신청하기
                    </button>
                </div>
            </form>
        </div>
    </div>

@stop