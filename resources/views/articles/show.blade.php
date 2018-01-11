@extends('layouts.app')

@section('content')
    <div class="page-header">

        <h4><a href="{{ route('articles.index',$dashboard->id) }}">
                {{ $dashboard->name }}
            </a>
            <small> / {{ $article->title }}</small></h4>
    </div>

    <article data-id="{{ $article->id }}">
        @include('articles.partial.article', compact('article'))

        <p style="margin:10px;">{!! ($article->content) !!}</p>
    </article>

    <div class="text-center action__article">
        @can('update', $article)
            <a href="{{ route('articles.edit', [$dashboard->id,$article->id]) }}" class="btn btn-info">
                <i class="fa fa-pencild"></i> 글 수정
            </a>
        @endcan
        @can('delete', $article)
            <button class="btn btn-danger button__delete">
                <i class="fa fa-trash-o"></i> 글 삭제
            </button>
        @endcan
        <a href="{{ route('articles.index',$dashboard->id) }}" class="btn btn-default">
            <i class="fa fa-list"></i> 글 목록
        </a>
    </div>
    <div class="container__comment">
        @include('comments.index')
{{--        @include('articles.comments.index')--}}
    </div>
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.button__delete').on('click', function(e) {
            var articleId = $('article').data('id');
            var dashboardId = {!! json_encode($dashboard->id) !!};

            if(confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/dashboard/' + dashboardId + '/articles/' + articleId
                }).then(function() {
                    window.location.href='/dashboard/' + dashboardId + '/articles/';
                });
            }
        });
    </script>
@stop