@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        메인 페이지 수정
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('etc/front/update') }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="form-group {{ $errors->has('front_img1') ? 'has-error' : '' }}">
                                <input type="front_img1" name="front_img1" class="form-control" placeholder="표지 이미지 숫자1" value="{{ old('front_img1',$front_img->front_img1) }}"/>
                                {!! $errors->first('front_img1', '<span class="form-error">:message</span>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('front_img2') ? 'has-error' : '' }}">
                                <input type="front_img2" name="front_img2" class="form-control" placeholder="표지 이미지 숫자2" value="{{ old('front_img2', $front_img->front_img2) }}"/>
                                {!! $errors->first('front_img2', '<span class="form-error">:message</span>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('front_img3') ? 'has-error' : '' }}">
                                <input type="front_img3" name="front_img3" class="form-control" placeholder="표지 이미지 숫자3" value="{{ old('front_img3', $front_img->front_img3) }}"/>
                                {!! $errors->first('front_img3', '<span class="form-error">:message</span>') !!}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    표지 이미지 숫자 변경
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
