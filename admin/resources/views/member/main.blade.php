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
								<li><a href="/member/1">정회원 관리</a></li>
								<li><a href="/member/2">벤더사 관리</a></li>
								<li><a href="/member/3">블랙 리스트 관리</a></li>
								<li><a href="/member/4">A클래스 회원 관리</a></li>
					  		</ul>
						</div>
				  	</nav>
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

						@if(isset($users) && count($users) > 0)
							@if($_SERVER['PHP_SELF'] == '/index.php/member/0')
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
											<td>{{ $user->type }}</td>
											<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
										</tr>
									</tbody>
								@endforeach
							@endif
						@endif

						@if(isset($users) && count($users) > 0)
							@if($_SERVER['PHP_SELF'] == '/index.php/member/1')
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
											<td>{{ $user->type }}</td>
											<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
										</tr>
									</tbody>
								@endforeach
							@endif
						@endif

					  	@if($_SERVER['PHP_SELF'] == '/index.php/member/2')
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
											<td>{{ $user->type }}</td>
											<td><a href="/member/detail/{{$user->id}}">자세히 보기</a></td>
										</tr>
							  		</tbody>
						  		@endforeach
							@endif
							<button><a href="/member/create">벤더사 추가</a></button>
						@endif

					  	@if(isset($users) && count($users) > 0)
							@if($_SERVER['PHP_SELF'] == '/index.php/member/3')
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
										  	<td>{{ $user->type }}</td>
										  	<td><a href="/member/{{$user->id}}">자세히 보기</a></td>
										</tr>
							  		</tbody>
						  		@endforeach
							@endif
					  	@endif

						@if($_SERVER['PHP_SELF'] == '/index.php/member/4')
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
											<td>{{ $user->type }}</td>
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
@endsection