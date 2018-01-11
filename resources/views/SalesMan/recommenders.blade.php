@extends('layouts.app3')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="Mmtitle">
                    <span class="bluetitle">{{ Auth::user()->name }}</span>
                    <p>님의 추천인 계보도</p>
                  </div>
                </div>
                <div class="panel-body">

                  <div class="recom_nav">
                  </div>

                  <div class="recom-container">
                    <div class="loader"></div>
                  </div>

                </div>

            </div>
        </div>
    </div>
</div>


  <div class="Membermenu">
    <a href="/profit"><div>
      <img src="{{ URL::asset('/img/withdrawl.png')}}">
      <p>수익조회 및 출금</p>
    </div></a>
    <a href="/Recommender"><div>
      <img src="{{ URL::asset('/img/Recommender.png')}}">
      <p>추천인 조회</p>
    </div></a>
    <a href="/DepositLog"><div>
      <img src="{{ URL::asset('/img/Money2.png')}}">
      <p>나의 수수료 기록</p>
    </div></a>
    <a href="/WithdrawalLog"><div>
      <img src="{{ URL::asset('/img/Log.png')}}">
      <p>나의 출금 기록</p>
    </div></a>
  </div>


<script>
$(document).ready(function(){

  var recom_code = '{{ Auth::user()->recommend_code}}';
  fetch();

  $('.recom-container').on('click','.Eachrecom',function(){
    recom_code = $(this).find('b').text();
    var recom_name = $(this).find('.recom_name').text();
    fetch(recom_name);
  })

  $('.recom_nav').on('click','span',function(){
    recom_code = $(this).attr('class');
    fetch('nav');
    $(this).nextAll().remove();
  })

  function fetch(p = '{{ Auth::user()->name }}'){
    var recom_name = p;

    $.ajax({
      url:'/recomfetch/'+recom_code,
      type:'GET',
      success:function(data){

        if(data.length == 0){
          alert('하위 추천인이 없습니다');
          return false;
        }else{
          var text="";
          $('.recom-container').children().remove();

          for( i in data){
            text += "<div class='Eachrecom'><div class='photo'></div><p class='recom_name'>"+data[i]['name']+"</p><p>추천인 코드 :  <b>"+data[i]['recommend_code']+"</b></p></div>";
          }

          $('.recom-container').append(text);

          if(recom_name != 'nav'){
            var txt = "<span class='"+recom_code+"'>"+recom_name+"<img src='{{ URL::asset('/img/right-arrow.png')}}'> </span>";
            $('.recom_nav').append(txt);
          }

        }
      },
      error:function(){

      }
    })
  }

  /*
  $('.Recommenderscontainer').on('click','.RC',function(){
    var RCcode = $(this).find('.RCcode').text();
    var RCname = $(this).find('.RCname').text();

    $.ajax({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     url:'/Recommenders',
     data:{data:RCcode},
     type:'post',
     success:function(data){
      console.log(data);

      if(data.length == 0){
        alert('하위 추천인이 없습니다');
        return false;
      }
      $('.RC').remove();
      $('.loader').show();

      setTimeout(myFunction, 500);

      function myFunction(){

        var txt = $('.RCnav').html() + '<span class="'+RCcode+'"> > '+RCname+'</span>';
        var text ="";
        for(i in data){
          text+="<div class='RC'>"+"<p class='RCname'>"+data[i]['name']+"</p><p class='RCcode'>"+data[i]['recommend_code']+"</p><p class='arrow'>>></p></div>";
        }
        $('.RCnav').html(txt);
        $('.RCnav').after(text);
        $('.loader').hide();

      }

     }
    })
  })

  $('.RCnav').on('click','span',function(){
    var RCcode = $(this).attr('class');

    $.ajax({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     url:'/Recommenders',
     data:{data:RCcode},
     type:'post',
     success:function(data){
        console.log(data);
        if(data.length == 0){
          alert('하위 추천인이 없습니다');
          return false;
        }
        $('.RC').remove();

        setTimeout(myFunction, 500);
        $('.loader').show();

        function myFunction(){

          var text ="";
          for(i in data){
            text+="<div class='RC'>"+"<p class='RCname'>"+data[i]['name']+"</p><p class='RCcode'>"+data[i]['recommend_code']+"</p><p class='arrow'>>></p></div>";
          }

          $('.RCnav').after(text);
          $('.loader').hide();
        }

     }
    })
    $(this).nextAll().remove();


  })
  */
})
</script>
@endsection
