@extends('layouts.app')

@section('content')
    <div class="front_page">
        <img src="/img/banner.png" width="100%" height="10%">
        <div class="front_page container">
            <div class="front_page row">
                <div class="front_page col">
                    <p>등록된 정보</p>
                    <img src="/img/information.png" width="40%">
                    <p class="num">94,953건</p>
                </div>
                <div class="front_page col">
                    <p>등록된 정보</p>
                    <img src="/img/money.png" width="30%">
                    <p class="num">3,897,125건</p>
                </div>
                <div class="front_page col">
                    <p>등록된 정보</p>
                    <img src="/img/man.png" width="30%">
                    <p class="num">2,084건</p>
                </div>
            </div>
            <hr>
            <h4>실시간 견적 리스트</h4>
            @php($salesinfos = App\SalesInfo::orderBy('created_at','desc')->take(4)->get())
            @if(is_null($salesinfos))
            @else
                <div class="front_page row">
                    <div class="front_page col realtime">
                        <h4>{{$salesinfos[0]->BusinessName}}</h4>
                        <p class="realtime_name">{{$salesinfos[0]->SP_name}}</p>
                        <p>{{$salesinfos[0]->Category}}</p>
                        <p>{{$salesinfos[0]->state}}</p>
                    </div>
                    <div class="front_page col realtime">
                        <h4>{{$salesinfos[1]->BusinessName}}</h4>
                        <p class="realtime_name">{{$salesinfos[1]->SP_name}}</p>
                        <p>{{$salesinfos[1]->Category}}</p>
                        <p>{{$salesinfos[1]->state}}</p>
                    </div>
                </div>
                <div class="front_page row">
                    <div class="front_page col realtime">
                        <h4>{{$salesinfos[2]->BusinessName}}</h4>
                        <p class="realtime_name">{{$salesinfos[2]->SP_name}}</p>
                        <p>{{$salesinfos[2]->Category}}</p>
                        <p>{{$salesinfos[2]->state}}</p>
                    </div>
                    <div class="front_page col realtime">
                        <h4>{{$salesinfos[3]->BusinessName}}</h4>
                        <p class="realtime_name">{{$salesinfos[3]->SP_name}}</p>
                        <p>{{$salesinfos[3]->Category}}</p>
                        <p>{{$salesinfos[3]->state}}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection