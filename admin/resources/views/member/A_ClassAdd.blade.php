@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        A클래스 추가
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>이름</th>
                                <th>이메일</th>
                                <th>성별</th>
                                <th>휴대폰 번호</th>
                                <th>회원 타입</th>
                                <th>비고</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->gender == 0 )
                                        <td>{{ '남자' }}</td>
                                    @else
                                        <td>{{ '여자' }}</td>
                                    @endif
                                    <td>{{ $user->phoneNumber }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        @if( $user->type != 4 )
                                            <a href="/member/a_class/create/{{ $user->id }}">
                                                A 클래스 회원 추가
                                            </a>
                                        @else
                                            A 클래스 회원
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
