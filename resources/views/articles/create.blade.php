@extends('layouts.app')
@include('mceImageUpload::upload_form')
@include('layouts.tinymce')
@section('content')
    <h1>새 포럼 글 쓰기</h1>

    <hr/>

    <form action="{{ route('articles.store',$dashboard->id) }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}

        @include('articles.partial.form')

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">
                저장하기
            </button>
        </div>
    </form>
@stop
