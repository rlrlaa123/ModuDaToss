@extends('layouts.app')

@section('content')

@if( isset(Auth::user()->name) )
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-head">
              <h4>자세한 영업 정보</h4>
            </div>
            <div class="panel-body">
              @if(count($SalesInfo) > 0)
               @foreach($SalesInfo as $SI)
              <table class="table" style="text-align:center">
                <tbody>
                  <tr>
                    <td>고객명</td>
                    <td>{{ $SI -> CustomerName}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>사업장명</td>
                    <td>{{ $SI -> BusinessName}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>고객 주소</td>
                    <td>{{ $SI -> CustomerAddress}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>우편번호</td>
                    <td>{{ $SI -> post_number}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>고객 주소 상세히</td>
                    <td>{{ $SI -> CustomerAddress_detail}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>고객 주소 추가</td>
                    <td>{{ $SI -> CustomerAddress_extra}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>전화 번호</td>
                    <td>{{ $SI -> PhoneNumber}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>예상 접촉 시간</td>
                    <td>{{ $SI -> ContactTime}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>특이사항</td>
                    <td>{{ $SI -> Characteristic}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>서명</td>
                    <td>{{ $SI -> signature}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>품목</td>
                    <td>{{ $SI -> Category}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>접수 시간</td>
                    <td>{{ $SI -> created_at}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>현재 거래 상태</td>
                    <td>{{ $SI -> state}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>비고</td>
                    <td>{{ $SI -> note}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>고객 이메일</td>
                    <td>{{ $SI -> CustomerEmail}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>접수한 영업 사원</td>
                    <td>{{ $SI -> SP_name}}</td>
                  </tr>
                </tbody>
                <tbody>
                  <tr>
                    <td>실패사유</td>
                    <td>{{ $SI -> Fail_reason}}</td>
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
