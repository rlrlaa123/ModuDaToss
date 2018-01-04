<style>
    @media screen and (max-width: 768px) {
        .sideNav {
            top:0;
            bottom:0;
            right:-256px;
            width:256px;
            position:fixed;
            overflow:auto;
            transition: all 0.3s cubic-bezier(.87, -.41, .19, 1.44);
            z-index: 1000;
            background-color:white;
            border-radius:5px;
        }
        .sideNav.open {
            background-color:white;
            top:0;
            display:block;
            bottom: 0;
            right: 0;
            width: 230px;
            position: fixed;
            overflow: auto;
            transition: all 0.3s cubic-bezier(.87, -.41, .19, 1.44);
            /*visibility:visible;*/
            z-index: 1000;
            border-radius:5px;
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
        .navbar-default {
            background-color:white;
            border-color:white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.16);
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
    <ul class="navbar-default navbar-collapse sideNav" style="margin-bottom:0; padding:0; border-color:white;">
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
                                <span style="margin-left:25px; color:#3473d9">
                                    추천인 코드
                                </span>
                                <li class="recommend" id="foo" style="display:inline; padding-left:2px; color:#777">
                                    {{ Auth::user()->recommend_code }}
                                    <span>
                                        <img class="btn-copy" data-clipboard-target="#foo" src="/img/clippy.svg" width="10%" style="margin:3px 0 3px 5px;" value="{{ Auth::user()->recommend_code }}">
                                    </span>
                                </li>
                            @elseif (Auth::user()->type==1)
                                <span style="margin-left:25px; color:#3473d9">
                                    추천인 코드
                                </span>
                                <li class="recommend" id="foo" style="display:inline; padding-left:2px; color:#777">
                                    {{ Auth::user()->recommend_code }}
                                    <span>
                                        <img class="btn-copy" data-clipboard-target="#foo" src="/img/clippy.svg" width="10%" style="margin:3px 0 3px 5px;" value="{{ Auth::user()->recommend_code }}">
                                    </span>
                                </li>
                            @endif
                            <li>
                                <a href="/mypage/{{ Auth::user()->id }}">
                                    내 정보 확인
                                </a>
                            </li>
                            @if (Auth::user()->type!=2)
                            <li>
                                <a href="/Recommender/{{ Auth::user()->id }}">
                                    추천인 조회
                                </a>
                            </li>
                            @endif
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

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            커뮤니티 <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href={{ route('articles.index') }}>
                                    자유게시판
                                </a>
                            </li>

                            <li>
                                <a href="">영업의 팁</a>
                            </li>
                        </ul>
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

<script src="/js/clipboard.min.js"></script>

<script>
    $(document).ready(function(event) {
        $('.navbar-toggle').on('click', function (e) {
            $('.sideNav').toggleClass('open');

            e.stopPropagation();
            return false;
        });
        $(document).click(function(event) {
            var clickover = $(event.target);
            var _opened = $('.sideNav').hasClass("sideNav open");
            if (_opened === true && !clickover.hasClass("navbar-toggle")) {
                $('.sideNav').toggleClass('open');
            }
        });
    });

    var clipboard = new Clipboard('.btn-copy');

    clipboard.on('success', function(e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);

        alert('복사되었습니다');

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
    // function myFunction() {
    //     var copyText = document.getElementById("foo.recommend");
    //     copyText.select();
    //     document.execCommand("Copy");
    //     alert("Copied the text: " + copyText.value);
    // }
</script>