@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  영업 정보
                  <nav class="navbar navbar-default">
                    <div class="container-fluid">
                      <ul class="nav navbar-nav">
                        <li><a href="/show2">전체</a></li>
                        <li><a href="/show2/접수 완료">접수</a></li>
                        <li><a href="/show2/진행중">진행중</a></li>
                        <li><a href="/show2/완료">완료</a></li>
                        <li><a href="/show2/실패">실패</a></li>
                      </ul>
                    </div>
                  </nav>
                </div>

                <div class="panel-body">
                  <table class="table" id="maintable">
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
                    @foreach($SalesInfo as $SI)
                        <tbody>
                          <tr>
                            <td>{{ $SI->CustomerName }}</td>
                            <td>{{ $SI->BusinessName }}</td>
                            <td>{{ $SI->CustomerAddress }}</td>
                            <td>{{ $SI->PhoneNumber }}</td>
                            <td>{{ $SI->ContactTime }}</td>
                            <td>{{ $SI->state }}</td>
                            <td>{{ $SI->Category }}</td>
                            <td><a href="/show2/detail/{{ $SI -> id }}">이동</a></td>
                          </tr>
                        </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
