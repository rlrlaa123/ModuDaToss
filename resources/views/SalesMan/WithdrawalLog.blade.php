@extends('layouts.app')
@if(Auth::user()->id == $user->id)
@section('content')
  <div class="RecommendTitle">
    <p class="Bluename">{{Auth::user()->name}}</p>
    <p>회원님의 출금신청기록</p>
  </div><br>
  <br><br><br>
  <div class="recommendercontainer">
    <table class="table showithmoney" style="text-align:center">
        <thead>
          <tr>
              <th style="color:#b7babf">신청금액</th>
              <th>은행명</th>
              <th>계좌번호</th>
              <th>신청시간</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $dt)
          <tr>
              <td> {{ $dt->requestmoney }}원 </td>
              <td style="color:#3473d9;">{{ $dt->bankName }} </td>
              <td>{{ $dt->account_number }}</td>
              <td>{{ $dt->created_at->format('m-d H:i') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
  </div>



@endsection
@else
    <p>접근 권한이 없습니다</p>
@endif
