<?PHP exit('Access Denied');?>
<style>.comiis_znalist .user_gz {display:none;}.comiis_footer_scroll {bottom:52px;}</style>
<div class="comiis_space_box tnfx">
	<div id="comiis_head">		
		<div class="comiis_head comiis_space_head f_f cl" style="background-color:rgba(0,0,0,0) !important">
			<div class="header_z"><a href="javascript:;" onclick="history.go(-1);"><i class="comiis_font fyy">&#xe60d;</i></a></div>
			<h2 class="fyy"><!--{if $space[uid] != $_G[uid]}-->Ta {lang someone_space}<!--{else}-->{lang my_space}<!--{/if}--></h2>
			<div class="header_y"><a href="javascript:;" class="comiis_menu_display" id="comiis_menu_tr"><i class="comiis_font fyy">&#xe62b;</i></a></div>
		</div>
	</div>
	<div style="height:48px;"></div>
	<!--{eval}-->
	if(!$space['groupid']){
		loadcache('usergroups', 1);  
		$space = getuserbyuid($space['uid']);
	}
	comiis_load('HAktL1tIaRFER39vre', 'space');
	<!--{/eval}-->
</div>
<div class="comiis_memu_y bg_f f_b" id="comiis_menu_tr_menu" style="display:none;">
	<ul>
		<!--{if $comiis_app_switch['comiis_space_header']==0}-->
		<!--{if helper_access::check_module('follow') && $space[uid] != $_G[uid]}-->
			<!--{eval $follow = 0;}-->
			<!--{eval $follow = C::t('home_follow')->fetch_all_by_uid_followuid($_G['uid'], $space['uid']);}-->
			<!--{if !$follow}-->
				<li><a id="followmod" href="{if $_G['uid']}home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid=$space[uid]{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="{if $_G['uid']}dialog {/if}b_b"><i class="comiis_font">&#xe60e;</i>{$comiis_lang['all3']}Ta</a></li>
			<!--{else}-->
				<li><a id="followmod" href="home.php?mod=spacecp&ac=follow&op=del&fuid=$space[uid]" class="dialog b_b"><i class="comiis_font">&#xe60e;</i>{$comiis_lang['all4']}</a></li>
			<!--{/if}-->
		<!--{/if}-->
		<!--{/if}-->		
		<!--{if $space[uid] != $_G[uid]}-->
		<!--{if $_G['uid']}--><li><a href="home.php?mod=space&uid=$_G[uid]&do=thread&view=me&from=space" class="b_b"><i class="comiis_font">&#xe662;</i>{lang visit_my_space}</a></li><!--{/if}-->
		<!--{else}-->
		<!--{if $_G['comiis_homestyleid']}--><li><a href="plugin.php?id=comiis_app_homestyle" class="b_b"><i class="comiis_font">&#xe612;</i>{lang dress_space}</a></li><!--{/if}-->
		<li><a href="home.php?mod=spacecp" class="b_b"><i class="comiis_font">&#xe655;</i>{lang update_presonal_profile}</a></li>		
		<!--{/if}-->
		<li><a href="index.php"{if $space[uid] != $_G[uid]} class="b_b"{/if}><i class="comiis_font">&#xe657;</i>{lang return_homepage}</a></li>
		<!--{if $space[uid] != $_G[uid]}--><li><a href="{if $_G['uid']}misc.php?mod=report&url={$_G[currenturl_encode]}{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $_G['uid']} class="dialog"{/if}><i class="comiis_font">&#xe636;</i>{$comiis_lang['all2']}</a></li><!--{/if}-->
	</ul>
</div>
<!--{if $comiis_app_switch['comiis_space_nv']==0}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
  <ul class="comiis_flex">
	<li class="flex{if $do=='thread'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=thread&view=me&from=space"{if $do=='thread'} class="b_0 f_0"{else} class="f_c"{/if}>{lang thread}</a></li>
	<!--{if $_G['setting'][blogstatus]}--><li class="flex{if $do=='blog'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=blog&view=me&from=space"{if $do=='blog'} class="b_0 f_0"{else} class="f_c"{/if}>{lang blog}</a></li><!--{/if}-->
	<!--{if $_G['setting'][albumstatus]}--><li class="flex{if $do=='album'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=album&view=me&from=space"{if $do=='album'} class="b_0 f_0"{else} class="f_c"{/if}>{lang album}</a></li><!--{/if}-->
	<!--{if $_G['setting'][wallstatus]}--><li class="flex{if $do=='wall'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=wall&view=me&from=space"{if $do=='wall'} class="b_0 f_0"{else} class="f_c"{/if}>{lang leave_comments}</a></li><!--{/if}-->
	<li class="flex{if $do=='profile'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=profile&view=me&from=space"{if $do=='profile'} class="b_0 f_0"{else} class="f_c"{/if}>{$comiis_lang['view57']}</a></li>
  </ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{elseif $comiis_app_switch['comiis_space_nv']==1}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:45px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b comiis_space_nv">
  <ul class="comiis_flex">
	<li class="flex b_r{if $do=='thread'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=thread&view=me&from=space"{if $do=='thread'} class="b_0 f_0"{else} class="f_c"{/if}><i class="comiis_font">&#xe679;</i>{lang thread}</a></li>
	<!--{if $_G['setting'][blogstatus]}--><li class="flex b_r{if $do=='blog'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=blog&view=me&from=space"{if $do=='blog'} class="b_0 f_0"{else} class="f_c"{/if}><i class="comiis_font">&#xe632;</i>{lang blog}</a></li><!--{/if}-->
	<!--{if $_G['setting'][albumstatus]}--><li class="flex b_r{if $do=='album'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=album&view=me&from=space"{if $do=='album'} class="b_0 f_0"{else} class="f_c"{/if}><i class="comiis_font">&#xe627;</i>{lang album}</a></li><!--{/if}-->
	<!--{if $_G['setting'][wallstatus]}--><li class="flex b_r{if $do=='wall'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=wall&view=me&from=space"{if $do=='wall'} class="b_0 f_0"{else} class="f_c"{/if}><i class="comiis_font">&#xe665;</i>{lang leave_comments}</a></li><!--{/if}-->	
	<li class="flex{if $do=='profile'} kmon{/if}"><a href="home.php?mod=space&uid=$space['uid']&do=profile&view=me&from=space"{if $do=='profile'} class="b_0 f_0"{else} class="f_c"{/if}><i class="comiis_font">&#xe61e;</i>{$comiis_lang['view57']}</a></li>
  </ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<script>
$(window).scroll(function() {
	if($(window).scrollTop() > 100){
		$('.comiis_space_head').attr('style', 'background-color:rgba(0,0,0,1) !important');
	}else{
		var i = $(window).scrollTop() / 100;
		$('.comiis_space_head').attr('style', 'background-color:rgba(0,0,0,'+i+') !important');
	}
});
</script>