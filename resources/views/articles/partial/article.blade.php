<div class="media">
{{--    @include('users.partial.avatar', ['user' => $article->user])--}}
    <div class="media-body">
        <a href="{{ route('articles.show', $article->id) }}">
            <h4 class="media-heading">
                {{--<a href="{{ route('articles.show', $article->id) }}">--}}
                {{ $article->title }}
                {{--</a>--}}
            </h4>

            <i class="text-muted meta__article">
                <p>
                {{--<a href="{{ gravatar_profile_url($article->user->email) }}">--}}
                    <i class="fa fa-user"></i> {{ $article->user->name }}
                    <i class="fa fa-clock"></i> {{ $article->created_at->diffForHumans() }}
                </p>
        {{--@if ('articles.show' === 'articles.show')--}}
        {{--@include('attachments.partial.list', ['attachments' => $article->attachments])--}}
            </i>
{{--@endif--}}
        </a>
        @if(Request::path() == 'articles')
            <p class="fa fa-content fa-5x"> {{ $article->content }}</p>
        @endif
    </div>
</div>