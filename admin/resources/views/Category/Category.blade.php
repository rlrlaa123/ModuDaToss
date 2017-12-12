@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  업종 수수료 관리
                </div>

                <div class="panel-body">
                @if(count($Category) > 0)
                  <table class="table">
                    @foreach($Category as $category)
                        <tbody>
                          <tr>
                            <td>{{ $category->category }}</td>
                            <td>{{ $category->commision }}</td>
                            <td><a href="/category/{{ $category->id }}">자세히 보기</a></td>
                          </tr>
                        </tbody>
                    @endforeach
                  </table>
                @else
                  <p> 현재 정보가 없습니다. </p>
                @endif
                <button><a href="/category/create">업종 추가</a></button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
