<!DOCTYPE html>
<html>
 <head> 
  <title>{{config('miaoshu')}}</title> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="white" /> 
  <link href="{{ URL::asset('Home/css/mbook.min.css') }}" rel="stylesheet" type="text/css" />
 </head>
 <body>
  <script type="text/javascript" src="{{ URL::asset('Home/js/zpmuslazy.min.js')}}"></script>
  <script type="text/javascript" src="{{ URL::asset('Home/js/wxbook.js')}}"></script> 
  <link rel="icon" href="http://img.m.shucheng.baidu.com/operateimg/img/img/h5book/16.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="http://img.m.shucheng.baidu.com/operateimg/img/img/h5book/16.ico" type="image/x-icon" />
  <script type="text/javascript" src="{{ URL::asset('Home/js/h5.slider.min.js')}}"></script>
  <style type="text/css">
              .position_top{position:fixed; left: 0;top: 0; width: 100%;z-index:9999}
        
        .-bg-color-1{ height: 41px; background: #8dc1d7; display: -webkit-box;}
        .-bg-color-1>div:nth-child(1){ margin-left: 14px; margin-top: 5px;}
        .-bg-color-1>div:nth-child(1) img{ width: 32px; height: 32px;}
        .-bg-color-1>div:nth-child(2){ margin-left: 10px;font-size: 13px; color: #fff; line-height: 41px;-webkit-box-flex:1;white-space:nowrap;text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden;}
        .-bg-color-1>div:nth-child(2) span{color: #fdf86c}
        .-bg-color-1>div:nth-child(3){ display: inline-block; background: #fff; font-size: 15px; color: #42464f;  border-radius: 3px; padding: 3px 11px; margin-top: 7px; }
        .-bg-color-1>div:nth-child(4), .-bg-color-2>div:nth-child(4),.-bg-color-3>div:nth-child(4){ width: 35px; background: url("http://img.m.shucheng.baidu.com/operateimg/novel/63/63b3257ec124a3195a4e63892cad8e63.png")center center no-repeat; background-size: 12px;}
        .-bg-color-2{ height: 45px; background: #8dc1d7; display: -webkit-box;}
        .-bg-color-2>div:nth-child(1){ margin-left: 14px; margin-top: 7px;}
        .-bg-color-2>div:nth-child(1) img{ width: 32px; height: 32px;}
        .-bg-color-2>div:nth-child(2){ -webkit-box-flex:1; font-size: 13px; color: #fff;padding-top: 6px; line-height: 18px; white-space:nowrap;text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden; margin-left: 10px;}
        .-bg-color-2>div:nth-child(2) span{color: #fdf86c}
        .-bg-color-2>div:nth-child(3){display: inline-block; background: #fff; font-size: 15px; color: #42464f;  border-radius: 3px; padding: 3px 11px; margin-top: 9px;}
    </style> 
  <!-- 首页--> 
  <!-- div--> 
<!--   <script>
    $(function(){
		var u="/service/close_app?fr=hao123&v=4&uid=7320A0F6466807D828128E93935C0A0F&_ajax=1";
        $("._topbar ._close").bind("click",function(){
            $("._topbar").hide();
      		 //记录点击状态
	       $.ajax({
				"type" : "GET",
				"url" : u,
				 "dataType": 'json',
				 "timeout": 5000,
				"beforeSend" : function(){
				},
				"complete" : function(){
				},
				"success" : function(data){
					//不做任何处理了都
				}
			})
        })
    })
</script>  -->
  <header class="header">
   <div class="head_k_ico">
    <div class="icon_l" onclick="javascript:void(0)javascript:void(0)location.href='/recharge/pro?fr=hao123&amp;v=4&amp;uid=7320A0F6466807D828128E93935C0A0F&amp;bck=19'">
     <img src="http://img.m.shucheng.baidu.com/operateimg/img/img/18695/18695.png" />
    </div>
   </div>
   <div class="head_tiele">
    {{config('miaoshu')}}
   </div>
   <div class="header_sex">
    <a class="book-box" href="javascript:void(0)">书架</a>
    <a class="So" href="javascript:void(0)"></a>
   </div>
  </header>
  <nav class="New-nav">
   <a class="active" href="/">首页</a>
   <a class="" href="/list">分类</a>
  </nav>
  <div class="new_so  ">
   <div class="so-input">
    <input type="text" placeholder="作者名/书名" id="keyword_751" />
   </div>
   <div class="soso_ico" id="soso_751"></div>
  </div>
 
  <script>
 	$(function(){
	$("#container163").swipeSlide ({
        continuousScroll:true,
        speed : 3000,
		 transitionType : 'cubic-bezier(0.22, 0.69, 0.72, 0.88)',
        callback : function(i){
            $('#container163  .dot').children().eq(i).addClass('cur').siblings().removeClass('cur');
        }
    });
 });
 </script> 