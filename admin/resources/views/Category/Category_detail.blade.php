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
                                <textarea name="content" id="ckeditor" class="form-control" rows="10">{{ old('content', $Category->content) }}</textarea>
                                {!! $errors->first('category-ckeditor', '<span class="form-error">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    수수료 변경
                                </button>
                            </div>
                        </form>
                </div>
                <div class="panel-footer">
                  {{--<button class="category__delete btn-danger">업종 삭제</button> •--}}
                  {!! Form::open(['action' => ['CategoryController@destroy',$Category->id], 'method' => 'POST', 'onsubmit' => 'return ConfirmDelete()']) !!}
                      {{Form::hidden('_method','DELETE')}}
                      {{Form::submit('업종 삭제',['class' => 'btn btn-primary'])}}
                  {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ConfirmDelete()
    {
        var x = confirm("정말 삭제하시겠습니까?");
        if (x) {
            return true;
        }
        else {
            return false;
        }
    }
</script>

@endsection
