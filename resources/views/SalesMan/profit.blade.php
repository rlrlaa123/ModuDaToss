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
                        <span>{{ number_format($user->Commision + $user->RecommenderCommision) }}</span>원
                    </div>
                    <br>
                    <div class="Accumulate">
                        <span class="bluetitle">총 누적금액</span>
                        <span class="greytitle">{{ $Accumulate }}</span>
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
                <a href="/DepositLog/{{ Auth::user()->id }}">
                  <div class="GotoDeposit">
                    <img src="{{URL::asset('/img/Profit/Deposit.png')}}">
                    <p>나의 수수료 기록</p>
                  </div>
                </a>
                <a href="/WithdrawalLog/{{ Auth::user()->id }}">
                  <div class="GotoWithdrawal">
                    <img src="{{URL::asset('/img/Profit/Withdrawal.png')}}">
                    <p>나의 출금 기록</p>
                  </div>
                </a>
            </div>
        </div>
    @endsection
@else
  <p>접근 권한이 없습니다</p>
@endif
