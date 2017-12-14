@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    영업 라인업별 자세한 사항
                </div>

                <div class="panel-body">
                    @if(count($Category) > 0)
                        <form action="{{ route('category.update',$Category->id) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                <input type="category" name="category" class="form-control" placeholder="영업 라인업명" value="{{ old('category',$Category->category) }}"/>
                                {!! $errors->first('category', '<span class="form-error">:message</span>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('commision') ? 'has-error' : '' }}">
                                <input type="commision" name="commision" class="form-control" placeholder="수수료" value="{{ old('commision', $Category->commision) }}"/>
                                {!! $errors->first('commision', '<span class="form-error">:message</span>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                <input type="content" name="content" class="form-control" placeholder="내용" value="{{ old('content', $Category->content) }}"/>
                                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    수수료 변경
                                </button>
                            </div>
                        </form>
                    @else
                        <p> 현재 정보가 없습니다. </p>
                    @endif
                </div>
                {!! Form::open(['action' => ['CategoryController@destroy',$Category->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('업종 삭제',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
