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
                      <tbody>
                        <tr>
                          <td>수익금 현황</td>
                          <td>{{ $user->Benefit + $user->RecommenderCommision }}</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <td>내 수당</td>
                          <td>{{ $user->Benefit }}</td>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <td>추천인 수당</td>
                          <td>{{ $user->RecommenderCommision }}</td>
                        </tr>
                      </tbody>
                </table>
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
