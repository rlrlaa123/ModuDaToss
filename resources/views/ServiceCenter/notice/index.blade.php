@extends('layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table" style="vertical-align: middle">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>등록날짜</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notices as $notice)
                <tr>
                    <td>{{$notice->id}}</td>
                    <td>
                        <a href="servicecenter/notice/{id}">
                            {{$notice->title}}
                        </a>
                    </td>
                    <td>{{$notice->user->name}}</td>
                    <td>{{$notice->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection