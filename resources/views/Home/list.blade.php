@include('Home.header')
<div class="all_title down-top0">
		<span style="">小说分类</span>
	</div>
	@foreach($CategorySort as $v )
	
	<div class="new-fenlei_list">
		<div class="lf_left " onclick="location.href='list1.htm'">
			<span class="color-01">{{$v->sortname}}</span>
	</div>
</div>

	@endforeach
<script type="text/javascript">
	$('.New-nav .active').removeClass('active');

	$('.New-nav > a').eq(1).addClass('active');

</script>
        

@include('Home.footer')