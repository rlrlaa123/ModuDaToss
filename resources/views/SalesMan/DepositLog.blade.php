@extends('layouts.app3')
@section('content')

      <div class="Mmtitle">
        <span class="bluetitle">{{ Auth::user()->name }}</span>
        <p>회원님의 금액누적 기록</p>
      </div>
      <div class='money_container'>
        <table class="table showithmoney" style="text-align:center">
            <thead>
              <tr>
                  <th>발생금액</th>
                  <th>분류</th>
                  <th>발생시간</th>
                  <th>해당영업사원</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $dt)
              <tr>
                  <td> + {{ $dt->MoneySum }} 원 </td>
                  <td> {{ $dt->MoneyType }} </td>
                  <td>{{ $dt->created_at->format('m-d H:i') }}</td>
                  <td>{{ $dt->triggerName }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <div class='page_container'>
            {{ $data->links() }}
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
