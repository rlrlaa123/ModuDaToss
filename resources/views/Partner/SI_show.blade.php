@extends('layouts.app3')

@section('content')
    <div class="SIupper">

      <p class="SItitle">나의 영업 정보</p>

    </div>
    <div class="table-responsive SIshowtable">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>상태</th>
            <th>사업장명</th>
            <th>고객명</th>
            <th>업종명</th>
            <th>고객주소</th>
            <th>발생시간</th>
            <th>전화번호</th>
            <th>자세히</th>
          </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
      </table>
    </div>

    <div class="SImenu">
      <div>
        <img src="{{ URL::asset('/img/all.png')}}">
        <p>전체</p>
      </div>
      <div>
        <img src="{{ URL::asset('/img/invoice.png')}}">
        <p>접수 완료</p>
      </div>
      <div>
        <img src="{{ URL::asset('/img/play.png')}}">
        <p>진행중</p>
      </div>
      <div>
        <img src="{{ URL::asset('/img/hourglass.png')}}">
        <p>승인대기</p>
      </div>
      <div>
        <img src="{{ URL::asset('/img/success.png')}}">
        <p>완료</p>
      </div>
      <div>
        <img src="{{ URL::asset('/img/close.png')}}">
        <p>실패</p>
      </div>
    </div>
<script>

$(document).ready(function(){
  var current_page = 1;
  var state = "전체";

  fetchdata();


  $('.SImenu div').click(function(){
    state = $(this).find('p').text();
    current_page = 1;
    fetchdata();
  })

  $(window).scroll(function(){
    if($(window).scrollTop() == $(document).height() - $(window).height()){
      current_page ++;
      fetchdata();
    }
   });

   function fetchdata(){
     $.ajax({
       url:'/Partner/SIshow?state='+state+'&page='+current_page,
       type:'get',
       success:function(data){
         var data = data.data;
         var text = "";
         for( i in data){
           text += "<tr><td>"+data[i]['state']+"</td>";
           text += "<td>"+data[i]['BusinessName']+"</td>";
           text += "<td>"+data[i]['CustomerName']+"</td>";
           text += "<td>"+data[i]['Category']+"</td>";
           text += "<td>"+data[i]['CustomerAddress']+"</td>";
           text += "<td>"+data[i]['created_at']+"</td>";
           text += "<td>"+data[i]['PhoneNumber']+"</td>";
           text += "<td><a href='/Partner/detail/"+data[i]['id']+"'>자세히 -> </td></tr>";
         }
         if(current_page == 1){
           $('#tbody').children().remove();
           $('#tbody').append(text);
         }else{
           $('#tbody').append(text);
         }
       }
     })
   }
})

</script>
@endsection
