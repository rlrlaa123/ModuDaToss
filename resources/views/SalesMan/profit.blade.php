@extends('layouts.app3')
@section('content')
  <div class='profit'>
        <div class="Mmtitle">
          <span class="bluetitle">{{ Auth::user()->name }}</span>
          <p>회원님의 수익현황</p>
          <span>총 {{ number_format($user->Commision + $user->RecommenderCommision) }}</span>원
        </div>
        <div class="Accumulate">
            <span class="bluetitle">총 누적금액</span>
            <span class="greytitle">{{ number_format($Accumulate) }}원</span>
        </div>
        <div class="MoneyShow">
            <span class="bluetitle">수수료 수당</span>
            <span class="greytitle">{{ number_format($user->Commision) }}원</span>
            <br><br>
            <span class="bluetitle">추천인 수당</span>
            <span class="greytitle">{{ number_format($user->RecommenderCommision) }}원</span>
        </div>
        <div class="buttoncontainer">
            <a href="/withdrawal"><button class="btn withdrawal">출금하러가기</button></a>
        </div>
  </div>

  <div class="Membermenu">
    <a href="/profit"><div>
      <img src="{{ URL::asset('/img/withdrawl.png')}}">
      <p>수익조회 및 출금</p>
    </div></a>
    <a href="/Recommender"><div>
      <img src="{{ URL::asset('/img/Recommender.png')}}">
      <p>추천인 조회</p>
    </div></a>
    <a href="/DepositLog"><div>
      <img src="{{ URL::asset('/img/Money2.png')}}">
      <p>나의 수수료 기록</p>
    </div></a>
    <a href="/WithdrawalLog"><div>
      <img src="{{ URL::asset('/img/Log.png')}}">
      <p>나의 출금 기록</p>
    </div></a>
  </div>

<script>

</script>
@endsection
