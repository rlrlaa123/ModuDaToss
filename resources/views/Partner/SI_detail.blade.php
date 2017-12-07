@extends('layouts.app')

@section('content')

  @if( isset(Auth::user()->name) )
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading" style="text-align:center">
                <h4>상세 영업 정보</h4>
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
                  @if($SI->state == '접수 완료' || $SI->state == '진행중')
                  <tbody>
                    <tr>
                      <td>예상 체결 금액</td>
                      <td>{{ $SI->pay }}</td>
                    </tr>
                  </tbody>
                  @elseif($SI->state == '완료' || $SI->state == '실패' )
                  <tbody>
                    <tr>
                      <td>체결 금액</td>
                      <td>{{ $SI->pay }}</td>
                    </tr>
                  </tbody>
                  @endif
                  <tbody>
                    <tr>
                      <td>제보 영업사원</td>
                      <td>{{ $SI->SP_name }}</td>
                    </tr>
                  </tbody>
                  @if(($SI->state == '실패'))
                  <tbody>
                    <tr>
                      <td>실패 사유</td>
                      <td>{{ $SI->Fail_reason }}</td>
                    </tr>
                  </tbody>
                  @endif
                </table>
            @endforeach
          </div>
          <div class="panel-footer" style="background-color:white">
            @if($SI->state == '접수 완료')
            {!! Form::open(['action' => ['PartnerController@update', $SI->id], 'method' => 'POST']) !!}
              {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
              {{Form::hidden('_method','PUT')}}
              {{Form::submit('진행중',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
            @endif

            @if($SI->state == '진행중')
            {!! Form::open(['action' => ['PartnerController@update', $SI->id], 'method' => 'POST']) !!}
            <div class="form-group">
              <div class="col-sm-6">
                {{Form::number('pay',' ',['class' => 'form-control','placeholder' => '체결금액','min' => 0,'required'=>true])}}
              </div>
              {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
              {{Form::hidden('_method','PUT')}}
              {{Form::submit('완료',['class' => 'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}

            <hr>

            {!! Form::open(['action' => ['PartnerController@update', $SI->id], 'method' => 'POST']) !!}
            <div class="form-group">
              {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
              <div class="col-sm-6">
                {{ Form::select('reason', [
                    '사유1' => '사유1',
                    '사유2' => '사유2',
                    '사유3' => '사유3',
                    '사유4' => '사유4'
                  ], null, ['class'=>'form-control','placeholder' => '사유선택'])}}
              </div>
              {{Form::hidden('_method','PUT')}}
              {{Form::submit('실패',['class' => 'btn btn-primary'])}}
              </div>
            {!! Form::close() !!}

            @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
<script>
$(document).ready(function(){

})
</script>
@endsection
