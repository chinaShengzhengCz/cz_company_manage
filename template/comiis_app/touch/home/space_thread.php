<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if !$_GET['inajax']}-->
	<!--{if $_GET['from']=='space'}-->
		<!--{template home/space_header}-->
	<!--{else}-->
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_topnv bg_f b_b">
		<ul class="comiis_flex">
			<li class="flex{if $orderactives[thread]} kmon{/if}"><a href="home.php?mod=space&do=thread&view=me&type=thread"{if $orderactives[thread]} class="b_0 f_0"{else} class="f_c"{/if}>{lang topic}</a></li>
			<li class="flex{if $orderactives[reply]} kmon{/if}"><a href="home.php?mod=space&do=thread&view=me&type=reply"{if $orderactives[reply]} class="b_0 f_0"{else} class="f_c"{/if}>{lang reply}</a></li>
			<li class="flex{if $orderactives[postcomment]} kmon{/if}"><a href="home.php?mod=space&do=thread&view=me&type=postcomment"{if $orderactives[postcomment]} class="b_0 f_0"{else} class="f_c"{/if}>{lang post_comment}</a></li>
		</ul>
	</div>
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
	<!--{/if}-->
<!--{/if}-->
<!--{if $list}-->
<!--{eval $comiis_list_template = 'default_h_style'; include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_list.php';}-->
	<!--{if !$_GET['inajax']}-->
		<script>var formhash = '{FORMHASH}', allowrecommend = '{$_G['group']['allowrecommend']}';</script>
		<script src="template/comiis_app/comiis/js/comiis_forumdisplay.js?{VERHASH}"></script>
		<!--{if $comiis_app_list_num != 10}--><div id="list_new"></div><!--{/if}-->
		<div class="comiis_multi_box bg_f b_t" style="margin-top:10px;">
			<!--{if $multipage && ($comiis_app_switch['comiis_listpage'] == 0 || $page > 1)}-->
				{$multipage}
			<!--{elseif $comiis_app_switch['comiis_listpage'] == 1 && $listcount == $perpage}-->
				<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip5']}</a>
			<!--{elseif $comiis_app_switch['comiis_listpage'] == 2 && $listcount == $perpage}-->
				<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>
			<!--{/if}-->
		</div>
		<script>
		comiis_recommend_addkey();
		<!--{if $comiis_app_switch['comiis_listpage'] > 0 && $page == 1}-->
			var comiis_page = $page;
			var comiis_ispage = 0;
			var comiis_isfy = {if $listcount == $perpage}1{else}0{/if};
			function comiis_list_page(){
				comiis_ispage = 1;
				comiis_page++;
				if(comiis_isfy == 1){
					$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d">{$comiis_lang['tip6']}</div>');
					$.ajax({
						type:'GET',
						
						url: '{$theurl}&page=' + comiis_page + '&inajax=1',
						dataType:'xml',
					}).success(function(s) {
						if(typeof(s.lastChild.firstChild.nodeValue) != "undefined"){
							$('#list_new').append(s.lastChild.firstChild.nodeValue);
							<!--{if $comiis_app_list_num == 10}-->
								var comiis_pic_width = ($(window).width() - 34) / 2;
								$(".comiis_waterfall li[class='bg_f b_ok']").css('width', (comiis_pic_width) + 'px');
								imagesLoaded($('.comiis_waterfall'),function(){
									$('#list_new').masonry('reload');
								});
							<!--{/if}-->			
							if(comiis_isfy == 0){
								$('.comiis_multi_box').html('<div class="comiis_loadbtn f_d">{$comiis_lang['tip31']}</div>');
							}else{
								$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip5']}</a>');
							}
							popup.init();
							comiis_recommend_addkey();
						}else{
							comiis_page--;
							$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip32']}</a>');
						}
						comiis_ispage = 0;
					}).error(function() {
						comiis_page--;
						$('.comiis_multi_box').html('<a href="javascript:;" onclick="comiis_list_page()" class="comiis_loadbtn bg_e f_d">{$comiis_lang['tip32']}</a>');
						comiis_ispage = 0;
					});
				}
			}
			<!--{if $comiis_app_switch['comiis_listpage'] == 2}-->
			var comiis_page_timer;
			$(window).scroll(function(){
				clearTimeout(comiis_page_timer);
				comiis_page_timer = setTimeout(function() {
					var comiis_scroll_bottom = $(window).scrollTop() + $(window).height();
					var comiis_list_bottom = $('#list_new').height() + $('#list_new').offset().top - 200;
					if(comiis_scroll_bottom >= comiis_list_bottom && comiis_ispage == 0){
						comiis_list_page();
					}	
				}, 200);
			});
			<!--{/if}-->
		<!--{/if}-->
		</script>
	<!--{/if}-->
	<script>comiis_isfy = {if $listcount == $perpage}1{else}0{/if};</script>
	<!--{elseif !$_GET['inajax']}-->
		<li class="comiis_notip comiis_sofa mt15 cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_related_posts}</span>
		</li>
	<!--{/if}-->
<!--{if !$_GET['inajax']}-->
	<!--{if $_GET['from']=='space'}-->
		<!--{if $space[uid] == $_G[uid]}-->
		<div class="cl" style="height:41px;"></div>
		<div class="comiis_space_footfb bg_f b_t">
			<a href="javascript:comiis_fmenu('#comiis_fpostmore');"><i class="comiis_font f_wb">&#xe62d;</i><span class="f_b">{lang publish}{lang post}</span></a>
		</div>
		{eval loadcache('forums');}
		<div class="comiis_fmenu" id="comiis_fpostmore" style="display:none;z-index:200;">
			<div class="comiis_fmenubox{if $comiis_app_switch['comiis_post_nav'] == 1} bg_e{else} bg_f{/if}">
				<div class="comiis_gosx_title bg_f b_b cl"><span class="y"><i class="comiis_font f_d" onclick="comiis_fmenu('#comiis_fpostmore');">&#xe639;</i></span>{$comiis_lang['post36']}</div>
				<div class="comiis_over_box comiis_wzpost">
				<!--{if $comiis_app_switch['comiis_post_nav'] == 1}-->
					<ul class="comiis_post_nav">
					{loop $_G['cache']['forums'] $temp}
						{if $temp['status'] == 1}
							{if $temp['type'] == 'forum' || $temp['type'] == 'sub'}
								<li><a href="forum.php?mod=post&action=newthread&fid={$temp['fid']}" class="bg_f b_ok">{$temp['name']}</a></li>
							{/if}
						{/if}
					{/loop}
					</ul>
				<!--{elseif $comiis_app_switch['comiis_post_nav'] == 0}-->
					<ul>
					{loop $_G['cache']['forums'] $temp}
						{if $temp['status'] == 1}
							{if $temp['type'] == 'group'}
								<li class="comiis_stylitit b_b bg_e f_c">{$temp['name']} <span class="comiis_rfid f_d">GID: {$temp['fid']}</span></li>
							{elseif $temp['type'] == 'forum'}
								<li>
									<a href="forum.php?mod=post&action=newthread&fid={$temp['fid']}" class="comiis_styli comiis_flex b_b">
										<div class="flex">{$temp['name']}<span class="comiis_rfid f_d y">fid:{$temp['fid']}</span></div>
										<div class="styli_r"><i class="comiis_font f_d">&#xe60c;</i></div>
									</a>
								</li>
							{elseif $temp['type'] == 'sub'}
								<li>
									<a href="forum.php?mod=post&action=newthread&fid={$temp['fid']}" class="comiis_styli comiis_flex b_b">
										<div class="flex comiis_lp15"><span class="f_c">{$temp['name']}</span><span class="comiis_rfid f_d y">fid:{$temp['fid']}</span></div>
										<div class="styli_r"><i class="comiis_font f_d">&#xe60c;</i></div>
									</a>
								</li>
							{/if}
						{/if}
					{/loop}
					</ul>
				<!--{/if}-->
				</div>
			</div>
		</div>
		<!--{else}-->
		<!--{template home/space_footer}-->
		<!--{/if}-->
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->