@extends('layouts.app')
  @section('content')
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-body">
                {!! Form::open(['action' => ['MemberController@withdrawalrequest',$user->id], 'method' => 'POST']) !!}
                  <div class="wdalbox">
                    <span class="bluetitle wd">현재 보유액 </span>
                    <span class="greytitle wd">{{number_format($user->Commision)}}원(거래수수료) + {{number_format($user->RecommenderCommision)}}원(추천인수당) = {{number_format($user->RecommenderCommision + $user->Commision)}} 원</span>
                  </div>
                  <div class="wdalbox">
                    <span class="bluetitle wd">출금 신청 가능 금액 </span>
                    <span class="greytitle wd">{{number_format(($user->RecommenderCommision + $user->Commision)*(0.9))}} 원 = {{number_format($user->RecommenderCommision + $user->Commision)}} - {{number_format(($user->RecommenderCommision + $user->Commision)*(0.1))}}(보증금)</span>
                  </div>
                  <div class="wdalbox">
                    <span class="bluetitle wd">출금 금액</span>
                    {{Form::number('requestmoney','',['id' => 'MoneyInput', 'class' => 'wd SI_input form-control','placeholder' => '출금 요청 금액','min'=>1,'max'=> ($user->RecommenderCommision + $user->Commision)*0.9])}}
                    <input id="realrequest" type="hidden" name="realrequest" value="">
                  </div>

                  <div class="wdalbox Cashcaculate">
                    <div class="moneycaculate"><span class="moneycaculate" id="moneyinputed">0</span> 원 : 신청금액</div>
                    <div class="moneycaculate2">  - <span class="moneycaculate2" id="Tax">0</span> 원 : 소득세(3.3%)</div>
                    <div class="moneycaculate"><span class="moneycaculate" id="result">0</span>원 : 실수령가능액</div>
                  </div><br><br>

                  <br>
                  <div class="withdrawalinfo">
                    <span class="bluetitle wd">입금정보</span>
                    <span class="greytitle wd"> {{ $user->account_number}} ({{ $user->name}},{{ $user->bankName}}) </span>
                    <div class="Newinfocontainer">
                      <a class="btn Newwithinfo" href="{{ route('mypage.edit', Auth::user()->id) }}">새로운 입금정보 입력</a>
                    </div>
                  </div><br>

                  <div class="wdalbox">
                    <span class="bluetitle wd"> 입금예정일 </span>
                    <span class="greytitle wd"> 2017-1-11 </span>
                  </div>

                  <div class="Caution">
                    <span class="greytitle wd"> Admin에서 부여하는 주의사항 정보들 </span>
                  </div>

                  <div class="buttoncontainer">
                    <button class="btn Requestwidthdrawal">출금 신청</button>
                  {!! Form::close() !!}
                  </div>

              </div>
            </div>
        </div>
      </div>
<script>
$(document).ready(function(){
  $('.wd.SI_input').keyup(function(event){
      $('#moneyinputed').text(event.target.value);
      $('#Tax').text(parseInt((event.target.value)*0.033));
      $('#result').text(event.target.value - parseInt((event.target.value)*0.033));
      $('#realrequest').val(event.target.value - parseInt((event.target.value)*0.033));
  })
})
</script>
@endsection
