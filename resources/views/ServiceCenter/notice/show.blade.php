@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="title">
            <a href={{'/servicecenter/notice/'}}>
                {{$notices->title}}
            </a>
        </h3>
        <p class="content">
            <i class="fa fa-user"></i> {{$notices->user->name}}
            <i class="fa fa-clock"></i> {{$notices->created_at}}
        </p>
        <p class="fa fa-content fa-5x"> {{$notices->content}}</p>
    </div>
@stop