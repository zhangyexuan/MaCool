$(function(){
	var isBottom = function(){
		var scrollTop = document.documentElement.scrollTop + document.body.scrollTop,
		correction = 20; /**校正值**/
		return document.documentElement.scrollHeight - window.scrollY <= window.innerHeight+correction;
	};
	$(window).bind("scroll touchmove", function(e){
		//if(isBottom()) $(window).trigger("isBottom");
	});
	/**
	$(window).on("touchend touchcancel",function(){
		$('html').height('auto');
	}).on("touchstart", function(){
		$('html').height($('html').height());
	});
	/**/
    window.setTimeout(function(){
        $("body").imglazyload({
            filter: 'img'
        });
	$('img').error(function () {
    	    $(this).attr('src', 'http://img.m.shucheng.baidu.com/operateimg/novel/0b/0bc1b6b497624fa61c4258180b31f251.jpg');
	});

     }, 1000);

    function init() {
        var update = function() {
            var h = scrollY < innerHeight ? 0 : scrollY + innerHeight;
            if(h){
                $(this).show();
            }else{
                $(this).hide();
            }
        }, timer;
        $(window).on("scroll resize orientationchange", function() {
                clearTimeout(timer);
                timer = setTimeout(function() {
                    update.call($(".rewinder"));
                    }, 200);
                }); 
        update.call($(".rewinder"));
        $(".bac_to_top").on("click", function() {
                scroll(0, 1);
      })
    }
    init();

})
function IC(param){
    this.param = $.extend({
elstatus : {}
},param);
this.init();
}
IC.prototype.init = function(){
    if(this.param.el.length){
        var $this = this;
        $.each(this.param.el, function(idx, item){
                var ic = $(this).data("ic");
                $this.param.elstatus[ic] = 0;
                $(item).on("input", function(){
                    $this.param.elstatus[ic] = $.trim($(this).val()) ? 1 : 0;
                    $this.check();
                 })
        })
    }
}
IC.prototype.check = function(){
    var r = true, $this = this;
    $.each(this.param.elstatus, function(idx, item){
            if(!item){
                r = false;
                if(typeof $this.param.cbUnpass == "function"){
                    $this.param.cbUnpass();
                }
                return false;
            }
     })
    if(r){
        if(typeof this.param.cbPass == "function"){
            this.param.cbPass();
        }
    }
}
