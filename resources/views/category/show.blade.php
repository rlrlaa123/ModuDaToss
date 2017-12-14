@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row category">
            <div class="col-lg-1" style="text-align:center;">
                <h3 class="title category">{{$category->category}}</h3>
                <div class="dropdown">
                    <button class="btn-block category btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        {{$category->category}}
                        <span class="caret category"></span></button>
                    <ul class="dropdown-menu dropdown-menu-center">
                        @foreach($categories as $category_select)
                            <li><a href="/category/{{$category_select->id}}">{{$category_select->category}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-center category">
                    <h3>{{$category->category}}(이)란?</h3>
                    <p>{{$category->content}}</p>
                </div>
                <div class="btn category" onclick="window.location='{{ route('SalesInfo.create') }}'">
                    영업정보 등록
                </div>
            </div>
        </div>

    </div>
@stop

{{--<script>--}}
    {{--$(".dropdown-menu li a").click(function(){--}}
        {{--$(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');--}}
        {{--$(this).parents(".dropdown").find('.btn').val($(this).data('value'));--}}
    {{--});--}}
{{--</script>--}}
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.js" />--}}