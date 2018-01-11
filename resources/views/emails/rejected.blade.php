<style>
    article {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        font-size: 16px;
        line-height: 1.75;
    }

    article p{
        margin-bottom: 30px;
        font-family: 'Nanum Gothic Coding';
    }

    .box {
        padding:30px;
        border-radius: 5px;
        border: 0;
        -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        margin-top: 5%;
        margin-left: 2%;
        margin-right: 2%;
    }
</style>

<div class="box">
    <h2 style="color: #ed0000;">접수하신 영업정보가 실패되었습니다.</h2>
    <h5><i>실패사유는 다음과 같습니다.</i></h5>
    <article>
        <p>고객명: <i>{{ $SalesInfo ->CustomerName }}</i></p>
        <p>사업장명: <i>{{ $SalesInfo ->BusinessName }}</i></p>
        <p>고객 주소: <i>{{ $SalesInfo ->CustomerAddress }}</i></p>
        <p>우편번호: <i>{{ $SalesInfo ->post_number }}</i></p>
        <p>고객 주소 Extra(1): <i>{{ $SalesInfo ->CustomerAddress_detai }}</i></p>
        <p>고객 주소 Extra(2): <i>{{ $SalesInfo ->CustomerAddress_extra }}</i></p>
        <p>고객 전화번호: <i>{{ $SalesInfo ->PhoneNumber }}</i></p>
        <p>고객 이메일: <i>{{ $SalesInfo ->CustomerEmail }}</i></p>
        <p>연락가능시간: <i>{{ $SalesInfo ->ContactTime }}</i></p>
        <p>특이사항: <i>{{ $SalesInfo ->Characteristic }}</i></p>
        <p>업종명: <i>{{ $SalesInfo ->Category }}</i></p>
        <p style="color:#ed0000">실패사유: <i>{{ $SalesInfo ->Fail_reason }}</i></p>
        <p>접수시간: <i>{{ $SalesInfo ->created_at }}</i></p>
        <p style="color:#3473d9">현재 진행 상태: <i>{{ $SalesInfo ->state }}</i></p>
        <p>비고 사항: <i>{{ $SalesInfo ->note }}</i></p>
        <p>접수 영업 사원: <i>{{ $SalesInfo ->SP_name }}</i></p>
        {{--<p>고객명:<i>김동현</i></p>--}}
        {{--<p style="color:#3473d9">체결금액:<i>100000</i></p>--}}
    </article>
</div>
