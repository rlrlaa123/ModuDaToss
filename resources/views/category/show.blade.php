@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel-heading">
                    <div class="category">
                        <h4 class="category title" style="color:#3473d9; width:90%; font-weight:lighter;">
                            {{$category->category}}
                        </h4>
                        <div class="dropdown" style="width:90%;">
                            <button class="category-button btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="height:35px;">
                                영업라인업
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-center">
                                @foreach($categories as $category_select)
                                    <li><a href="/category/{{$category_select->id}}">{{$category_select->category}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="category content" style="padding:3%; overflow-y:scroll;">
                            <p>
                                <h4 style="margin:2%; font-weight:lighter;">{{$category->category}}(이)란?</h4>
                                <p id="category_content">{!!$category->content!!}</p>
                            </p>
                        </div>
                        @if(Auth::guest())
                        @else
                            @if(Auth::user()->type!=1)
                            @else
                                <div class="btn submit" onclick="window.location='{{ route('SalesInfo.choosecategory') }}'">
                                    영업정보 등록
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var img_list = document.getElementsByTagName('img');
            for(i=0; i<img_list.length; i++) {
                var str= document.getElementsByTagName('img')[i].src;
                document.getElementsByTagName('img')[i].src=str.replace('http://127.0.0.1:8000','http://127.0.0.1:8001');
            }
        });
        $("div.container-fluid").css("max-height",$( window ).height());
    </script>
@stop