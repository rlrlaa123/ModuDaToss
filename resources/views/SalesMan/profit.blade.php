@extends('layouts.app')
@if(Auth::user()->id == $user->id)
    @section('content')
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="ProfitName"><span class="bluetitle">{{ Auth::user()->name }}</span> 님의 수익현황</div>
                </div>
                <div class="panel-body">
                    <div class="MoneyAll">
                        <span>{{ number_format($user->Benefit + $user->Commision + $user->RecommenderCommision) }}</span>원
                    </div>
                    <br>
                    <div class="Accumulate">
                        <span class="bluetitle">누적금액</span>
                        <span class="greytitle">10000</span>
                    </div><br><br>

                    <div class="MoneyShow">
                        <span class="bluetitle">나의 수당</span>
                        <span class="greytitle">{{ number_format($user->Commision) }}</span>
                        <br><br>
                        <span class="bluetitle">추천인 수당</span>
                        <span class="greytitle">{{ number_format($user->RecommenderCommision) }}</span>
                    </div>
                </div>
                <br><br>
                <div class="buttoncontainer">
                    <a href="/withdrawal/{{ Auth::user()->id }}"><button class="btn withdrawal">출금하러가기</button></a>
                </div>

                <a href="/Recommender/{{ Auth::user()->id }}">
                    <div class="Gotorecom">
                        <img src="{{URL::asset('/img/recommendation.png')}}">
                    </div>
                </a>
            </div>
        </div>
    @endsection
@else
  <p>접근 권한이 없습니다</p>
@endif
