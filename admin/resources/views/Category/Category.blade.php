@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  업종 , 수수료 관리
                </div>

                <div class="panel-body">
                  <table class="table">
                      <thead>
                        <tr>
                          <th>업종명</th>
                          <th>현재 수수료</th>
                          <th> 비고 </th>
                        </tr>
                    @forelse($Category as $category)
                        <tbody>
                          <tr>
                            <td>{{ $category->category }}</td>
                            <td>{{ $category->commision }}</td>
                            <td><a href="/category/{{ $category->id }}">내용변경 -></a></td>
                          </tr>
                        </tbody>
                    @empty
                     <tr>
                       <td> 현재 등록된 업종이 없습니다 </td>
                     </tr>
                    @endforelse
                  </table>
                </div>
                <div class="panel-footer">
                  <a href="/category/create"><button class='btn btn-primary'>업종추가</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
