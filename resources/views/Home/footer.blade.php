
 <script>$(function(){$("#ranking973 .Ranking-menu").find("div").on("click",function(){$this = $(this);$this.parent().find("div").removeClass("active");$this.addClass("active");var tab = $this.data("tab");$("#ranking973 ._rking").hide();$("#ranking973  #ranking"+tab).show()})});</script>
  <!-- 搜索 ---->
  <div class="new_so  down-top">
   <div class="so-input">
    <input type="text" placeholder="作者名/书名" id="keyword_943" />
   </div>
   <div class="soso_ico" id="soso_943"></div>
  </div>
  <script>$(function(){$("#soso_943").on("click",function(){var word = $("#keyword_943").val();location.href= "/search?fr=hao123&v=4&uid=7320A0F6466807D828128E93935C0A0F&bck=22&keyword="+encodeURIComponent(word);})});</script>
  <script>var AdvPlugConf = {seqCurrent:{},stepList:{},stepOnly:{},};function  showMyAdvert(idname){var idname  = arguments[0] ? arguments[0] : "";var steps  = arguments[1] ? arguments[1] : 0;var sendStepFlag = false;if(idname!="") {idname ="#"+idname;};var advertlist = $(idname+" ._advert_show");advertlist.each(function(i,n){var $this = $(n);var plugid     = $this.data("plugid");var typeid     = $this.data("typeid");var step       = $this.data("step");var stepList   = 'plug_stepList_' + plugid;var stepOnly   = 'plug_stepOnly_' + plugid;var seqCurrent = 'seqCurrent_' + plugid;var isSendRequest = true;if (typeof(AdvPlugConf.seqCurrent[seqCurrent]) == 'undefined') {AdvPlugConf.seqCurrent[seqCurrent] = -1;}if (step > 0) {if (typeof(AdvPlugConf.stepList[stepList]) == 'undefined') {AdvPlugConf.stepList[stepList] = [];}if (steps > 0 &&  AdvPlugConf.stepList[stepList].indexOf(steps) == '-1') {AdvPlugConf.stepList[stepList].push(steps);if(AdvPlugConf.stepList[stepList].length % (step + 1) == 0) {AdvPlugConf.seqCurrent[seqCurrent] += 1;} else {isSendRequest = false;}} else {isSendRequest = false;}} else if (step < 0) {if (typeof(AdvPlugConf.stepOnly[stepOnly]) == 'undefined') {AdvPlugConf.stepOnly[stepOnly] = false;} else {isSendRequest = false;}} else {AdvPlugConf.seqCurrent[seqCurrent] += 1;}if (plugid > 0 && isSendRequest) {$.ajax({type: "get",async: true,url: "/index/data_ajax?fr=hao123&v=4&uid=7320A0F6466807D828128E93935C0A0F&method=advert&_ajax=",dataType: "json",data: {plugid: plugid,typeid: typeid,current: AdvPlugConf.seqCurrent[seqCurrent]},success: function(result){if (result.code){$this.html(result.data);if($this.find("script").length>0){var jshtml=$($this.find("script")[0]).html();eval(jshtml);}}}});}});};showMyAdvert("");</script>
  <img src="http://wap.cmread.com/r/388394994/index.htm?cm=M3880001" alt=" " width="1" height="1" style="display:none" />
  <img src="http://wap.cmread.com/r/?vt=2&amp;cm=M3160056" alt=" " width="1" height="1" style="display:none" />
  <img src="http://wap.cmread.com/r/?vt=2&amp;cm=M33G0003" alt=" " width="1" height="1" style="display:none" />
  <footer class="new-footer">
   <a href="javascript:void(0)#">
    <div class="bac_to_top" id="bac_to_top"></div></a>
   <div class="foot-two">
    <a href="javascript:void(0)/?fr=hao123&amp;v=2&amp;uid=7320A0F6466807D828128E93935C0A0F">极速版</a>
    <a class="active">触屏版</a>
    <a href="javascript:void(0)/sys/log?fr=hao123&amp;v=4&amp;uid=7320A0F6466807D828128E93935C0A0F&amp;bck=228&amp;url=https%3A%2F%2Fitunes.apple.com%2Fcn%2Fapp%2Fpandareader%2Fid327313778%3Fl%3Den%26mt%3D8%26datestamp%3D1467264197">客户端</a>
   </div>
   <div class="foot_four">
    &copy;2016百度书城
   </div>
  </footer> 
  <script type="text/javascript"> 
     /*创建于2016-06-14*/ 
     var cpro_id = "u2671677";
</script> 
  
 </body>
</html>