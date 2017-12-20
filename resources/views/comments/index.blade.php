@php
    $currentUser = auth()->user();
/**    $comments = $article->comments(); **/
@endphp
<div class="page-header">
    <h4>댓글</h4>
</div>
<div class="form__new__comment">
    @if($currentUser)
        {{--댓글 작성 폼--}}
        <div class="media media__create__initiate {{ isset($parentId) ? 'sub' : 'top' }}" style="margin:0px;">

            <div class="media-body">
                <form method="POST" action="{{ route('articles.comments.store', $article->id) }}" class="form-horizontal">
                    {!! csrf_field() !!}

                    @if(isset($parentId))
                        <input type="hidden" name="parent_id" value="{{ $parentId }}">
                    @endif

                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}"style="padding:0; margin:0">
                        <textarea name="content" class="form-control" style="margin:0">{{ old('content') }}</textarea>
                        {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
                    </div>

                    <div class="text-right" style="margin:10px 0px 0px 0px;">
                        <button type="submit" class="btn btn-primary btn-sm">
                            전송하기
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        {{--로그인 요구 폼--}}
        <div class="media link__login__comment">
            <div class="media-body">
                <h4 class="media-heading text-center">
                    <a href="{{ route('sessions.create') }}">로그인</a>하면 댓글을 쓸 수 있습니다.
                </h4>
            </div>
        </div>
    @endif
</div>
<div class="list__comment">
    @forelse($comments as $comment)
        @include('comments.partial.comment', [
          'parentId' => $comment->id,
          'isReply' => false,
        ])
    @empty
    @endforelse
</div>

@section('script')
    @parent
    <script>
        $(document).ready(function(){
            $(".media__create__comment").hide();
            $(".media__edit__comment").hide();
        });

        // 댓글 삭제 요청을 처리한다.
        $('.btn__delete__comment').on('click', function(e) {
            var commentId = $(this).closest('.item__comment').data('id'),
                articleId = $('#item__article').data('id');

            if (confirm('삭제할까요?')) {
                $.ajax({
                    type: 'DELETE',
                    url: "/comments/" + commentId
                }).then(function() {
                    $('#comment_' + commentId).fadeOut(1000, function () { $(this).remove(); });
                });
            }
        });

        // 대댓글 폼을 토글한다.
        $('.btn__reply__comment').on('click', function(e) {
            var el__create = $(this).closest('.item__comment').find('.media__create__comment').first(),
                el__edit = $(this).closest('.item__comment').find('.media__edit__comment').first();

            el__edit.hide('fast');
            el__create.toggle('fast').end().find('textarea').focus();
        });

        // 댓글 수정 폼을 토글한다.
        $('.btn__edit__comment').on('click', function(e) {
            var el__create = $(this).closest('.item__comment').find('.media__create__comment').first(),
                el__edit = $(this).closest('.item__comment').find('.media__edit__comment').first();

            el__create.hide('fast');
            el__edit.toggle('fast').end().find('textarea').first().focus();
        });
    </script>
@endsection