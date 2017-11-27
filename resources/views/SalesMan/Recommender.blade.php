@extends('layouts.app')
@if(Auth::user()->id == $user->id)
  @section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-header">
                <h1>추천인 조회</h1>
              </div>
              <div class="panel-body">
                <h2>나의 추천인 </h2>
                <h2>나를 추천한 사람 </h2>
              </div>
              <div class="panel-footer">

              </div>
            </div>
        </div>
      </div>
  </div>
  @endsection
@else
  <p>접근 권한이 없습니다</p>
@endif
