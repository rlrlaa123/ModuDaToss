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
									<li><a href="/member/0">일반 회원 관리</a></li>
									<li><a href="/member/5">정회원 등업 관리</a></li>
									<li><a href="/member/1">정회원 관리</a></li>
									<li><a href="/member/2">벤더사 관리</a></li>
									<li><a href="/member/3">블랙 리스트 관리</a></li>
									<li><a href="/member/4">A클래스 회원 관리</a></li>
								</ul>
							</div>
						</nav>
					</div>
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
								@if(isset($users) && count($users) > 0)
									@if( Request::path() == 'member/0')
										@foreach($users as $user)
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
												@if ($user->type == 0)
													<td>일반회원</td>
												@elseif ($user->type == 1)
													<td>정회원</td>
												@elseif ($user->type == 2)
													<td>벤더사</td>
												@elseif ($user->type == 3)
													<td>차단회원</td>
												@elseif ($user->type == 4)
													<td>A 클래스 회원</td>
												@elseif ($user->type == 5)
													<td>정회원 대기 회원</td>
												@endif
												<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
											</tr>
											</tbody>
										@endforeach
									@endif
								@endif

								@if(isset($users) && count($users) > 0)
									@if(Request::path() == 'member/5')
										@foreach($users as $user)
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
												@if ($user->type == 0)
													<td>일반회원</td>
												@elseif ($user->type == 1)
													<td>정회원</td>
												@elseif ($user->type == 2)
													<td>벤더사</td>
												@elseif ($user->type == 3)
													<td>차단회원</td>
												@elseif ($user->type == 4)
													<td>A 클래스 회원</td>
												@elseif ($user->type == 5)
													<td>정회원 대기 회원</td>
												@endif
												<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
											</tr>
											</tbody>
										@endforeach
									@endif
								@endif

								@if(isset($users) && count($users) > 0)
									@if(Request::path() == 'member/1')
										@foreach($users as $user)
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

												@if ($user->type == 0)
													<td>일반회원</td>
												@elseif ($user->type == 1)
													<td>정회원</td>
												@elseif ($user->type == 2)
													<td>벤더사</td>
												@elseif ($user->type == 3)
													<td>차단회원</td>
												@elseif ($user->type == 4)
													<td>A 클래스 회원</td>
												@elseif ($user->type == 5)
													<td>정회원 대기 회원</td>
												@endif
												<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
											</tr>
											</tbody>
										@endforeach
									@endif
								@endif

								@if(Request::path() == 'member/2')
									@if(isset($users) && count($users) > 0)
										@foreach($users as $user)
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
												@if ($user->type == 0)
													<td>일반회원</td>
												@elseif ($user->type == 1)
													<td>정회원</td>
												@elseif ($user->type == 2)
													<td>벤더사</td>
												@elseif ($user->type == 3)
													<td>차단회원</td>
												@elseif ($user->type == 4)
													<td>A 클래스 회원</td>
												@elseif ($user->type == 5)
													<td>정회원 대기 회원</td>
												@endif
												<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
											</tr>
											</tbody>
										@endforeach
									@endif
									<button><a href="/member/create">벤더사 추가</a></button>
								@endif

								@if(isset($users) && count($users) > 0)
									@if(Request::path() == 'member/3')
										@foreach($users as $user)
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
												@if ($user->type == 0)
													<td>일반회원</td>
												@elseif ($user->type == 1)
													<td>정회원</td>
												@elseif ($user->type == 2)
													<td>벤더사</td>
												@elseif ($user->type == 3)
													<td>차단회원</td>
												@elseif ($user->type == 4)
													<td>A 클래스 회원</td>
												@elseif ($user->type == 5)
													<td>정회원 대기 회원</td>
												@endif
												<td><a href="/member/{{$user->id}}">자세히 보기</a></td>
											</tr>
											</tbody>
										@endforeach
									@endif
								@endif

								@if(Request::path() == 'member/4')
									@if(isset($users) && count($users) > 0)
										@foreach($users as $user)
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
												@if ($user->type == 0)
													<td>일반회원</td>
												@elseif ($user->type == 1)
													<td>정회원</td>
												@elseif ($user->type == 2)
													<td>벤더사</td>
												@elseif ($user->type == 3)
													<td>차단회원</td>
												@elseif ($user->type == 4)
													<td>A 클래스 회원</td>
												@elseif ($user->type == 5)
													<td>정회원 대기 회원</td>
												@endif
												<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
											</tr>
											</tbody>
										@endforeach
									@endif
									<button><a href="/member/a_class/create">A클래스 추가</a></button>
								@endif
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection