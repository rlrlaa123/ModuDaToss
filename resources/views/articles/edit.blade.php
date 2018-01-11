@extends('layouts.app')
@include('mceImageUpload::upload_form')
@include('layouts.tinymce')
@section('content')
    <div class="page-header">
        <h4><a href="{{ route('articles.index',$dashboard->id) }}">
                포럼
            </a>
            <small> / 글 수정 / {{ $article->title }}</small></h4>
    </div>

    <form action="{{ route('articles.update', [$dashboard->id,$article->id]) }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}

        @include('articles.partial.form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                수정하기
            </button>
        </div>
    </form>
@stop