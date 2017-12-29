@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" style="margin-top:0;">
                    <div class="panel-heading">
                      <span class="bluetitle">Step 2</span>
                      <span class="greytitle">고객정보 등록</span>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('SalesInfo.store') }}" method="POST" role="form">
                            {!! csrf_field() !!}
                            @php($field = "CustomerName")
                            @php($message = "고객명")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "BusinessName")
                            @php($message = "사업장명")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus/>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "post_number")
                            @php($message = "고객주소")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                    <div class="col-sm-2" style="text-align:right; margin-bottom:2%">
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
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "CustomerAddress_detail")
                            @php($message = "주소지 추가")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "CustomerAddress_extra")
                            @php($message = "주소지 그외")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "PhoneNumber")
                            @php($message = "전화번호")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "Characteristic")
                            @php($message = "특이사항")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "note")
                            @php($message = "비고")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "CustomerEmail")
                            @php($message = "고객 이메일")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "ContactTime")
                            @php($message = "접촉시간")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name={{$field}} class="form-control" placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            @php($field = "images")
                            @php($message = "사업장사진")
                            <div class="form-group {{$errors->has($field) ? 'has-error' : '' }}">
                                <div class="row">
                                    <div class="col-sm-2 input_label">
                                        <label class="salesinfo_label">{{$message}}</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="file" name={{$field}} placeholder={{$message}} value="{{ old($field)  }}" autofocus>
                                        {!! $errors->first($field, '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            {{Form::hidden('SalesPerson_id', Auth::user()->id,['class' => 'form-control'])}}
                            {{Form::hidden('SP_name', Auth::user()->name,['class' => 'form-control'])}}
                            @foreach($passeddata['category'] as $ct)
                                <input type="hidden" name="category[]" value="{{$ct}}">
                            @endforeach
                            @foreach($passeddata['money'] as $money)
                                <input type="hidden" name="money[]" value="{{$money}}">
                            @endforeach

                            <div class="form-group" style="text-align:center;">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    등록하기
                                </button>
                            </div>
                        </form>
                    </div>
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
