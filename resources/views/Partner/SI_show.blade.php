@extends('layouts.app')

@section('content')

@if( isset(Auth::user()->name) )
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
              <br><br>
              <div class="divide">
                <a href="#" style="color:#b7babf;"><button class="SI_button" id="mine">나의 영업 현황</button></a>
                <button class="SI_button" id="all" style="color:#3473d9;">전체 영업 현황</button>
              </div>

              <br><br><br>

              <div class="container">
                <a href="/Partner/{{Auth::user()->category}}"><button type="button" class="btn btn-primary btn-sm">전체</button></a>
                <a href="/Partner/{{Auth::user()->category}}/접수 완료"><button type="button" class="btn btn-primary btn-sm">접수</button></a>
                <a href="/Partner/{{Auth::user()->category}}/진행중"><button type="button" class="btn btn-primary btn-sm">진행중</button></a>
                <a href="/Partner/{{Auth::user()->category}}/승인대기"><button type="button" class="btn btn-primary btn-sm">진행중</button></a>
                <a href="/Partner/{{Auth::user()->category}}/완료"><button type="button" class="btn btn-primary btn-sm">완료</button></a>
                <a href="/Partner/{{Auth::user()->category}}/실패"><button type="button" class="btn btn-primary btn-sm">실패</button></a>
              </div>
            </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table showmine" style="border:none">
                    <thead>
                    <tr>
                        <th> </th>
                        <th>날짜</th>
                        <th>카테고리</th>
                        <th>사업장</th>
                        <th>고객명</th>
                        <th>연락처</th>
                        <th>예상 연락가능시간</th>
                    </tr>
                    </thead>
                        @forelse($SalesInfo as $SI)
                            <tbody>
                            <tr>
                                <td>
                                  @if($SI->state == '진행중')
                                    <a href="/Partner/detail/{{$SI->Category}}/{{$SI->id}}"><button class="ongoing">{{$SI->state}}</button></a>
                                  @elseif($SI->state == '승인대기')
                                    <a href="/Partner/detail/{{$SI->Category}}/{{$SI->id}}"><button class="waiting">{{$SI->state}}</button></a>
                                  @elseif($SI->state == '완료')
                                    <a href="/Partner/detail/{{$SI->Category}}/{{$SI->id}}"><button class="success">{{$SI->state}}</button></a>
                                  @elseif($SI->state == '실패')
                                    <a href="/Partner/detail/{{$SI->Category}}/{{$SI->id}}"><button class="fail">{{$SI->state}}</button></a>
                                  @endif
                                </td>
                                <td>{{ $SI->created_at->format('m-d H:i') }}</td>
                                <td>{{ $SI->Category }}</td>
                                <td>{{ $SI->BusinessName }}</td>
                                <td>{{ $SI->CustomerName }}</td>
                                <td>{{ $SI->PhoneNumber }}</td>
                                <td>{{str_replace("T"," ",$SI -> ContactTime)}}</td>
                            </tr>
                            </tbody>
                        @empty
                            <tbody>
                              <tr>
                                <td colspan='7'>
                                  <p> 현재 영업 정보가 없습니다.</p>
                                </td>
                              </tr>
                            </tbody>
                        @endforelse
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
@else
    <p> 로그인하세요.</p>
@endif

@endsection
