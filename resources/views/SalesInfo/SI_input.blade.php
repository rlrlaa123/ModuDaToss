@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="panel panel-default" style="margin-top:0;">
            <div class="panel-heading">
              <span class="bluetitle">Step 2</span>
              <span class="greytitle">고객정보 등록</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{ route('SalesInfo.store') }}" method="POST" role="form" enctype="multipart/form-data" style="font-size:13px;">
                        {!! csrf_field() !!}
                        @php($field = "CustomerName")
                        @php($message = "고객명")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "BusinessName")
                        @php($message = "사업장명")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus/>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "post_number")
                        @php($message = "고객주소")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-7 col-sm-9">
                                    <input type="text" name="{{$field}}" class="form-control postcodify_postcode5" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                                <div class="col-xs-2 col-sm-1" style="text-align:right; padding:0;">
                                    <input type="button"
                                           id="postcodify_search_button"
                                           value="주소지 검색"
                                           class="btn btn-default">
                                </div>
                            </div>
                        </div>

                        @php($field = "CustomerAddress")
                        @php($message = "주소지")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control postcodify_address" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "CustomerAddress_detail")
                        @php($message = "주소지 추가")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control postcodify_details" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "CustomerAddress_extra")
                        @php($message = "주소지 그외")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control postcodify_extra_info" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "PhoneNumber")
                        @php($message = "전화번호")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "Characteristic")
                        @php($message = "특이사항")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "note")
                        @php($message = "비고")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "CustomerEmail")
                        @php($message = "고객 이메일")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="text" name="{{$field}}" class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "ContactTime")
                        @php($message = "접촉시간")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="datetime-local" name="{{$field}}" class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        @php($field = "images")
                        @php($message = "사업장사진")
                        <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                            <div class="row wrapper-input">
                                <div class="col-xs-2 col-sm-2 input_label">
                                    <label class="salesinfo_label">{{$message}}</label>
                                </div>
                                <div class="col-xs-9 col-sm-10">
                                    <input type="file" name="{{$field}}" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                    {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <div id="sketchpadapp">
                          <div class="leftside">
                               <button id="clearbutton" onclick="clearCanvas(canvas,ctx);">clear</button>
                          </div>
                          <div class="rightside">
                              <canvas id="sketchpad" height="300" width="400">
                              </canvas>
                          </div>
                        </div>

                        {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
                        {{Form::hidden('SP_name', Auth::user()->name,['class' => 'form-control'])}}
                        {{Form::hidden('Signature','abc',['id'=>'Signature'])}}
                        @foreach($passeddata['category'] as $ct)
                            <input type="hidden" name="category[]" value="{{$ct}}">
                        @endforeach
                        @foreach($passeddata['money'] as $money)
                            <input type="hidden" name="money[]" value="{{$money}}">
                        @endforeach

                        <div class="form-group" style="text-align:center;">
                            <button id="button" class="btn btn-primary btn-lg" type="submit">
                                등록하기
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <script>
    $(function() {
      $("#postcodify_search_button").postcodifyPopUp();
    });

    var canvas,ctx;
    var mouseX,mouseY,mouseDown=0;
    var touchX,touchY;
    function drawDot(ctx,x,y,size) {
      r=0; g=0; b=0; a=255;

      ctx.fillStyle = "rgba("+r+","+g+","+b+","+(a/255)+")";
      ctx.lineWidth = size*2;
      ctx.lineTo(x,y);
      ctx.stroke();
      ctx.beginPath();
      ctx.arc(x, y, size, 0, Math.PI*2, true);
      ctx.closePath();
      ctx.fill();
      ctx.beginPath();
      ctx.moveTo(x,y);
    }

    function clearCanvas(canvas,ctx) {
      event.preventDefault();
      ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    function sketchpad_mouseDown() {
      mouseDown=1;
      ctx.beginPath();
      event.preventDefault();
      drawDot(ctx,mouseX,mouseY,1);
    }

    function sketchpad_mouseUp() {
      mouseDown=0;
      data = canvas.toDataURL();
      $('#Signature').val(data);
    }

    function sketchpad_mouseMove(e) {
      getMousePos(e);
      if (mouseDown==1) {
          drawDot(ctx,mouseX,mouseY,1);
      }
    }

    function getMousePos(e) {
      if (!e)
          var e = event;

      if (e.offsetX) {
          mouseX = e.offsetX;
          mouseY = e.offsetY;
      }
      else if (e.layerX) {
          mouseX = e.layerX;
          mouseY = e.layerY;
      }
    }

    function sketchpad_touchStart() {
      getTouchPos();
      drawDot(ctx,touchX,touchY,1);
      event.preventDefault();
    }

    function sketchpad_touchMove(e) {
      getTouchPos(e);
      drawDot(ctx,touchX,touchY,1);
      event.preventDefault();
    }

    function sketchpad_touchend(e){
      ctx.beginPath();
      data = canvas.toDataURL();
      $('#Signature').val(data);
      event.preventDefault();
    }

    function getTouchPos(e) {
      if (!e)
          var e = event;

      if(e.touches) {
          if (e.touches.length == 1) { // Only deal with one finger
              var touch = e.touches[0]; // Get the information for finger #1
              touchX=touch.pageX-touch.target.offsetLeft;
              touchY=touch.pageY-touch.target.offsetTop;
          }
      }
    }

    canvas = document.getElementById('sketchpad');

    if (canvas.getContext)
      ctx = canvas.getContext('2d');

    if (ctx) {
      // React to mouse events on the canvas, and mouseup on the entire document
      canvas.addEventListener('mousedown', sketchpad_mouseDown, false);
      canvas.addEventListener('mousemove', sketchpad_mouseMove, false);
      canvas.addEventListener('mouseup', sketchpad_mouseUp, false);

      // React to touch events on the canvas
      canvas.addEventListener('touchstart', sketchpad_touchStart, false);
      canvas.addEventListener('touchmove', sketchpad_touchMove, false);
      canvas.addEventListener('touchend', sketchpad_touchend, false);
    }
    </script>
@endsection
