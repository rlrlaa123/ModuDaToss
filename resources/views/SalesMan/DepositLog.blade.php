@extends('layouts.app')
@if(Auth::user()->id == $user->id)
@section('content')
  <div class="RecommendTitle">
    <p class="Bluename">{{Auth::user()->name}}</p>
    <p>회원님의 금액누적 기록</p>
  </div><br>
  <br><br><br>
  <div class="recommendercontainer">
    <table class="table showithmoney" style="text-align:center">
        <thead>
          <tr>
              <th style="color:#b7babf">발생금액</th>
              <th>분류</th>
              <th>발생시간</th>
              <th>관련영업사원</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $dt)
          <tr>
              <td> {{ $dt->MoneySum }} 원 </td>
              <td style="color:#3473d9;">+ {{ $dt->MoneyType }} </td>
              <td>{{ $dt->created_at->format('m-d H:i') }}</td>
              <td>{{ $dt->triggerName }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>



@endsection
@else
    <p>접근 권한이 없습니다</p>
@endif
