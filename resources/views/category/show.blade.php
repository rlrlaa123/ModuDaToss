@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel-heading">
                    <div class="category">
                        <h3 class="category title" style="color:#3473d9; width:90%;">
                            {{$category->category}}
                        </h3>
                        <div class="dropdown" style="width:90%;">
                            <button class="category-button btn-default dropdown-toggle" type="button" data-toggle="dropdown">
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
                                <h3 style="margin:2%;">{{$category->category}}(이)란?</h3>
                                <p>{!!$category->content!!}</p>
                            </p>
                        </div>
                        @if(Auth::guest())
                        @else
                            @if(Auth::user()->type!=1)
                            @else
                                <div class="btn submit" onclick="window.location='{{ route('SalesInfo.choosecategory') }}'" style="display:block;">
                                    영업정보 등록
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    $("div.container-fluid").css("max-height",$( window ).height());
</script>