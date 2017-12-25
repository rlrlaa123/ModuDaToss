@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  출금신청기록 ( {{ $Current }} )
                </div>
                <div class="panel-body">
                  <ul class="pager">
                    <li class="previous"><a href="/withdrawal/{{ $place -1 }}"><< 전월</a></li>
                    <li class="next"><a href="/withdrawal/{{ $place +1 }}">후월 >></a></li>
                  </ul>
                  <div class="table-responsive">
                    <table class="table" id="maintable">
                      <thead>
                        <tr class="head">
                          <th>회원이름</th>
                          <th>은행명</th>
                          <th>계좌번호</th>
                          <th>출금신청액(원)</th>
                          <th>신청날짜</th>
                        </tr>
                      </thead>
                      @forelse($WDI as $wdi)
                      <tbody>
                        <tr>
                          <td>{{ $wdi->memberName }}</td>
                          <td>{{ $wdi->bankName }}</td>
                          <td>{{ $wdi->account_number }}</td>
                          <td>{{ number_format($wdi->requestmoney) }}원</td>
                          <td>{{ $wdi->created_at }}</td>
                        </tr>
                      </tbody>
                      @empty
                      <tbody>
                        <tr>
                          <td><p>출금 신청 기록이 없습니다</p></td>
                        </tr>
                      </tbody>
                      @endforelse
                    </table>
                  </div>
                </div>

                <div class="panel-footer">
                    <a href="/ExcelDownload/{{ $place }}/xlsx"><button class="btn btn-primary">엑셀다운로드(.xlsx)</button></a>
                    <a href="/ExcelDownload/{{ $place }}/xls"><button class="btn btn-primary">엑셀다운로드(.xls)</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
