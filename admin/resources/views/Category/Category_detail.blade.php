@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  업종별 자세한 사항
                </div>

                <div class="panel-body">
                @if(count($Category) > 0)
                  <table class="table" style="text-align:center">
                        <tbody>
                          <tr>
                            <td>상품명</td>
                            <td>{{ $Category->category }}</td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>수수료</td>
                            <td>
                              {!! Form::open(['action' => ['CategoryController@update',$Category->id], 'method' => 'POST']) !!}
                                {{Form::text('commission',$Category->commission,['placeholder' => '수수료'])}}
                                {{Form::hidden('_method','PUT')}}

                            </td>
                          </tr>
                        </tbody>
                  </table>

                @else
                  <p> 현재 정보가 없습니다. </p>
                @endif

                </div>
                <div class="panel-footer">
                  {{Form::submit('수수료 변경',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}

                {!! Form::open(['action' => ['CategoryController@destroy',$Category->id], 'method' => 'POST']) !!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('업종 삭제',['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
