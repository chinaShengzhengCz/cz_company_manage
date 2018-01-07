<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:{if $view == 'mypost' || $view == 'interactive'}80{else}40{/if}px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub">
			<ul class="swiper-wrapper">
				<!--{loop $_G['notice_structure'] $key $type}-->
				<li class="swiper-slide{if $opactives[$key]} kmon{/if}"><a href="home.php?mod=space&do=notice&view=$key"{if $opactives[$key]} class="b_0 f_0"{else} class="f_c"{/if}><!--{eval echo lang('template', 'notice_'.$key)}--><!--{if $_G['member']['category_num'][$key]}--> $_G['member']['category_num'][$key]<!--{/if}--></a></li>
				<!--{/loop}-->
			</ul>
		</div>
	</div>
</div>
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
<!--{if $view == 'mypost' || $view == 'interactive'}-->
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub_btn">
			<ul class="swiper-wrapper">
				<!--{if $_G['notice_structure'][$view] && ($view == 'mypost' || $view == 'interactive')}-->
					<!--{loop $_G['notice_structure'][$view] $key $subtype}-->
						<li class="swiper-slide{if $readtag[$subtype]} kmon{/if}"><!--{if $key !=0}--><span class="comiis_tm f_d">/</span><!--{/if}--><a href="home.php?mod=space&do=notice&view=$view&type=$subtype"{if $readtag[$subtype]} class="f_0"{else} class="f_d"{/if}><!--{eval echo lang('template', 'notice_'.$view.'_'.$subtype)}--><!--{if $_G['member']['newprompt_num'][$subtype]}--> $_G['member']['newprompt_num'][$subtype]<!--{/if}--></a></li>
					<!--{/loop}-->
				<!--{else}-->
					<li class="swiper-slide"><!--{if $key !=0}--><span class="comiis_tm f_d">/</span><!--{/if}--><a href="home.php?mod=space&do=notice&view=$view" class="f_a"><!--{eval echo lang('template', 'notice_'.$view)}--></a></li>
				<!--{/if}-->
			</ul>
		</div>
	</div>
</div>
<script>
	var comiis_indexs = $("#comiis_sub_btn li.kmon").offset().left + $("#comiis_sub_btn li.kmon").width() >= $(window).width() ? $("#comiis_sub_btn li.kmon").index() : 0;
	var mySwiper1 = new Swiper('#comiis_sub_btn', {
		freeMode : true,
		slidesPerView : 'auto',
		initialSlide : comiis_indexs,
		onTouchMove: function(swiper){
			Comiis_Touch_on = 0;
		},
		onTouchEnd: function(swiper){
			Comiis_Touch_on = 1;
		},
	});
</script>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{if empty($list)}-->
	<div class="comiis_notip comiis_sofa mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">
			<!--{if $new == 1}-->
				{lang no_new_notice} <a href="home.php?mod=space&do=notice&isread=1">{lang view_old_notice}</a>
			<!--{else}-->
				{lang no_notice}
			<!--{/if}-->
		</span>
	</div>
<!--{/if}-->
<!--{if $list}-->
	<div class="comiis_notice_list">
		<ul>
		<!--{loop $list $key $value}-->
			<li class="b_t b_b bg_f mt10 cl">
				<!--{if $value[authorid]}-->
				<a href="home.php?mod=space&uid=$value[authorid]&do=profile" class="notice_img"><!--{avatar($value[authorid],middle)}--></a>
				<!--{else}-->
				<div class="notice_imgs bg_0"><i class="comiis_font f_f">&#xe650;</i></div>
				<!--{/if}-->
				<h2 class="f_d"><a class="d b dialog y" href="home.php?mod=spacecp&ac=common&op=ignore&authorid=$value[authorid]&type=$value[type]&handlekey=addfriendhk_{$value[authorid]}" id="a_note_$value[id]" title="{lang shield}"><i class="comiis_font f_d">&#xe65d;</i></a><!--{date($value[dateline], 'u')}--></h2>
				<div class="ntc_body">{echo str_replace(array("quote","<strong>","onclick=\"showWindow(this.id, this.href, 'get', 0);\" class=\"xw1\""), array("comiis_quote bg_h f_c","<strong class='f_0'>","class='dialog'"), $value[note]);}</div>
				<!--{if $value[from_num]}-->
				<div class="comiis_quote bg_h f_c">{lang ignore_same_notice_message}</div>
				<!--{/if}-->
			</li>
		<!--{/loop}-->
		<!--{if $view!='userapp' && $space[notifications]}-->
			<a href="home.php?mod=space&do=notice&ignore=all" class="comiis_quote bg_h f_c comiis_hltip">{lang ignore_same_notice_message}</a>
		<!--{/if}-->
		</ul>					
	</div>
	<!--{if $multi}--><div class="cl">$multi</div><!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->