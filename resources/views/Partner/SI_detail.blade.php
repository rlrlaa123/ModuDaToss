@extends('layouts.app3')

@section('content')
<div class="container">
        <div class="SIdetail">
          <div class="SI_showtitle">
            <div>상세 영업 정보</div>
          </div>
          <div class="SIdetailtitle">고객명</div>
          <div>{{ $SI -> CustomerName}}</div>

          <div class="SIdetailtitle">사업장명</div>
          <div>{{ $SI  -> BusinessName}}</div>

          <div class="SIdetailtitle">고객 주소</div>
          <div>{{ $SI -> CustomerAddress}}</div>

          <div class="SIdetailtitle">우편번호</div>
          <div>{{ $SI -> post_number}}</div>

          <div class="SIdetailtitle">고객 주소 Extra(1)</div>
          <div>
            @if($SI-> CustomerAddress_detail == '')
              -
            @else
              {{ $SI-> CustomerAddress_detail}}
            @endif
          </div>

          <div class="SIdetailtitle">고객 주소 Extra(2)</div>
          <div>
            @if($SI-> CustomerAddress_extra == '')
              -
            @else
              {{ $SI-> CustomerAddress_extra}}
            @endif
          </div>

          <div class="SIdetailtitle">고객 전화번호</div>
          <div>{{ $SI -> PhoneNumber}}</div>

          <div class="SIdetailtitle">고객 이메일</div>
          <div>
            @if($SI-> CustomerEmail == '')
              -
            @else
              {{ $SI-> CustomerEmail}}
            @endif
          </div>

          <div class="SIdetailtitle">연락가능시간</div>
          <div>{{str_replace("T"," ",$SI-> ContactTime)}}</div>

          <div class="SIdetailtitle">특이사항</div>
          <div>
            @if($SI-> Characteristic == '')
              -
            @else
              {{ $SI-> Characteristic}}
            @endif
          </div>

          <div class="SIdetailtitle">업종명</div>
          <div>
            {{ $SI -> Category}}
          </div>

          <div class="SIdetailtitle">예상 체결 금액</div>
          <div>
            @if($SI-> pay == '')
              -
            @else
              {{ $SI-> pay}}
            @endif
          </div>

          <div class="SIdetailtitle">접수시간</div>
          <div>
            {{ $SI-> created_at}}
          </div>

          <div class="SIdetailtitle">현재 진행 상태</div>
          <div>
            {{ $SI-> state}}
          </div>

          <div class="SIdetailtitle">비고 사항</div>
          <div>
            @if($SI-> note == '')
                -
            @else
              {{ $SI-> note}}
            @endif
          </div>

          <div class="SIdetailtitle">접수 영업 사원</div>
          <div>
            {{ $SI-> SP_name}}
          </div>

          @if($SI-> Fail_reason == 'none')
          @else
          <div class="SIdetailtitle">실패사유</div>
          <div>
              {{ $SI-> Fail_reason}}
          </div>
          @endif

          <div class="SIdetailtitle imgtitle">사업장 사진</div>
          <div class='imagecontainer'>
            @if($SI-> images == 'noimages.jpg')
            @else
              <img src="/storage/images/{{$SI -> images}}" style="width:275px;">
            @endif
          </div>

          <div class="SIdetailtitle imgtitle">서명</div>
          <div class='imagecontainer'>
            @if($SI -> signature == 'nosignature')
            @else
              <img src="/img/signature/{{ $SI -> signature }}" style="width:100%">
            @endif
          </div>

          <div class="SIdetailtitle imgtitle">
            @if($SI->state == '접수 완료')
            <form action='/Partner/update' method='POST'>
              {{ csrf_field() }}
              <input type="hidden" name="SI" value="{{ $SI->id}}">
              <input type='submit' class='btn btn-primary' value='진행중'>
            </form>
            @endif

            @if($SI->state == '진행중')
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Success">완료</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Fail">실패</button>
            @endif
          </div>
        </div>
      </div>

<div class="modal fade" id="Success" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">완료</h4>
      </div>
      <div class="modal-body">
        <form action='/Partner/update' method='POST'>
          {{ csrf_field() }}
        <div class="form-group">
          <div class="col-sm-6">
            <input type="number" name="pay" class='form-control' placeholder="체결금액"  min=0 required>
            <input type="hidden" name="SI" value="{{ $SI->id}}">
          </div>
          <input type="submit" value="완료" class="btn btn-primary">
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="Fail" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">실패</h4>
      </div>
      <div class="modal-body">
        <form action='/Partner/update' method='POST'>
          {{ csrf_field() }}
        <div class="form-group">
          <input type="hidden" name="SI" value="{{ $SI->id}}">
          <input type="text" name="reason" class='form-control' placeholder="실패사유" required>

          {{--<div class="col-sm-6">--}}
            {{--{{ Form::select('reason', [--}}
                {{--'사유1' => '사유1',--}}
                {{--'사유2' => '사유2',--}}
                {{--'사유3' => '사유3',--}}
                {{--'사유4' => '사유4'--}}
              {{--], null, ['class'=>'form-control','placeholder' => '사유선택'])}}--}}
          {{--</div>--}}
          {{Form::submit('실패',['class' => 'btn btn-primary'])}}
          </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
<script>
$('form').submit(function(){
  alert('성공적으로 진행되었습니다');
})
</script>
@endsection
