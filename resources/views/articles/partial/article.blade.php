<div class="media">
{{--    @include('users.partial.avatar', ['user' => $article->user])--}}
    <div class="media-body">
        <a href="{{ route('articles.show',[$dashboard->id,$article->id]) }}">
            <h4 class="media-heading">
                <a href="{{ route('articles.show',[$dashboard->id,$article->id]) }}">
                {{ $article->title }}
                </a>
            </h4>

            <i class="text-muted meta__article">
                <p style="font-size:10px;">
                {{--<a href="{{ gravatar_profile_url($article->user->email) }}">--}}
                    <i class="fa fa-user"></i> {{ $article->user->name }}
                    <i class="fa fa-clock"></i> {{ $article->created_at->diffForHumans() }}
                </p>
            </i>
        </a>
        {{--@if(Request::path() == 'articles')--}}
            {{--<p class="fa fa-content fa-5x"> {!! $article->content !!}</p>--}}
        {{--@endif--}}
    </div>
</div>