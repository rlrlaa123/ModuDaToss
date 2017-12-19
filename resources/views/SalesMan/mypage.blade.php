@extends('layouts.app')
@if(Auth::user()->id == $user->id)
  @section('content')
  <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-header">

              </div>
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table" style="text-align:center">
                          <tbody>
                          <tr>
                              <td>이름</td>
                              <td>{{ $user->name }}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>이메일</td>
                              <td>{{ $user->email }}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>전화 번호</td>
                              <td>{{ $user->phoneNumber }}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>은행명</td>
                              <td>{{ $user->bankName }}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>계좌 번호</td>
                              <td>{{ $user->accountNumber }}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>사진</td>
                              <td>{{ $user->photo }}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>서명</td>
                              <td>{{ $user->signature }}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>회원 등급</td>
                              <td>{{Config::get('constants.USERTYPE.'.($user->type))}}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>추천인</td>
                              <td>{{ $user->recommender}}</td>
                          </tr>
                          </tbody>
                          <tbody>
                          <tr>
                              <td>추천인코드</td>
                              <td>{{ $user->recommend_code}}</td>
                          </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
      </div>
  </div>
  @endsection
@else
  <p>접근 권한이 없습니다</p>
@endif
