<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
    @media screen and (max-width: 768px) {
        .sideNav {
            top:50px;
            bottom:0;
            right:-256px;
            width:256px;
            position:fixed;
            overflow:auto;
            transition: all 0.3s cubic-bezier(.87, -.41, .19, 1.44);
            z-index: 1000;
        }
        .sideNav.open {
            display:block;
            top: 50px;
            bottom: 0;
            right: 0;
            width: 256px;
            position: fixed;
            overflow: auto;
            transition: all 0.3s cubic-bezier(.87, -.41, .19, 1.44);
            /*visibility:visible;*/
            z-index: 1000;
        }
        .recommend {
             padding-left: 25px;
             padding-bottom: 3px;
             text-align: left;
             border-radius: 5px;
             -webkit-tap-highlight-color: transparent;
         }

        li.recommend {
            padding-left: 25px;
            padding-bottom: 3px;
            text-align: left;
            border-radius: 5px;
            -webkit-tap-highlight-color: transparent;
        }
    }
</style>

<nav class="navbar-default nav" role="navigation">
    <button type="button" class="navbar-toggle">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/" style="color:#3473d9;">
        {{ config('app.name', 'Laravel') }}
    </a>
    <ul class="navbar-default navbar-collapse sideNav" style="margin-bottom:0; padding:0;">
        <div class="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ route('sessions.create') }}">로그인</a>
                    </li>
                    <li><a href="{{ route('users.create') }}">회원가입</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            영업 라인업 <span class="caret"></span>
                        </a>
                        @php $categories = \App\Category::all() @endphp
                        @if(isset($categories))
                            <ul class="dropdown-menu" role="menu">

                                @foreach($categories as $category)
                                    <li>
                                        <a href="/category/{{$category->id}}">{{$category->category}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <li><a href="{{ route('articles.index') }}">게시판</a></li>
                    {{--                        <li><a href="{{ route('income.inquiry') }}">수익조회 및 출금</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::user()->type==0)
                                <li>
                                    <a href="{{route('regular.create',Auth::user()->id)}}">
                                        정회원 신청
                                    </a>
                                </li>
                            @elseif (Auth::user()->type==5)
                                <li>
                                    <a>
                                        정회원 승인 대기중
                                    </a>
                                </li>
                            @elseif (Auth::user()->type==4)
                                <li class="recommend">
                                    추천인 코드 {{ Auth::user()->recommend_code }}
                                </li>
                            @elseif (Auth::user()->type==1)
                                <li class="recommend">
                                    추천인 코드 {{ Auth::user()->recommend_code }}
                                </li>
                            @endif
                            <li>
                                <a href="/mypage/{{ Auth::user()->id }}">
                                    내 정보 확인
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            영업 라인업 <span class="caret"></span>
                        </a>
                        @php $categories = \App\Category::all() @endphp
                        @if(isset($categories))
                            <ul class="dropdown-menu" role="menu">

                                @foreach($categories as $category)
                                    <li>
                                        <a href="/category/{{$category->id}}">{{$category->category}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>

                    @if (Auth::user()->type == 2)
                        <li>
                            <a href="/Partner/{{ Auth::user()->category}}">(벤더)영업 정보 확인</a>
                        </li>
                    @endif

                    @if (Auth::user()->type == 1 || Auth::user()->type == 4)
                        <li>
                            <a href="{{ route('SalesInfo.choosecategory') }}">영업 정보 등록</a>
                        </li>
                        <li>
                            <a href="/SalesInfo/{{ Auth::user()->id}}">영업 정보 확인</a>
                        </li>
                    @endif
                    @if (Auth::user()->type == 1 || Auth::user()->type == 4)
                        <li>
                            <a href="/profit/{{ Auth::user()->id }}">
                                수익 조회 및 출금
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('articles.index') }}">게시판</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            고객센터 <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href={{url('servicecenter/notice')}}>
                                    공지사항
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    자주 묻는 질문
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    문의하기
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{--<li>--}}
                    {{--<a href="{{ route('income.inquiry') }}">수익조회 및 출금</a>--}}
                    {{--</li>--}}
                @endif
            </ul>
        </div>
    </ul>
</nav>

<script>
    $(document).ready(function(event) {
        $('.navbar-toggle').on('click', function (e) {
            $('.sideNav').toggleClass('open');
            e.stopPropagation();
            return false;
        });

        // $('*:not(.navbar-toggle)').on('click', function () {
        //     $('.sideNav').removeClass('open');
        // });

    });
</script>
