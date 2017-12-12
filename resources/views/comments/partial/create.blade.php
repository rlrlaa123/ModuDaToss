{{--<style>--}}
    {{--.form-control{--}}
        {{--display:none;--}}
    {{--}--}}
{{--</style>--}}
<div class="media media__create__comment {{ isset($parentId) ? 'sub' : 'top' }}" style="margin:0px;">

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