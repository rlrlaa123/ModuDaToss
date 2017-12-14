@extends('layouts.app')
@if(Auth::user()->id == $user->id)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$Name}} 추천인의 수수료 발생기록 </h2>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table showithmoney" style="text-align:center">
                            <thead>
                              <tr>
                                  <th>금액</th>
                                  <th>발생날짜</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($SH as $sh)
                              <tr>
                                  <td> {{ $sh->MoneySum }} </td>
                                  <td> {{ $sh->created_at }} </td>
                              </tr>
                            @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@else
    <p>접근 권한이 없습니다</p>
@endif
