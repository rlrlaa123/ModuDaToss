@extends('layouts.app')

@section('content')
  <form method="get" action="/SalesInfo/create">
    <div class="container Choosecategory" id="app">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="border:none">
                    <div class="panel-heading" style="border:none">
                      <span class="bluetitle">Step 1</span>
                      <span class="greytitle">영업카테고리선택</span>
                      <button type="button" class="Sireset">reset</button>
                    </div>
                    <div class="panel-body">
                        @foreach($category as $ct)

                        <div class="checkboxcontainer">
                          <label class="checkbox">{{$ct->category}}
                            <input class="checkbox_category" name='category[]'  value="{{$ct->category}}" type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <div class="tipcontainer">
                            <button type="button" class="Salestip" data-toggle="modal" data-target="#myModal">i</button>
                          </div>
                          <div class="moneycontainer">

                          </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="panel-footer">
                      <div class="buttongroup">
                        <button class="btn btn-primary btn-lg">취소</button>
                        {{Form::submit('다음',['class' => 'btn btn-primary btn-lg'])}}
                        {!! Form::close() !!}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">무슨 영업라인의 팁</h4>
          </div>
          <div class="modal-body">
            <p>내용</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/template" data-template="money">
      <input class="SI_input money form-control" type="number" name="money[]" placeholder="예상체결금액">
    </script>
    <script>
    $(document).ready(function(){
      $('.checkbox_category').click(function(event){
          if(event.target.checked == true){
            $row = $(event.target).parent().next().next();
            $row.append($('script[data-template="money"]').text());
          }else{
            $row = $(event.target).parent().next().next().find('input');
            $row.remove();
          }
      })

    })
    </script>
@endsection
