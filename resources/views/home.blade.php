@extends('layouts.app_home')

@section('content')
    <div class="front_page">
        <img src="/img/banner.png">
        <div class="front_page container">
            <div class="front_page row">
                <div class="front_page col">
                    <p>등록된 정보</p>
                    <img class="img1" src="/img/information.png">
                    <p class="num">94,953건</p>
                </div>
                <div class="front_page col">
                    <p>등록된 정보</p>
                    <img class="img2" src="/img/money.png">
                    <p class="num">3,897,125건</p>
                </div>
                <div class="front_page col">
                    <p>등록된 정보</p>
                    <img class="img3" src="/img/man.png">
                    <p class="num">2,084건</p>
                </div>
            </div>
            <hr class="front_page line">
            <h4>실시간 견적 리스트</h4>
{{--            {{ app('request')->input('api/v1')[2] }}--}}
{{--            {{$salesinfos[0]}}--}}
            {{--{{route('api/v1/')}}--}}
            @php($salesinfos = \App\SalesInfo::orderBy('created_at','desc')->take(4)->get())
            @if(count($salesinfos) < 4)
            @else
                <div class="front_page row">
                    <div class="front_page col realtime">
                        @php($businessName = array($salesinfos[0]->BusinessName,$salesinfos[1]->BusinessName,$salesinfos[2]->BusinessName,$salesinfos[3]->BusinessName))
                        <p class="realtime_bname">
                            {{(strlen($businessName[0])>5) ? iconv_substr($businessName[0],0,5,"utf-8").'...' : $businessName[0]}}
                        </p>
                        <p class="realtime_name">{{$salesinfos[0]->SP_name}}</p>
                        <p>
                            {{(strlen($salesinfos[0]->CustomerAddress) > 12) ? iconv_substr($salesinfos[0]->CustomerAddress,0,11,"utf-8").'...' : $salesinfos[0]->CustomerAddress}}
                        </p>
                        @if($salesinfos[0]->state=='진행중')
                            <p>{{$salesinfos[0]->state}}</p>
                        @elseif($salesinfos[0]->state=='완료')
                            <p style="color:#3473d9;">{{$salesinfos[0]->state}}</p>
                        @elseif($salesinfos[0]->state=='실패')
                            <p style="color:red;">{{$salesinfos[0]->state}}</p>
                        @endif
                    </div>
                    <div class="front_page col realtime">
                        <p class="realtime_bname">
                            {{(strlen($businessName[1]) > 12) ? iconv_substr($businessName[1],0,11,"utf-8").'...' : $businessName[1]}}
                        </p>
                        <p class="realtime_name">{{$salesinfos[1]->SP_name}}</p>
                        <p>
                            {{(strlen($salesinfos[1]->CustomerAddress) > 12) ? iconv_substr($salesinfos[1]->CustomerAddress,0,11,"utf-8").'...' : $salesinfos[1]->CustomerAddress}}
                        </p>
                        @if($salesinfos[1]->state=='진행중')
                            <p>{{$salesinfos[1]->state}}</p>
                        @elseif($salesinfos[1]->state=='완료')
                            <p style="color:#3473d9;">{{$salesinfos[1]->state}}</p>
                        @elseif($salesinfos[1]->state=='실패')
                            <p style="color:red;">{{$salesinfos[1]->state}}</p>
                        @endif
                    </div>
                </div>
                <div class="front_page row">
                    <div class="front_page col realtime">
                        <p class="realtime_bname">
                            {{(strlen($businessName[2]) > 12) ? iconv_substr($businessName[2],0,11,"utf-8").'...' : $businessName[2]}}
                        </p>
                        <p class="realtime_name">{{$salesinfos[2]->SP_name}}</p>
                        <p>
                            {{(strlen($salesinfos[2]->CustomerAddress) > 12) ? iconv_substr($salesinfos[2]->CustomerAddress,0,11,"utf-8").'...' : $salesinfos[2]->CustomerAddress}}
                        </p>
                        @if($salesinfos[2]->state=='진행중')
                            <p>{{$salesinfos[2]->state}}</p>
                        @elseif($salesinfos[2]->state=='완료')
                            <p style="color:#3473d9;">{{$salesinfos[2]->state}}</p>
                        @elseif($salesinfos[2]->state=='실패')
                            <p style="color:red;">{{$salesinfos[2]->state}}</p>
                        @endif
                    </div>
                    <div class="front_page col realtime">
                        <p class="realtime_bname">
                            {{(strlen($businessName[3]) > 12) ? iconv_substr($businessName[3],0,11,"utf-8").'...' : $businessName[3]}}
                        </p>
                        <p class="realtime_name">{{$salesinfos[3]->SP_name}}</p>
                        <p>
                            {{(strlen($salesinfos[3]->CustomerAddress) > 12) ? iconv_substr($salesinfos[3]->CustomerAddress,0,11,"utf-8").'...' : $salesinfos[3]->CustomerAddress}}
                        </p>
                        @if($salesinfos[3]->state=='진행중')
                            <p>{{$salesinfos[3]->state}}</p>
                        @elseif($salesinfos[3]->state=='완료')
                            <p style="color:#3473d9;">{{$salesinfos[3]->state}}</p>
                        @elseif($salesinfos[3]->state=='실패')
                            <p style="color:red;">{{$salesinfos[3]->state}}</p>
                        @endif
                    </div>
                </div>
            @endif
            <h4 style="margin-bottom:3%;">커뮤니티</h4>
            <div class="front_page container">
                <div class="front_page image-container community">
                    <a href="">#영업의 팁</a>
                </div>
                <div class="front_page image-container dashboard">
                    <a href="{{ route('articles.index') }}">#커뮤니티</a>
                </div>
            </div>
        </div>
    </div>
    <p class="GotoSIInput-text">영업정보 등록</p>
    <a href="javascript:void(0)" onclick="SIinput({{Auth::user()}})" data-toggle="modal" data-target="#myModal"><div class="GotoSIinput">
            <img src="{{URL::asset('/img/trace.png')}}">
        </div>
    </a>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    로그인이 필요합니다.
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function SIinput(user){
        if(typeof user != "undefined") {
            window.location.href = "/Choosecategory";
        }
        else {
        }
    }
</script>
