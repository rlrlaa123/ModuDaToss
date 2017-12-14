@extends('layouts.app')
@if(Auth::user()->id == $user->id)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>추천인 계보</h2>
                    </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <button class="btn btn-info" id="showithmoney"> 적립내역보기 </button>
                        <button class="btn btn-info" id="showrecommendee">나의 추천인 보기</button>
                        <p style="float:right" id="number">총 {{ count($recommendee)}} 명</p>
                        <table class="table showithmoney" style="text-align:center">
                            <thead>
                              <tr>
                                  <th>이름</th>
                                  <th>금액</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($SH as $sh)
                              <tr>
                                  <td> {{ $sh->triggerName }} </td>
                                  <td>+ {{ $sh->MoneySum }} </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                          <table class="table showrecommendee" style="text-align:center">
                              <thead>
                                <tr>
                                    <th>이름</th>
                                    <th>비고</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($recommendee as $rc)
                                <tr>
                                    <td>{{ $rc->name }} </td>
                                    <td> <a href="/Recommenderdetail/{{Auth::user()->id}}/{{ $rc->id }}">자세히</a> </td>
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
    <script>
    $(document).ready(function(){
      $('.showrecommendee').hide();
      $('#number').hide();
      $('#showrecommendee').click(function(){
        $('.showithmoney').hide();
        $('.showrecommendee').show();
        $('#number').show();
      })
      $('#showithmoney').click(function(){
        $('.showrecommendee').hide();
        $('#number').hide();
        $('.showithmoney').show();
      })
    })
    </script>
@endsection
@else
    <p>접근 권한이 없습니다</p>
@endif
