@extends('layouts.app')

@section('content')
    <form action="{{ route('users.store') }}" method="POST" role="form" class="form__auth">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <input type="text" name="name" class="form-control" placeholder="이름" value="{{ old('name') }}" autofocus/>
            {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" class="form-control" placeholder="이메일" value="{{ old('email') }}"/>
            {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="비밀번호"/>
            {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password_confirmation" class="form-control" placeholder="비밀번호 확인" />
            {!! $errors->first('password_confirmation', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
            <label>성별:</label>
            <select class="form-control" id="gender" name="gender">
                <option value=0>남자</option>
                <option value=1>여자</option>
                {!! $errors->first('gender', '<span class="form-error">:message</span>') !!}
            </select>
        </div>

        <div class="form-group {{ $errors->has('phoneNumber') ? 'has-error' : '' }}">
            <input type="phoneNumber" name="phoneNumber" class="form-control" placeholder="휴대폰 번호" />
            <div class="row">
                <div class="col-xs-6">
                    {!! $errors->first('phoneNumber', '<span class="form-error">:message</span>') !!}
                </div>
                <div class="col-xs-6">
                    <div class="text-right">'-'없이 숫자만 입력하세요.</div>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('bankName') ? 'has-error' : '' }}">
            <input type="bankName" name="bankName" class="form-control" placeholder="은행" />
            {!! $errors->first('bankName', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('accountNumber') ? 'has-error' : '' }}">
            <input type="accountNumber" name="accountNumber" class="form-control" placeholder="계좌번호" />
            {!! $errors->first('accountNumber', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <input type="photo" name="photo" class="form-control" placeholder="사진" />
            {!! $errors->first('photo', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <input type="signature" name="signature" class="form-control" placeholder="서명" />
            {!! $errors->first('signature', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <input type="recommender" name="recommender" class="form-control" placeholder="추천인" />
            {!! $errors->first('recommender', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <input type="recommend_code" name="recommend_code" class="form-control" value="{{ str_random(8) }}" readonly="readonly">
            {!! $errors->first('recommend_code', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                가입하기
            </button>
        </div>
    </form>
@stop