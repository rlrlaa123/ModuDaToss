@extends('layouts.app')
@if(Auth::user()->id == $user->id)
  @section('content')
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-body">
                {!! Form::open(['action' => ['SalesController@withdrawalrequest',$user->id], 'method' => 'POST']) !!}
                  <div class="wdalbox">
                    <span class="bluetitle wd">현재 보유액 </span>
                    <span class="greytitle wd">{{number_format($user->RecommenderCommision + $user->Commision)}} 원</span>
                  </div>
                  <div class="wdalbox">
                    <span class="bluetitle wd">출금 신청 가능 금액 </span>
                    <span class="greytitle wd">{{($user->RecommenderCommision + $user->Commision)*(0.9)}} 원 = {{$user->RecommenderCommision + $user->Commision}} - {{($user->RecommenderCommision + $user->Commision)*(0.1)}}(보증금)</span>
                  </div>
                  <div class="wdalbox">
                    <span class="bluetitle wd">실출금수령가능금액 </span>
                    <span class="greytitle wd">{{($user->RecommenderCommision + $user->Commision)*(0.9)}} 원 = {{$user->RecommenderCommision + $user->Commision}} - {{($user->RecommenderCommision + $user->Commision)*(0.1)}}(부과세)</span>
                  </div>
                  <div class="wdalbox">
                    <span class="bluetitle wd">출금 금액</span>
                    {{Form::number('requestmoney','',['class' => 'wd SI_input form-control','placeholder' => '출금 요청 금액','min'=>1,'max'=> ($user->RecommenderCommision + $user->Commision)*0.9])}}
                  </div>

                  <div class="withdrawalinfo">
                    <span class="bluetitle wd">입금정보</span>
                    <span class="greytitle wd"> {{ $user->account_number}} ({{ $user->name}},{{ $user->bankName}}) </span>
                    <div class="Newinfocontainer">
                      <button class="Newwithinfo">새로운 입금정보 입력</button>
                    </div>
                  </div><br>

                  <div class="wdalbox">
                    <span class="bluetitle wd"> 입금예정일 </span>
                    <span class="greytitle wd"> 2017-1-11 </spa>
                  </div>

                  <div class="Caution">
                    <span class="greytitle wd"> Admin에서 부여하는 주의사항 정보들 </spa>
                  </div>

                  <div class="buttoncontainer">
                    <button class="Requestwidthdrawal">출금 신청</button>
                  {!! Form::close() !!}
                  </div>

              </div>
            </div>
        </div>
      </div>
  @endsection
@else
  <p>접근 권한이 없습니다</p>
@endif
