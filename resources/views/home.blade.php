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
                        <p class="realtime_bname">{{$salesinfos[0]->BusinessName}}</p>
                        <p class="realtime_name">{{$salesinfos[0]->SP_name}}</p>
                        <p>{{$salesinfos[0]->Category}}</p>
                        <p>{{$salesinfos[0]->state}}</p>
                    </div>
                    <div class="front_page col realtime">
                        <p class="realtime_bname">{{$salesinfos[1]->BusinessName}}</p>
                        <p class="realtime_name">{{$salesinfos[1]->SP_name}}</p>
                        <p>{{$salesinfos[1]->Category}}</p>
                        <p>{{$salesinfos[1]->state}}</p>
                    </div>
                </div>
                <div class="front_page row">
                    <div class="front_page col realtime">
                        <p class="realtime_bname">{{$salesinfos[2]->BusinessName}}</>
                        <p class="realtime_name">{{$salesinfos[2]->SP_name}}</p>
                        <p>{{$salesinfos[2]->Category}}</p>
                        <p>{{$salesinfos[2]->state}}</p>
                    </div>
                    <div class="front_page col realtime">
                        <p class="realtime_bname">{{$salesinfos[3]->BusinessName}}</>
                        <p class="realtime_name">{{$salesinfos[3]->SP_name}}</p>
                        <p>{{$salesinfos[3]->Category}}</p>
                        <p>{{$salesinfos[3]->state}}</p>
                    </div>
                </div>
            @endif
            <h4>커뮤니티</h4>
        </div>
    </div>
    <p class="GotoSIInput-text">영업정보 등록</p>
    <a href="/Choosecategory"><div class="GotoSIinput">
            <img src="{{URL::asset('/img/trace.png')}}">
        </div>
    </a>
@endsection

<script>

</script>
