@extends('layouts.app3')

@section('content')
  <div class="container">
          <div class="SIdetail">
            <div class="SI_showtitle">
              <div>상세 영업 정보</div>
            </div>
            <div class="SIdetailtitle">고객명</div>
            <div>{{ $SalesInfo -> CustomerName}}</div>

            <div class="SIdetailtitle">사업장명</div>
            <div>{{ $SalesInfo  -> BusinessName}}</div>

            <div class="SIdetailtitle">고객 주소</div>
            <div>{{ $SalesInfo  -> CustomerAddress}}</div>

            <div class="SIdetailtitle">우편번호</div>
            <div>{{ $SalesInfo  -> post_number}}</div>

            <div class="SIdetailtitle">고객 주소 Extra(1)</div>
            <div>
              @if($SalesInfo -> CustomerAddress_detail == '')
                -
              @else
                {{ $SalesInfo -> CustomerAddress_detail}}
              @endif
            </div>

            <div class="SIdetailtitle">고객 주소 Extra(2)</div>
            <div>
              @if($SalesInfo -> CustomerAddress_extra == '')
                -
              @else
                {{ $SalesInfo -> CustomerAddress_extra}}
              @endif
            </div>

            <div class="SIdetailtitle">고객 전화번호</div>
            <div>{{ $SalesInfo  -> PhoneNumber}}</div>

            <div class="SIdetailtitle">고객 이메일</div>
            <div>
              @if($SalesInfo -> CustomerEmail == '')
                -
              @else
                {{ $SalesInfo -> CustomerEmail}}
              @endif
            </div>

            <div class="SIdetailtitle">연락가능시간</div>
            <div>{{str_replace("T"," ",$SalesInfo -> ContactTime)}}</div>

            <div class="SIdetailtitle">특이사항</div>
            <div>
              @if($SalesInfo -> Characteristic == '')
                -
              @else
                {{ $SalesInfo -> Characteristic}}
              @endif
            </div>

            <div class="SIdetailtitle">업종명</div>
            <div>
              {{ $SalesInfo  -> Category}}
            </div>

            <div class="SIdetailtitle">예상 체결 금액</div>
            <div>
              @if($SalesInfo -> pay == '')
                -
              @else
                {{ $SalesInfo -> pay}}
              @endif
            </div>

            <div class="SIdetailtitle">접수시간</div>
            <div>
              {{ $SalesInfo -> created_at}}
            </div>

            <div class="SIdetailtitle">현재 진행 상태</div>
            <div>
              {{ $SalesInfo -> state}}
            </div>

            <div class="SIdetailtitle">비고 사항</div>
            <div>
              @if($SalesInfo -> note == '')
                  -
              @else
                {{ $SalesInfo -> note}}
              @endif
            </div>

            <div class="SIdetailtitle">접수 영업 사원</div>
            <div>
              {{ $SalesInfo -> SP_name}}
            </div>

            @if($SalesInfo -> Fail_reason == 'none')
            @else
            <div class="SIdetailtitle">실패사유</div>
            <div>
                {{ $SalesInfo -> Fail_reason}}
            </div>
            @endif

            <div class="SIdetailtitle imgtitle">사업장 사진</div>

            <div class='imagecontainer' style="text-align:center;">
              @if($SalesInfo -> images == 'noimages.jpg')
              @else
                <img src="/storage/images/{{$SalesInfo -> images}}" style="width:275px;">
              @endif
            </div>

            <div class="SIdetailtitle imgtitle">서명</div>
            <div class='imagecontainer'>
              @if($SalesInfo -> signature == 'nosignature')
              @else
                <img src="/img/signature/{{ $SalesInfo -> signature }}" style="width:100%">
              @endif
            </div>
          </div>
        </div>
  </div>
@endsection
