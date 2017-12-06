@extends('layouts.app')

@section('content')

@if( isset(Auth::user()->name) )
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-head">
              <nav class="navbar navbar-default">
                <div class="container-fluid">
                  <ul class="nav navbar-nav">
                    <li><a href="/SalesInfo/{{Auth::user()->id}}/전체">전체</a></li>
                    <li><a href="/SalesInfo/{{Auth::user()->id}}/접수 완료">접수</a></li>
                    <li><a href="/SalesInfo/{{Auth::user()->id}}/진행중">진행중</a></li>
                    <li><a href="/SalesInfo/{{Auth::user()->id}}/완료">완료</a></li>
                    <li><a href="/SalesInfo/{{Auth::user()->id}}/실패">실패</a></li>
                  </ul>
                </div>
              </nav>
            </div>
            <div class="panel-body">
              <table class="table">
                  <thead>
                    <tr>
                      <th>사업장</th>
                      <th>전화번호</th>
                      <th>주소</th>
                      <th>상품</th>
                      <th>상태</th>
                      <th>비고</th>
                    </tr>
                  </thead>
                @if(count($SalesInfo) > 0)
                  @foreach($SalesInfo as $SI)
                      <tbody>
                        <tr>
                          <td>{{ $SI->BusinessName }}</td>
                          <td>{{ $SI->PhoneNumber }}</td>
                          <td>{{ $SI->CustomerAddress }}</td>
                          <td>{{ $SI->Category }}</td>
                          <td>{{ $SI->state }}</td>
                          <td><a href="/detail/{{$SI->id}}">자세히 보기</a></td>
                        </tr>
                      </tbody>
                  @endforeach
                </table>
                @else
                <p> 현재 영업 정보가 없습니다.</p>
              @endif
            </div>
            <div class="panel-footer">
            </div>

      </div>
    </div>
</div>
@else
    <p> 로그인하세요.</p>
@endif
@endsection
