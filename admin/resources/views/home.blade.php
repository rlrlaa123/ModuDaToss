@extends('layouts.app')

@section('content')
<div class="sidenav">
  <a href="/member">회원관리</a>
  <a href="/SIshow">영업현황관리</a>
  <a href="/category">영업 라인업 관리</a>
  <a href="/withdrawal">입출금 관리</a>
  <a href="/articles">게시판 관리</a>
  <a href="">기타 관리</a>
</div>

<div class="Dash container">
  <h2>대시보드</h2>
  <div class="list-group">
    <a href="/member" class="list-group-item">회원관리</a>
    <a href="/SIshow" class="list-group-item">영업현황관리</a>
    <a href="/category" class="list-group-item">영업 라인업 관리</a>
    <a href="/withdrawal" class="list-group-item">입출금관리</a>
    <a href="/articles" class="list-group-item">게시판 관리</a>
    <a href="" class="list-group-item">기타 관리</a>
  </div>
</div>
<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <a href="/member">회원관리</a>
                </div>


                <div class="panel-body">
                  <a href="/SIshow">영업현황 관리</a>
                </div>
                <div class="panel-body">
                  <a href="/category">영업 라인업 관리</a>
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

                </div>

            </div>
        </div>
    </div>
</div>
-->
@endsection
