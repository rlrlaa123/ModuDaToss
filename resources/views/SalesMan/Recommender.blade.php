@extends('layouts.app3')
@section('content')

      <div class="Mmtitle">
        <span class="bluetitle">{{ Auth::user()->name }}</span>
        <p>님의 추천인 목록
      </div>
      <div class="NumberOfRecommender">
        <a href="/Recommenders"><button class='btn'>추천인 계보도</button></a>
        <span>추천인수 총 {{ $recommendee}} 명</span>
      </div>
      <div class='money_container'>
        <table class="table showithmoney" style="text-align:center">
            <thead>
              <tr>
                  <th>추천인이름</th>
                  <th>부여 포인트</th>
                  <th></th>
                  <th>발생시간</th>
              </tr>
            </thead>
            <tbody>
            @foreach($SH as $sh)
              <tr>
                  <td> {{ $sh->triggerName }} </td>
                  <td>+ {{ $sh->MoneySum }} 원 </td>
                  <td><img src="{{ URL::asset('/img/coin.png')}}" width="30" height="30"></td>
                  <td>{{ $sh->created_at->format('m-d H:i') }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class='page_container'>
            {{ $SH->links() }}
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
