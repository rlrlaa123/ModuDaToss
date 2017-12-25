@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  영업 정보
                </div>

                <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table" style="text-align:center">
                        <tbody>
                        <tr>
                          <td>고객명</td>
                          <td>{{ $SalesInfo->CustomerName }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>사업장명</td>
                          <td>{{ $SalesInfo->BusinessName }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>고객 주소</td>
                          <td>{{ $SalesInfo->CustomerAddress }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>접촉 시간</td>
                          <td>{{ str_replace("T"," ",$SalesInfo -> ContactTime) }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>특이 사항</td>
                          <td>{{ $SalesInfo->Characteristic }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>상품</td>
                          <td>{{ $SalesInfo->Category }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>등록 날짜</td>
                          <td>{{ $SalesInfo->created_at }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>상태</td>
                          <td>{{ $SalesInfo->state }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>비고</td>
                          <td>{{ $SalesInfo->note }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>고객 이메일</td>
                          <td>{{ $SalesInfo->CustomerEmail }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>금액</td>
                          <td>{{ $SalesInfo->pay }}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                          <td>제보 영업사원</td>
                          <td>{{ $SalesInfo->SP_name }}</td>
                        </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
                <div class="panel-footer">
                  @if($SalesInfo->state == '승인대기')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Grant">최종승인</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Reject">최종거절</button>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
  <div class="modal fade" id="Grant" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">최종승인</h4>
        </div>
        <form method="post" action="/Grant">
          {{ csrf_field() }}
        <div class="modal-body">
            <input type="hidden" name="SI_id" value="{{ $SalesInfo->id }}">
            <input type="hidden" name="category" value="{{ $SalesInfo->Category }}">
            <input type="number" value="" name="GrantedMoney" placeholder="최종승인금액" min=0>
            <label for="GrantedMoney">원</label><br>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="최종승인">
          <form>
          <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="Reject" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">최종거절</h4>
        </div>
        <div class="modal-body">
          <form method="get" action="/Reject">
            <input type="submit" value="승인거부">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection
