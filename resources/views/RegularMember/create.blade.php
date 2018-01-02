@extends('layouts.app')

@section('content')
    <form action="{{ route('regular.store',auth()->user()->id) }}" method="POST" role="form" class="form__auth">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
            <label>성별:</label>
            <select class="form-control" id="gender" name="gender">
                <option value='남자'>남자</option>
                <option value='여자'>여자</option>
                {!! $errors->first('gender', '<span class="form-error">:message</span>') !!}
            </select>
        </div>

        <div class="form-group {{ $errors->has('phoneNumber') ? 'has-error' : '' }}">
            <input type="number" name="phoneNumber" class="form-control" placeholder="휴대폰 번호" />
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
            <input type="recommend_code" name="recommend_code" class="form-control" value="{{ str_random(8) }}" readonly="readonly">
            {!! $errors->first('recommend_code', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                신청하기
            </button>
        </div>
    </form>
@stop