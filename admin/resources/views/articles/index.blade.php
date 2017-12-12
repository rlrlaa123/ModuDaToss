@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">게시물 목록</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>작성자</th>
                                <th>제목</th>
                                <th>내용</th>
                                <th>생성일</th>
                                <th>수정일</th>
                                <th> 비고 </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->user->name }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}">
                                            {{ $article->title }}
                                        </a>
                                    </td>
                                    <td>{{ $article->content }}</td>
                                    <td>{{ $article->created_at }}</td>
                                    <td>{{ $article->updated_at }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
