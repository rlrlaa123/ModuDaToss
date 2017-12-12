@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <a href="member">회원관리</a>
                </div>


                <div class="panel-body">
                  <a href="show2">영업현황 관리</a>
                </div>
                <div class="panel-body">
                  <a href="/category">업종 수수료 관리</a>
                </div>
                <div class="panel-body">
                  <a href="/withdrawal">입출금 관리</a>
                </div>
                <div class="panel-body">
                  <a href="/articles">게시판 관리</a>
                </div>
                <div class="panel-body">
                  <a href="">기타 관리</a>
                </div>
                <div class="panel-body">
                  {{ $Now }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
