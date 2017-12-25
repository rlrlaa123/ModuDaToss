@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
						<nav class="navbar navbar-inverse">
						  <div class="container-fluid">
						    <div class="navbar-header">
						      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      <a class="navbar-brand" href="/member">영업사원 관리</a>
						    </div>
						    <div class="collapse navbar-collapse" id="myNavbar">
						      <ul class="nav navbar-nav">
						        <li><a href="/member/0">일반 회원 관리</a></li>
										<li><a href="/member/5">정회원 등업 관리</a></li>
						        <li><a href="/member/1">정회원 관리</a></li>
						        <li><a href="/member/2">벤더사 관리</a></li>
										<li><a href="/member/3">블랙 리스트 관리</a></li>
										<li><a href="/member/4">A클래스 회원 관리</a></li>
						      </ul>
						    </div>
						  </div>
						</nav>
						<!--
						<nav class="navbar navbar-default">
							<div class="container-fluid">
								<ul class="nav navbar-nav">
									<li><a href="/member/0">일반 회원 관리</a></li>
									<li><a href="/member/5">정회원 등업 관리</a></li>
									<li><a href="/member/1">정회원 관리</a></li>
									<li><a href="/member/2">벤더사 관리</a></li>
									<li><a href="/member/3">블랙 리스트 관리</a></li>
									<li><a href="/member/4">A클래스 회원 관리</a></li>
								</ul>
							</div>
						</nav>
					-->

					<div class="panel-body">
						<div class="table-responsive">
							<table class="table" style="vertical-align: middle">
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
								@foreach( $users as $user)
								<tbody>
									<tr>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										@if ($user->gender == 0 )
											<td>{{ '남자' }}</td>
										@else
											<td>{{ '여자' }}</td>
										@endif
										<td>{{ $user->phoneNumber }}</td>
										<td>{{Config::get('constants.USERTYPE.'.($user->type))}}</td>
										<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
									</tr>
								</tbody>
								@endforeach

							</table>
						</div>
					</div>
					@if(isset($type))
					<div class="panel-footer">
						@if($type == 2)
              <a href="/member/create"><button class="btn btn-primary">벤더사 추가</button></a>
            @elseif($type == 4)
              <a href="/member/a_class/create"><button class="btn btn-primary">A클래스 추가</button></a>
            @endif
					</div>
					@endif
		</div>
	</div>
@endsection
