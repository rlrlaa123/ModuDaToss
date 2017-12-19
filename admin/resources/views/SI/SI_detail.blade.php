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
                  @foreach($SalesInfo as $SI)
                      <table class="table" style="text-align:center">
                        <tbody>
                          <tr>
                            <td>고객명</td>
                            <td>{{ $SI->CustomerName }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>사업장명</td>
                            <td>{{ $SI->BusinessName }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>고객 주소</td>
                            <td>{{ $SI->CustomerAddress }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>접촉 시간</td>
                            <td>{{ $SI->ContactTime }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>특이 사항</td>
                            <td>{{ $SI->Characteristic }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>상품</td>
                            <td>{{ $SI->Category }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>등록 날짜</td>
                            <td>{{ $SI->created_at }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>상태</td>
                            <td>{{ $SI->state }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>비고</td>
                            <td>{{ $SI->note }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>고객 이메일</td>
                            <td>{{ $SI->CustomerEmail }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>금액</td>
                            <td>{{ $SI->pay }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>제보 영업사원</td>
                            <td>{{ $SI->SP_name }}</td>
                          </tr>
                        </tbody>
                      </table>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
