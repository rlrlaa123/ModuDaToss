@extends('layouts.app')

@section('content')

@if( isset(Auth::user()->name) )
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <table class="table">
              <thead>
                <tr class="head">
                  <th>고객명</th>
                  <th>사업장명</th>
                  <th>주소</th>
                  <th>전화번호</th>
                  <th>접촉시간</th>
                  <th>상태</th>
                  <th>상품</th>
                  <th></th>
                </tr>
              </thead>
            @if(count($SalesInfo) > 0)
              @foreach($SalesInfo as $SI)
                  <tbody>
                    <tr>
                      <td>{{ $SI->CustomerName }}</td>
                      <td>{{ $SI->BusinessName }}</td>
                      <td>{{ $SI->CustomerAddress }}</td>
                      <td>{{ $SI->PhoneNumber }}</td>
                      <td>{{ $SI->ContactTime }}</td>
                      <td>{{ $SI->state }}</td>
                      <td>{{ $SI->Category }}</td>
                      <td style="display:none">{{ $SI->pay }}</td>
                      <td style="display:none">{{ $SI->created_at }}</td>
                      <td style="display:none">{{ $SI->note }}</td>
                      <td style="display:none">{{ $SI->CustomerEmail }}</td>
                      <td style="display:none">{{ $SI->SalesPerson_id }}</td>
                      <td><a href="/Partner/{{ Auth::user()->category}}/{{ $SI -> id }}">이동</a></td>
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
<div class="container">
    <div id="white-background">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default" id="alert-box">
                <table class="table" style="text-align:center">
                  <tr class="head">
                    <td>고객명</td>
                    <td id="1"></td>
                  </tr>
                  <tr class="head">
                    <td>사업장명</td>
                    <td id="2"></td>
                  </tr>
                  <tr class="head">
                    <td>고객 주소</td>
                    <td id="3"></td>
                  </tr>
                  <tr class="head">
                    <td>고객 번호</td>
                    <td id="4"></td>
                  </tr>
                  <tr class="head">
                    <td>접촉 시간</td>
                    <td id="5"></td>
                  </tr>
                  <tr class="head">
                    <td>상태</td>
                    <td id="6"></td>
                  </tr>
                  <tr class="head">
                    <td>상품</td>
                    <td id="7"></td>
                  </tr>
                  <tr class="head">
                    <td>금액</td>
                    <td id="8"></td>
                  </tr>
                  <tr class="head">
                    <td>거래 발생 시간</td>
                    <td id="9"></td>
                  </tr>
                  <tr class="head">
                    <td>비고</td>
                    <td id="10"></td>
                  </tr>
                  <tr class="head">
                    <td>이메일</td>
                    <td id="11"></td>
                  </tr>
                  <tr class="head">
                    <td>제보 영업 사원</td>
                    <td id="12"></td>
                  </tr>
                </table>

              <button id="return">돌아가기</button>
              @if( $SI->state == 1)
                {!! Form::open(['action' => ['PartnerController@update', $SI->id], 'method' => 'POST']) !!}
                  {{Form::hidden('_method','PUT')}}
                  {{Form::submit('Submit',['class' => 'btn btn-primary'])}}

                {!! Form::close() !!}

              @endif

              @if( $SI->state == 2)
                <button id="return">완료</button>
                <button id="return">실패</button>
              @endif
              </div>
          </div>
      </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $('tr').not('.head').click(function(){
    $('#white-background').show();
    for(var i=0;i<13;i++){
      var d = "#" + i;
      $(d).text($(this).children("td:nth-child("+i+")").text());
    }
  })

  $('#return').click(function(){
    $('#white-background').hide();
  })
})
</script>
@endsection
