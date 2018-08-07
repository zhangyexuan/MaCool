
<!DOCTYPE html>
<html>
<head>
    <title>百度书城</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    
    <link href="{{ URL::asset('Home/css/h5bookv2.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('Home/js/zpmuslazy.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('Home/js/wxbook.js')}}"></script>
    
	
	</head>
<style>
.cz_line17{
	table-layout: fixed;
	  word-break: break-all;
	  overflow: hidden;
}

</style>
<body><style>
	.header {
  height: 43px;
  background: #f7f7f7;
  border-bottom: 1px #cbcbcb solid;
  position: relative;
  display: -webkit-box;
  }
  .new_h5_head {
  display: -webkit-box;
  line-height: 43px;
  -webkit-box-flex: 1;
  }
  .new_h5_head>a:nth-of-type(1) {
  width: 30px;
  background-image: url("http://img.m.shucheng.baidu.com/operateimg/img/img/18721/18721.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 8px 13px;
  }
  .new_h5_head>a:nth-of-type(2) {
  -webkit-box-flex: 1;
  text-align: center;
  color: #333;
  font-size: 17px;
  }
  .new_h5_head>a {
  display: block;
}
.new_h5_head>a:nth-of-type(3) {
  width: 30px;
}
.new_h5_head .font-name {
  display: block;
  color: #999;
  font-size: 12px;
  text-align: center;
  -webkit-border-radius: 3px;
  margin-right: 10px;
}
  
  </style>
<header class="header">
        <div class="new_h5_head">
            <a class="ch_male _back"></a>
            <a>书籍详情</a>
			     		             <a class="font-name" href="javascript:void(0)/bookshelf?fr=hao123&urbid=%2Fcategory%2Fdetail_41_0&bck=90">														书架
												
			</a>
			    	 	        </div>
 </header>
<script>
	$(function(){
		var backUrl = "";
		$(".header ._back").on("click", function(){
			if(backUrl)
			{
				location.href = backUrl;
			}else
			{
				history.back();
			} 
		})
	})
</script><style>
.book_top .infour .bk_fl{height: 25px;position: relative; display: -webkit-box;}
.book_top .infour .bk_fl .fl{  width:auto ;height: 23px; border:1px solid #d4d4d4; font-size: 12px;line-height: 23px; background-color: #fff;-webkit-border-radius:3px; color: #000; text-align: center; margin-right: 5px; padding: 0px 5px;}
.book_top .infour .bk_fl .fl:active{background-color: #eee;}
</style>
<div class="muma_wap  magin">
    <div class="book_top ">
    
        <div class="img book_xq_xm"><img src="{{$NovelInfo->img}}" data-original="{{$NovelInfo->img}}"></div>
        <div class="infour">
            <div class="in_textone" style="padding-right:15px;">{{$NovelInfo->novelname}}</div>
            <div class="in_texttwo">作者：{{$NovelInfo->author}}</div>
            <div class="in_texttwo">连载(共{{$CountChapter}}章)</div>
        </div>
        
    </div>
    <div class="mulu_btns">
                         <div class="mulu_l_btn" onclick="javascript:void(0)location.href=''" id="_read">
                    <div style="color: #FFF;">
                        
                        <a href=" {{$id}}/{{$ChapterId}} ">免费阅读</a>
                <!-- <span></span> -->
            </div>
        </div>
                <div class="mulu_s_btn" onclick="javascript:void(0)location.href='/sys/log?fr=hao123&urbid=%2Fcategory%2Fdetail_41_0&bck=92&url=https%3A%2F%2Fitunes.apple.com%2Fcn%2Fapp%2Fpandareader%2Fid327313778%3Fl%3Den%26mt%3D8'">
            <div>
                查看目录
            </div>
        </div>
                 </div>
    <!-- NEWS -->
    <div class="new-book" style="">
        <div class="zx">最新</div>
                <div class="fn13" onclick="location.href='/book/reder/{{$ChapterInfo->id}}'">正文_{{$ChapterInfo->chaptername}}</div>
                
    </div>
</div>


 <style>
    .toast{width:170px; min-width:100px;opacity:1; height:29px; color:#fff; line-height:29px; text-align:center; border-radius:4px;
        position:fixed; top:40%; left:50%; margin-left:-85px; z-index:999999; filter: alpha(opacity=80); background:#000;}
</style>

<script>
    function Toast(msg,duration){
        duration=isNaN(duration)?3000:duration;
        var m = document.createElement('div');
        m.innerHTML = msg;
        m.className="toast";
        document.body.appendChild(m);
        setTimeout(function() {
            var d = 0.5;
            m.style.webkitTransition = '-webkit-transform ' + d + 's ease-in, opacity ' + d + 's ease-in';
            m.style.opacity = '0';
            setTimeout(function() { document.body.removeChild(m) }, d * 1000);
        }, duration);
    }
</script>

   
<div class="_advert_show"  data-plugid="447" data-typeid="8" data-step="0" ></div><div class="mulu_lists">
        <div class="catalog">
        <div onclick="" id="one1" class="active">简介</div>
        <!-- <div onclick="" id="one2" >目录</div>
         <div onclick="" id="one3" >评论</div>  -->
    </div>
    <div id="con_one_1">
        <div class="janjie">
           {{$NovelInfo->introduction}}
           
        </div>
            </div>
    

     <div id="con_one_2" style="display: none;">
    	    	    	             <div class="list_main"  onclick="javascript:void(0)location.href='/book/read?fr=hao123&urbid=%2Fcategory%2Fdetail_41_0&bkid=120040094&crid=1&bck=95'">
             
            <font>第1章 引子</font>
        </div>
            	             <div class="list_main"  onclick="javascript:void(0)location.href='/book/read?fr=hao123&urbid=%2Fcategory%2Fdetail_41_0&bkid=120040094&crid=2&bck=95'">
             
            <font>第2章 韩国美女</font>
        </div>
            	             <div class="list_main"  onclick="javascript:void(0)location.href='/book/read?fr=hao123&urbid=%2Fcategory%2Fdetail_41_0&bkid=120040094&crid=3&bck=95'">
             
            <font>第3章 机场遇美</font>
        </div>
                 
		<div class="menu_more_black marign"><a href="javascript:void(0)/book/menu?fr=hao123&urbid=%2Fbook_95_0&bkid=120040094&bck=95">更多目录 <span></span></a></div>
    </div>
    <div id="con_one_3" style="display: none;">
        <div class="pinlun">
            <div class="fn17">共有100条评论</div>
            <div class="my_pinlun"><a href="javascript:void(0)/book/commentAdd?fr=hao123&urbid=%2Fcategory%2Fdetail_41_0&bkid=120040094&bck=95">我要评论</a></div>
        </div>
        <div class="review">
            <div class="pic_img"><img src="http://img.m.shucheng.baidu.com/operateimg/img/img/14740/14740.jpg" alt=""> </div>
            <div class="review_fn">
                <div class="fn_name">独行的匹夫</div>
                <div class="fn16">刚才看到很多人说发现《贴身狂医》完本，这是系统出了错误。</div>
                <div class="fn15">2014-01-22  10:20</div>
            </div>
        </div>
        <div class="menu_more_black marign"><a href="javascript:void(0)/book/comment?fr=hao123&urbid=%2Fcategory%2Fdetail_41_0&bkid=120040094&bck=95">查看更多评论 <span> &gt; </span></a></div>
    </div>
 
    
</div>



<style>
.new_so_1{margin:10px 10px 0px 10px; background: #fff; height: 33px; border: 1px #d2d6d8 solid; display: -webkit-box;}
.new_so_1{margin-top:20px;}
.new_so_1 .so-input{-webkit-box-flex:1; padding: 0px 10px;}
.new_so_1 .so-input input{ width: 100%; background: #fff; font-size: 14px; margin-top: 8px; }
.new_so_1 .soso_ico{ width: 42px; height: 33px; background: #fbfbfb; border-left: 1px #d2d6d8 solid; background: url("http://img.m.shucheng.baidu.com/operateimg/img/img/18712/18712.png") center center no-repeat; background-size: 16px;}
.mini-search-bar{margin-top:10px;}
</style>
    <div class="new_so_1">
        <div class="so-input">
            <input type="text" placeholder="作者名/书名" id="keyword_100">
        </div>
        <div class="soso_ico _search_100"></div>
    </div>
<script>

</script>
<div class="footer">
    <a href="javascript:void(0)javascript:void(0)" class="rewinder"><div class="bac_to_top" id="bac_to_top"></div></a>
        <div class="ft_two">
        
        <a href="javascript:void(0)" >极速版</a>
        <!-- <a  class="active">触屏版</a> -->
        <!-- <a href="javascript:void(0)" >客户端</a>  -->   </div>
        <div class="ft_four">&copy; 2016 百度书城</div>
</div>
</body>
</html>
