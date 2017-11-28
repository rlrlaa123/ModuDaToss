@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  입출금 관리
                </div>
                <div class="panel-body">
                  <ul class="pager">
                    <li class="previous"><a href="/withdrawal/{{ $place -1}}">전월</a></li>
                    <li class="next"><a href="/withdrawal/{{ $place +1}}">후월</a></li>
                  </ul>
                  <table class="table" id="maintable">
                    <thead>
                      <tr class="head">
                        <th>회원이름</th>
                        <th>은행명</th>
                        <th>계좌번호</th>
                        <th>출금액</th>
                        <th>신청날짜</th>
                      </tr>
                    </thead>
                    @foreach($WDI as $wdi)
                    <tbody>
                      <tr>
                        <td>{{ $wdi->memberName }}</td>
                        <td>{{ $wdi->bankName }}</td>
                        <td>{{ $wdi->account_number }}</td>
                        <td>{{ $wdi->requestmoney }}</td>
                        <td>{{ $wdi->created_at }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
                <div class="panel_footer">
                  <div class="form-group">
                    <button><a href="/excel/{{$place}}">엑셀</a></button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
