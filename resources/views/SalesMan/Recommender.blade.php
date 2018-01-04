@extends('layouts.app')
@if(Auth::user()->id == $user->id)
@section('content')
  <div class="RecommendTitle">
    <p class="Bluename">{{Auth::user()->name}}</p>
    <p>회원님의 추천인 목록</p>
  </div><br>
  <div>
    <span class="bluetitle" style="float:left">추천인수</span>
    <span class="greytitle" style="float:left;margin-top:3px" id="number">총 {{ $recommendee}} 명</p>
  </div>
  <br><br><br>
  <div class="recommendercontainer">
    <table class="table showithmoney" style="text-align:center">
        <thead>
          <tr>
              <th style="color:#b7babf">추천인이름</th>
              <th>부여 포인트</th>
              <th></th>
              <th>발생시간</th>
          </tr>
        </thead>
        <tbody>
        @foreach($SH as $sh)
          <tr>
              <td> {{ $sh->triggerName }} </td>
              <td style="color:#3473d9;">+ {{ $sh->MoneySum }} </td>
              <td><img src="{{ URL::asset('/img/coin.png')}}" width="30" height="30"></td>
              <td>{{ $sh->created_at->format('m-d H:i') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>



@endsection
@else
    <p>접근 권한이 없습니다</p>
@endif
