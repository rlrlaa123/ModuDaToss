@extends('layouts.app')

@section('content')

@if( isset(Auth::user()->name) )
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <table class="table">
              <thead>
                <tr>
                  <th>사업장</th>
                  <th>전화번호</th>
                  <th>주소</th>
                  <th>상품</th>
                  <th>상태</th>
                </tr>
              </thead>
            @if(count($SalesInfo) > 0)
              @foreach($SalesInfo as $SI)
                  <tbody>
                    <tr>
                      <td>{{ $SI->BusinessName }}</td>
                      <td>{{ $SI->PhoneNumber }}</td>
                      <td>{{ $SI->CustomerAddress }}</td>
                      <td>{{ $SI->Category }}</td>
                      <td>{{ $SI->state }}</td>
                    </tr>
                  </tbody>
              @endforeach
              </table>
            @else
              <p> 현재 영업 정보가 없습니다.</p>
            @endif
          </div>

      </div>
    </div>
</div>
@else
    <p> 로그인하세요.</p>
@endif
@endsection
