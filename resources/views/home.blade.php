@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome!</div>
                    <div class="panel-body">
                        모두 다던져에 방문해 주셔서 감사합니다.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive a">
        <table class="table" style="vertical-align: middle">
            <tbody>
            <tr style="border:none">
                <td>영업 요청 건수</td>
                <td>영업사원 수</td>
                <td>총 영업 매출</td>
            </tr>
            <tr>
                <td>953건</td>
                <td>56명</td>
                <td>13,098,400원</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <caption>실시간 영업list</caption>
        <button type="button" class="btn btn-primary pull-right" style="width:60px; margin-right:20px; padding:5px;">+더보기</button>
        <table class="table" style="vertical-align:middle;">
            <thead>
            <tr>
                <th>등록시간</th>
                <th>카테고리</th>
                <th>사업자</th>
                <th>고객명</th>
                <th>영업자</th>
                <th>상태</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>18:59:00</td>
                <td>정수기</td>
                <td>코****</td>
                <td>송**</td>
                <td>이**</td>
                <td>접수</td>
            </tr>
            <tr>
                <td>14:24:13</td>
                <td>인력용역</td>
                <td>자****</td>
                <td>이**</td>
                <td>김**</td>
                <td>진행중</td>
            </tr>
            <tr>
                <td>10/29</td>
                <td>무인경비</td>
                <td>투****</td>
                <td>김**</td>
                <td>송**</td>
                <td>완료</td>
            </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            var open = $('.open-nav'),
                close = $('.close'),
                overlay = $('.overlay');

            open.click(function() {
                overlay.show();
                $('#wrapper').addClass('toggled');
            });

            close.click(function() {
                overlay.hide();
                $('#wrapper').removeClass('toggled');
            });
        });
    </script>
@endsection