@extends('layouts.app')
@if(Auth::user()->id == $user->id)
  @section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-header">

              </div>
              <div class="panel-body">
                <table class="table" style="text-align:center">
                  <h4>수익금 현황</h4>
                      <tbody>
                        <tr>
                          <td>수익금 현황</td>
                          <td>{{ $user->benefit + $user->commission + $user->recommender_commission }}</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <td>내 수당</td>
                          <td>{{ $user->benefit }}</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <td>내 수수료</td>
                          <td>{{ $user->commission }}</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <td>추천인 수당</td>
                          <td>{{ $user->recommender_commission }}</td>
                        </tr>
                      </tbody>
                </table>

                <table class="table" style="text-align:center">
                  <thead>
                    <tr>
                      <th>적립금 유형</th>
                      <th>금액</th>
                      <th>발생날짜</th>
                    </tr>
                  </thead>
                  <h4>적립 내역</h4>
                  @if(count($SH) > 0)
                    @foreach($SH as $sh)
                      <tbody>
                        <tr>
                          <td>{{ $sh->MoneyType }}</td>
                          <td>{{ $sh->MoneySum }}</td>
                          <td>{{ $sh->created_at }}</td>
                        </tr>
                      </tbody>
                    @endforeach
                  @endif
                </table>
                <p><a href="#">자세히 보기 ... </a></p>
              </div>
              <div class="panel-footer">
                <button><a href="/withdrawal/{{Auth::user()->id}}">출금하러 가기</a></button>
              </div>
            </div>
        </div>
      </div>
  </div>
  @endsection
@else
  <p>접근 권한이 없습니다</p>
@endif
