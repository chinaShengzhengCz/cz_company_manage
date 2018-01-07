<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET['from']=='space'}-->
	<!--{template home/space_header}-->
<!--{else}-->
    <!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
	<div class="comiis_topnv bg_f b_b">
		<ul class="comiis_flex">
			<li class="flex{if $actives[me]} kmon{/if}"><a href="{if $_G['uid']}home.php?mod=space&do=blog&view=me{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $actives[me]} class="b_0 f_0"{else} class="f_c"{/if}>{lang my_blog}</a></li>
			<li class="flex{if $actives[we]} kmon{/if}"><a href="{if $_G['uid']}home.php?mod=space&do=blog&view=we{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"{if $actives[we]} class="b_0 f_0"{else} class="f_c"{/if}>{lang friend_blog}</a></li>        
			<li class="flex{if $actives[all]} kmon{/if}"><a href="home.php?mod=space&do=blog&view=all"{if $actives[all]} class="b_0 f_0"{else} class="f_c"{/if}>{lang view_all}</a></li>
		</ul>
	</div>
	<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{if $count}-->
	<!--{eval comiis_load('zysbGCQMXuggYx913U', 'list,stickflag,space,diymode,multi');}-->
<!--{else}-->
	<div class="comiis_notip comiis_sofa mt15 cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang no_related_blog}</span>
	</div>
<!--{/if}-->
<!--{if $_GET['from']=='space'}-->
	<!--{if $space[uid] == $_G[uid]}-->
	<div class="cl" style="height:40px;"></div>
	<div class="comiis_space_footfb bg_f b_t">
		<a href="home.php?mod=spacecp&ac=blog"><i class="comiis_font f_wb">&#xe62d;</i><span class="f_b">{lang publish}{lang blog}</span></a>
	</div>
	<!--{else}-->
	<!--{template home/space_footer}-->
	<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->