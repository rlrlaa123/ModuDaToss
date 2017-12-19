@extends('layouts.app')

@section('content')

@if( isset(Auth::user()->name) )
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 DetailContainer">
        <div class="SI_showtitle">자세한 영업 정보</div>
          <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">

              <table class="table" style="text-align:center">
                <tbody>
                  <tr>
                    <th>고객명</th>
                    <td>{{ $SalesInfo -> CustomerName}}</td>
                  </tr>
                  <tr>
                    <th>사업장명</th>
                    <td>{{ $SalesInfo  -> BusinessName}}</td>
                  </tr>
                  <tr>
                    <th>고객 주소</th>
                    <td>{{ $SalesInfo  -> CustomerAddress}}</td>
                  </tr>
                  <tr>
                    <th>우편번호</th>
                    <td>{{ $SalesInfo  -> post_number}}</td>
                  </tr>
                  <tr>
                    <th>고객 주소 Extra(1)</th>
                    <td>{{ $SalesInfo -> CustomerAddress_detail}}</td>
                  </tr>
                  <tr>
                    <th>고객 주소 Extra(2)</th>
                    <td>{{ $SalesInfo  -> CustomerAddress_extra}}</td>
                  </tr>
                  <tr>
                    <th>고객 전화 번호</th>
                    <td>{{ $SalesInfo  -> PhoneNumber}}</td>
                  </tr>
                  <tr>
                    <th>고객 이메일</th>
                    <td>{{ $SalesInfo -> CustomerEmail}}</td>
                  </tr>
                  <tr>
                    <th>예상 접촉 시간</th>
                    <td>{{ $SalesInfo  -> ContactTime}}</td>
                  </tr>
                  <tr>
                    <th>특이사항</th>
                    <td>{{ $SalesInfo  -> Characteristic}}</td>
                  </tr>
                  <tr>
                    <th>카테고리</th>
                    <td>{{ $SalesInfo  -> Category}}</td>
                  </tr>
                  <tr>
                    <th>예상 체결 금액</th>
                    <td>{{ $SalesInfo -> pay }}</td>
                  </tr>
                  <tr>
                    <th>접수 시간</th>
                    <td>{{ $SalesInfo -> created_at}}</td>
                  </tr>
                  <tr>
                    <th>현재 거래 상태</th>
                    <td>{{ $SalesInfo -> state}}</td>
                  </tr>
                  <tr>
                    <th>비고</th>
                    <td>{{ $SalesInfo -> note}}</td>
                  </tr>

                  <tr>
                    <th>접수한 영업 사원</th>
                    <td>{{ $SalesInfo -> SP_name}}</td>
                  </tr>
                  <tr>
                    <th>실패사유</th>
                    <td>{{ $SalesInfo -> Fail_reason}}</td>
                  </tr>
                </tbody>

              </table>
              <div class="col-md-4 col-sm-4">
              <div class="SI_showtitle">사업장 사진</div>
              <br><br><br>
                <img src="/storage/images/{{$SalesInfo -> images}}" style="width:100%">
              </div>

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
