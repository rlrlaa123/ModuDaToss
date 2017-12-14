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
                  <div class="table-responsive">
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
                  </div>
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
