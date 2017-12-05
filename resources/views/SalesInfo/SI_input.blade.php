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
                        <div class="form-group">
                            {{Form::text('post_number','',['class' => 'postcodify_postcode5','size' => '50'])}}
                            {{Form::text('CustomerAddress','',['class' => 'postcodify_address','size' => '50'])}}
                            {{Form::text('CustomerAddress_detail','',['class' => 'postcodify_details','size' => '50'])}}
                            {{Form::text('CustomerAddress_extra','',['class' => 'postcodify_extra_info','size' => '50'])}}
                            <div id="postcodify_search_button">검색</div><br />
                        </div>
                        <div class="form-group">
                            {{Form::label('PhoneNumber','PhoneNumber')}}
                            {{Form::text('PhoneNumber','',['class' => 'form-control','placeholder' => '전화 번호'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('Characteristic','Characteristic')}}
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
                            {{Form::label('note','note')}}
                            {{Form::text('note','',['class' => 'form-control','placeholder' => '비고'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('CustomerEmail','CustomerEmail')}}
                            {{Form::email('CustomerEmail','',['class' => 'form-control','placeholder' => '고객 이메일'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('pay','pay')}}
                            {{Form::number('pay','',['class' => 'form-control','placeholder' => '금액'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('ContactTime','ContactTime')}}
                            {{Form::date('ContactTime','',['class' => 'form-control','placeholder' => '접촉시간'])}}
                        </div>
                        <div class="form-group">
                            {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
                            {{Form::hidden('SP_name', Auth::user()->name,['class' => 'form-control'])}}
                        </div>
                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <script> $(function() { $("#postcodify_search_button").postcodifyPopUp(); }); </script>
    </div>
@endsection
