<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
    @media screen and (max-width: 768px) {
        .navbar-side .side-collapse {
            top: 50px;
            bottom: 0;
            right: 0;
            width: 256px;
            position: fixed;
            overflow: auto;
            transition: all 0.3s cubic-bezier(.87, -.41, .19, 1.44);
        }
        .navbar-side .side-collapse.open {
            width: 0;
            /*right: 0;*/
        }
    }
</style>

<nav class="navbar navbar-default navbar-side navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle" data-toggle="collapse-side" data-target=".side-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="navbar-default side-collapse open">
            <div class="navbar-collapse">
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li>
                            <a href="{{ route('sessions.create') }}">로그인</a>
                        </li>
                        <li><a href="{{ route('users.create') }}">회원가입</a></li>
                        {{--<li>--}}
                        {{--<a href="{{ route('articles.index') }}">게시판</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ route('income.inquiry') }}">수익조회 및 출금</a>--}}
                        {{--</li>--}}
                    @else
                        {{--@if (Auth::user()->type == 2)--}}
                        <li>
                            <a href="/Partner/{{ Auth::user()->category}}">(벤더)영업 정보 확인</a>
                        </li>
                        {{--@endif--}}

                        {{--                    @if (Auth::user()->type == 1)--}}
                        <li>
                            <a href="/SalesInfo/create">영업 정보 등록</a>
                        </li>
                        <li>
                            <a href="/SalesInfo/{{ Auth::user()->id}}">영업 정보 확인</a>
                        </li>
                        {{--@endif--}}
                        <li>
                            <a href="{{ route('articles.index') }}">게시판</a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="{{ route('income.inquiry') }}">수익조회 및 출금</a>--}}
                        {{--</li>--}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/mypage/{{ Auth::user()->id }}">
                                        내 정보 확인
                                    </a>
                                </li>
                                <li>
                                    <a href="/profit/{{ Auth::user()->id }}">
                                        수익 조회 및 출금
                                    </a>
                                </li>
                                <li>
                                    <a href="/Recommender/{{ Auth::user()->id }}">
                                        추천인 조회
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('sessions.destroy') }}">
                                        로그아웃
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function() {
        $('[data-toggle=collapse-side]').click(function(e) {
            $('.side-collapse').toggleClass('open');
        });
    });
</script>