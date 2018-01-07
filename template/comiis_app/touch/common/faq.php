<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{eval require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_faq.php'}-->
<!--{if $_GET['op'] == 'recommend'}-->
	<div class="comiis_userlist bg_f cl">
		<ul>
		<!--{loop $comiis_all_recommend $key $temp}-->
			<li class="b_b"><a href="home.php?mod=space&uid={$temp['uid']}&do=profile" class="kmdbt"><i class="comiis_font f_d">&#xe60c;</i><img src="<!--{avatar($temp['uid'], small, true)}-->">{$temp['username']}</a></li>		
		<!--{/loop}-->
		</ul>
	</div>
	<!--{if $key > 12}-->
	<div class="comiis_loadbtn f_d">{$comiis_lang['all21']}</div>
	<!--{/if}-->	
	<!--{eval $comiis_foot = 'no';}-->
<!--{elseif $_GET['op'] == 'activitylist'}-->
<script src="template/comiis_app/comiis/js/comiis_swiper.min.js?{VERHASH}"></script>
<div class="comiis_top_sub2 bg_f b_b cl">
	<ul class="comiis_activity_swipertitle">
		<li class="kmon b_0 f_0"><a href="javascript:;">{$comiis_lang['tip20']}</a></li>
		<li><a href="javascript:;">{$comiis_lang['tip21']}</a></li>
	</ul>	
</div>
<div class="comiis_activity_swiper swiper-container-horizontal">
	<div class="swiper-wrapper comiis_optimization">
		<div class="swiper-slide">
			<!--{if $comiis_ctivity_ys}-->
				<div class="comiis_top_subtxt f_c">{$comiis_lang['tip22']}: {$comiis_ctivity_ys}</div>
				<div class="comiis_activitylist_box bg_f b_t b_b cl">
					<ul>
						<!--{loop $comiis_ctivity_y $temp}-->
							<li class="b_t">		
								<a href="home.php?mod=space&uid={$temp['uid']}&do=profile">
									<i class="comiis_font f_d">&#xe60c;</i>
									<img src="{$_G['setting']['ucenterurl']}/avatar.php?uid={$temp['uid']}&size=middle">
									<div class="z">
										<h2 class="f_0">{$temp['username']}<em class="f_d"><!--{if $temp['payment'] >= 0}-->{$temp['payment']} {$comiis_lang['tip23']}<!--{else}-->{$comiis_lang['tip24']}<!--{/if}--></em></h2>
										<!--{if $temp['message']}--><span class="kmly f_c">{$temp['message']}</span><!--{/if}-->
										<span class="f_d">{echo date('Y-m-d h:i', $temp['dateline']);}</span>
									</div>
								</a>
							</li>
						<!--{/loop}-->
					</ul>
				</div>
				<!--{if $comiis_ctivity_ys > 10}-->
					<div id="comiis_loading" class="f_d">{$comiis_lang['all21']}</div>
				<!--{/if}-->
			<!--{else}-->
				<div class="comiis_notip cl">
					<i class="comiis_font f_e cl">&#xe613;</i>
					<span class="f_d">{$comiis_lang['all22']}</span>
				</div>
			<!--{/if}-->
		</div>
		<div class="swiper-slide">
			<!--{if $comiis_ctivity_ns}-->
				<div class="comiis_top_subtxt f_c">{$comiis_lang['tip22']}: {$comiis_ctivity_ns}</div>
				<div class="comiis_activitylist_box bg_f b_t b_b cl">
					<ul>
						<!--{loop $comiis_ctivity_n $temp}-->
							<li class="b_t">		
								<a href="home.php?mod=space&uid={$temp['uid']}&do=profile">
									<i class="comiis_font f_d">&#xe60c;</i>
									<img src="{$_G['setting']['ucenterurl']}/avatar.php?uid={$temp['uid']}&size=middle">
									<div class="z">
										<h2 class="f_0">{$temp['username']}<em class="f_d"><!--{if $temp['payment'] >= 0}-->{$temp['payment']} {$comiis_lang['tip23']}<!--{else}-->{$comiis_lang['tip24']}<!--{/if}--></em></h2>
										<!--{if $temp['message']}--><span class="kmly f_c">{$temp['message']}</span><!--{/if}-->
										<span class="f_d">{echo date('Y-m-d h:i', $temp['dateline']);}</span>
									</div>
								</a>
							</li>
						<!--{/loop}-->
					</ul>
				</div>
				<!--{if $comiis_ctivity_ns > 10}-->
					<div id="comiis_loading" class="f_d">{$comiis_lang['all21']}</div>
				<!--{/if}-->
			<!--{else}-->
				<div class="comiis_notip cl">
					<i class="comiis_font f_e cl">&#xe613;</i>
					<span class="f_d">{$comiis_lang['all22']}</span>
				</div>
			<!--{/if}-->
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	var mySwiper = new Swiper('.comiis_activity_swiper',{
		onTouchMove: function(swiper){
			Comiis_Touch_on = 3;
			if(mySwiper.isBeginning){
				mySwiper.lockSwipeToPrev();
			}
		},
		onTouchEnd: function(swiper){
			mySwiper.unlockSwipeToPrev();		
			Comiis_Touch_on = 1;
			if(mySwiper.isBeginning){
				comiis_SwiperX = mySwiper.touches['currentX'] - mySwiper.touches['startX'];
				comiis_SwiperY = mySwiper.touches['currentY'] - mySwiper.touches['startY'];
				if(comiis_SwiperX > 100 && comiis_SwiperX > comiis_SwiperY && comiis_SwiperY < 20){
					Comiis_Touch_openleftnav = 1;
					Comiis_Touch_endtime = new Date().getTime();
					if(Comiis_Touch_openleftnav == 1 && (Comiis_Touch_endtime - Comiis_Touch.Touchstime) < 500){
						Comiis_Touch_openleftnav = 0;
						comiis_leftnv();
					}
					Comiis_Touch_openleftnav = 0;					
				}
			}
		},
		onSlideChangeStart: function(){
			$(".comiis_activity_swipertitle .kmon").removeClass('kmon b_0 f_0');
			$(".comiis_activity_swipertitle li").eq(mySwiper.activeIndex).addClass('kmon b_0 f_0');
		},
		onTouchMoveOpposite: function(swiper, event){
			Comiis_Touch_on = 3;
		},
	});
	$(".comiis_activity_swipertitle li").on('touchstart mousedown',function(e){
		e.preventDefault();
		$(".comiis_activity_swipertitle .kmon").removeClass('kmon b_0 f_0');
		$(this).addClass('kmon b_0 f_0');
		mySwiper.slideTo($(this).index());
	}).click(function(e){
		e.preventDefault();
	});
});
</script>
<!--{/if}-->
<!--{template common/footer}-->