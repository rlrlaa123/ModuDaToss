@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">영업 정보 등록</div>
                    <div class="panel-body">
                        {!! Form::open(['action' => 'SalesController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('CustomerName', '고객명')}}
                            {{Form::text('CustomerName','',['class' => 'form-control','placeholder' => '고객명'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('BusinessName','사업장명')}}
                            {{Form::text('BusinessName','',['class' => 'form-control','placeholder' => '사업장명'])}}
                        </div>
                        <div class="jumbotron">
                          <p> 고객 주소 </p>
                          <div class="form-group">
                              {{Form::label('post_number','우편번호')}}
                              {{Form::text('post_number','',['class' => 'form-control postcodify_postcode5','size' => '50'])}}
                              {{Form::label('CustomerAddress','주소지')}}
                              {{Form::text('CustomerAddress','',['class' => 'form-control postcodify_address','size' => '50'])}}
                              {{Form::label('CustomerAddress_detail','주소지 추가')}}
                              {{Form::text('CustomerAddress_detail','',['class' => 'form-control postcodify_details','size' => '50'])}}
                              {{Form::label('CustomerAddress_extra','주소지 그외')}}
                              {{Form::text('CustomerAddress_extra','',['class' => 'form-control postcodify_extra_info','size' => '50'])}}
                              <br />
                              <input type="button"
                              id="postcodify_search_button"
                              value="검색"
                              class="btn btn-default"
                              ><br />
                          </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('PhoneNumber','고객전화번호')}}
                            {{Form::text('PhoneNumber','',['class' => 'form-control','placeholder' => '전화 번호'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('Characteristic','특이사항')}}
                            {{Form::text('Characteristic','',['class' => 'form-control','placeholder' => '특이 사항'])}}
                        </div>
                        <div class="form-group">
                            <p>상품</p>
                            @php $id = 0; @endphp
                            @if(count($category) > 0)
                                @foreach($category as $ct)
                                    @php  $id++; @endphp
                                    {{Form::label('Category'.$id,$ct->category)}}
                                    {{Form::checkbox('Category'.$id,$ct->category,false)}}
                                @endforeach
                                {{Form::hidden('Numberofitem', count($category),['class' => 'form-control'])}}
                            @endif
                        </div>
                        <div class="form-group">
                            {{Form::label('note','비고')}}
                            {{Form::text('note','',['class' => 'form-control','placeholder' => '비고'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('CustomerEmail','고객이메일')}}
                            {{Form::email('CustomerEmail','',['class' => 'form-control','placeholder' => '고객 이메일'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('pay','예상 체결 금액')}}
                            {{Form::number('pay','',['class' => 'form-control','placeholder' => '금액'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('ContactTime','접촉 예정 시간')}}
                            {{Form::date('ContactTime','',['class' => 'form-control','placeholder' => '접촉시간'])}}
                        </div>
                        <div class="form-group">
                            {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
                            {{Form::hidden('SP_name', Auth::user()->name,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="panel-footer">
                      {{Form::submit('등록',['class' => 'btn btn-primary btn-lg'])}}
                      {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <script>
         $(function() {
           $("#postcodify_search_button").postcodifyPopUp();
         });
        </script>
    </div>
@endsection
