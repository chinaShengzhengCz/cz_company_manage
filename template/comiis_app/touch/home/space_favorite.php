<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub">
			<ul class="swiper-wrapper">
				<li class="swiper-slide{if $actives[all]} kmon{/if}"><a href="home.php?mod=space&do=favorite&type=all"{if $actives[all]} class="b_0 f_0"{else} class="f_c"{/if}>{lang favorite_all}</a></li>
				<li class="swiper-slide{if $actives[thread]} kmon{/if}"><a href="home.php?mod=space&do=favorite&type=thread"{if $actives[thread]} class="b_0 f_0"{else} class="f_c"{/if}>{lang favorite_thread}</a></li>
				<li class="swiper-slide{if $actives[forum]} kmon{/if}"><a href="home.php?mod=space&do=favorite&type=forum"{if $actives[forum]} class="b_0 f_0"{else} class="f_c"{/if}>{lang favorite_forum}</a></li>				
				<!--{if helper_access::check_module('group')}--><li class="swiper-slide{if $actives[group]} kmon{/if}"><a href="home.php?mod=space&do=favorite&type=group"{if $actives[group]} class="b_0 f_0"{else} class="f_c"{/if}>{lang favorite_group}</a></li><!--{/if}-->
				<!--{if helper_access::check_module('blog')}--><li class="swiper-slide{if $actives[blog]} kmon{/if}"><a href="home.php?mod=space&do=favorite&type=blog"{if $actives[blog]} class="b_0 f_0"{else} class="f_c"{/if}>{lang favorite_blog}</a></li><!--{/if}-->
				<!--{if helper_access::check_module('album')}--><li class="swiper-slide{if $actives[album]} kmon{/if}"><a href="home.php?mod=space&do=favorite&type=album"{if $actives[album]} class="b_0 f_0"{else} class="f_c"{/if}>{lang favorite_album}</a></li><!--{/if}-->
				<!--{if helper_access::check_module('portal')}--><li class="swiper-slide{if $actives[article]} kmon{/if}"><a href="home.php?mod=space&do=favorite&type=article"{if $actives[article]} class="b_0 f_0"{else} class="f_c"{/if}>{lang favorite_article}</a></li><!--{/if}-->
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<script>
	if($("#comiis_sub li.kmon").length > 0) {
		var comiis_index = $("#comiis_sub li.kmon").offset().left + $("#comiis_sub li.kmon").width() >= $(window).width() ? $("#comiis_sub li.kmon").index() : 0;
	}else{
		var comiis_index = 0;
	}
	mySwiper = new Swiper('#comiis_sub', {
		freeMode : true,
		slidesPerView : 'auto',
		initialSlide : comiis_index,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>
<div class="comiis_mysclist bg_f b_t b_b cl">
	<ul>	
	<!--{if $list}-->
		<!--{loop $list $k $value}-->
		<li class="mysclist_li b_t">
			<a href="home.php?mod=spacecp&ac=favorite&op=delete&favid=$k&type={$_GET[type]}" class="dialog bg_b f_c y"><i class="comiis_font">&#xe67f;</i></a>
			<h2>{$value[icon]}<a href="$value[url]">{$value[title]}</a></h2>
		</li>
		<!--{/loop}-->
	<!--{else}-->
		<li class="comiis_notip comiis_sofa cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_favorite_yet}</span>
		</li>		
	<!--{/if}-->
	</ul>
</div>
<div class="b_t cl">$multi</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->