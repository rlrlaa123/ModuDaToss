@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <span class="bluetitle">Step 2</span>
                      <span class="greytitle">고객정보 등록</span>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['action' => 'SalesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="inputbox">
                            <label for="CustomerName" class="name">고객명</label>
                            <input type="text" name="CustomerName" class="SI_input form-control" placeholder="고객명">
                        </div>

                        <div class="inputbox">
                            <label for="BusinessName" class="name">사업장명</label>
                            <input type="text" name="BusinessName" class="SI_input form-control" placeholder="사업장명">
                        </div>
                        <p> 고객 주소 </p>
                        <div class="inputbox">
                            <label for="post_number" class="name">우편번호</label>
                            <input type="text" name="post_number" class="SI_input form-control postcodify_postcode5" placeholder="사업장명">
                        </div>
                        <div class="inputbox">
                            <label for="CustomerAddress" class="name">주소지</label>
                            <input type="text" name="CustomerAddress" class="SI_input form-control postcodify_address" placeholder="주소지">
                        </div>
                        <div class="inputbox">
                            <label for="CustomerAddress_detail" class="name">주소지 추가</label>
                            <input type="text" name="CustomerAddress_detail" class="SI_input form-control postcodify_details" placeholder="주소지 추가">
                        </div>
                        <div class="inputbox">
                            <label for="CustomerAddress_extra" class="name">주소지 그외</label>
                            <input type="text" name="CustomerAddress_extra" class="SI_input form-control postcodify_extra_info" placeholder="주소지 그외">
                        </div>
                        <div class="inputbox">
                            <input type="button"
                            id="postcodify_search_button"
                            value="주소지 검색"
                            class="btn btn-default"
                            >
                        </div>
                        <div class="inputbox">
                          <label for="PhoneNumber" class="name">전화 번호</label>
                          <input type="text" name="PhoneNumber" class="SI_input form-control" placeholder="전화 번호">
                        </div>
                        <div class="inputbox">
                          <label for="Characteristic" class="name">특이사항</label>
                          <input type="text" name="Characteristic" class="SI_input form-control" placeholder="특이 사항">
                        </div>
                        <div class="inputbox">
                            <label for="note" class="name">비고</label>
                            <input type="textarea" name="note" class="SI_input form-control" placeholder="비고">
                        </div>

                        <div class="inputbox">
                            <label for="CustomerEmail" class="name">고객이메일</label>
                            <input type="email" name="CustomerEmail" class="SI_input form-control" placeholder="고객이메일">
                        </div>
                        <div class="inputbox">
                          <label for="ContactTime" class="name">접촉시간</label>
                          <input type="date" name="ContactTime" class="SI_input form-control" placeholder="접촉시간">
                        </div>
                        <div class="inputbox">
                            <label for="images" class="name">사업장사진</label>
                            {{Form::file('images'),['class' => 'form-control']}}
                        </div>
                        <!--
                        <div class="inputbox" style="height:250px">
                            <label for="images" class="name">서명</label>
                            <canvas id="canvas" style="float:right"></canvas>
                        </div>
                        -->

                          {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
                          {{Form::hidden('SP_name', Auth::user()->name,['class' => 'form-control'])}}
                          @foreach($passeddata['category'] as $ct)
                            <input type="hidden" name="category[]" value="{{$ct}}">
                          @endforeach
                          @foreach($passeddata['money'] as $money)
                            <input type="hidden" name="money[]" value="{{$money}}">
                          @endforeach

                    </div>
                    <div class="panel-footer" style="background-color:white">
                      {{Form::submit('등록',['class' => 'btn btn-primary btn-lg','style' => 'margin:auto'])}}
                      {!! Form::close() !!}

                    </div>
                    <!--
                    <div id="save">
                      Save
                    </div>
                  -->
                </div>
            </div>
        </div>
    </div>
    <script>
     $(function() {
       $("#postcodify_search_button").postcodifyPopUp();
     });

     /*
     var canvas = document.getElementById('canvas');
     var context= canvas.getContext('2d');

     var radius = 1;
     var dragging = false;

     canvas.width = 500;
     canvas.height = 200;



     function clearCanvas(canvas){
       canvas.width = canvas.width;
     }

     context.lineWidth = radius*2;

     var putPoint = function(e){
       if(dragging){
         context.lineTo(e.offsetX,e.offsetY);
         context.stroke();
         context.beginPath();
         context.arc(e.offsetX, e.offsetY ,radius ,0 ,Math.PI+2);
         context.fill();
         context.beginPath();
         context.moveTo(e.offsetX,e.offsetY);
       }
     };

     var engage = function(e){
       dragging = true;
       putPoint(e);
     }

     var disengage = function(){
       dragging = false;
       context.beginPath();
     }
     canvas.addEventListener('mousedown',engage);
     canvas.addEventListener('mousemove',putPoint);
     canvas.addEventListener('mouseup',disengage);


     var saveButton = document.getElementById('save');

     saveButton.addEventListener('click',saveImage);

     function saveImage(canvas){
       var data = canvas.toDataURL();

       window.open(data, '_blank', 'location=0, menubar=0, ');

       //var request = new XMLHttpRequest();
       /*

       request.onreadystatechange = function(){
         if(requests.readyState == 4 && request.status == 200){
           //do our stuff
           var response = request.responseText;
           console.log(response);
         }
       }

       request.open('POST', 'save.php', true);
       request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
       request.send('img=' + data);


       //  window.open(data,'_blank','location=0, menubar=0');
     }
     */


    </script>

@endsection
