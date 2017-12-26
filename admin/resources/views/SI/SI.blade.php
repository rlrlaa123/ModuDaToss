@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
              <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/SIshow">영업정보관리</a>
                  </div>
                  <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li><a href="/SIshow">전체</a></li>
                      <li><a href="/SIshow/접수 완료">접수 완료</a></li>
                      <li><a href="/SIshow/진행중">진행중</a></li>
                      <li><a href="/SIshow/승인대기">승인대기</a></li>
                      <li><a href="/SIshow/완료">완료</a></li>
                      <li><a href="/SIshow/실패">실패</a></li>
                    </ul>
                  </div>
                </div>
              </nav>


                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" style="vertical-align: middle">
                            <thead>
                            <tr class="head">
                                <th>고객명</th>
                                <th>사업장명</th>
                                <th>고객 주소</th>
                                <th>휴대폰번호</th>
                                <th>접촉 시간</th>
                                <th>상태</th>
                                <th>상품</th>
                                <th>비고</th>
                            </tr>
                            </thead>
                            @forelse($SalesInfo as $SI)
                              <tbody>
                                <tr>
                                    <td>{{ $SI->CustomerName }}</td>
                                    <td>{{ $SI->BusinessName }}</td>
                                    <td>{{ $SI->CustomerAddress }}</td>
                                    <td>{{ $SI->PhoneNumber }}</td>
                                    <td>{{ str_replace("T"," ",$SI -> ContactTime) }}</td>
                                    <td>{{ $SI->state }}</td>
                                    <td>{{ $SI->Category }}</td>
                                    <td><a href="/SIshow/detail/{{ $SI -> id }}">이동</a></td>
                                </tr>
                              </tbody>
                            @empty
                              <tbody>
                                <tr>
                                  <td colspan=8><p> 현재 영업 정보가 없습니다.</p></td>
                                </tr>
                              </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div class='panel-footer'>
                    {{ $SalesInfo->links() }}
                </div>
    </div>
</div>
@endsection
