<?PHP exit('Access Denied');?>
<!--{if !$tagname}--><!--{eval $comiis_bg = 1}--><!--{/if}-->
<!--{template common/header}-->
<!--{if $tagname}-->
<!--{if !$_GET['inajax']}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:40px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
	<ul class="comiis_flex">
		<li class="flex{if empty($showtype) || $showtype == 'thread'} kmon{/if}"><a href="misc.php?mod=tag&id=$id&type=thread"{if empty($showtype) || $showtype == 'thread'} class="b_0 f_0"{else} class="f_c"{/if}>{lang related_thread}</a></li>
		<li class="flex{if helper_access::check_module('blog') && (empty($showtype) || $showtype == 'blog')} kmon{/if}"><a href="misc.php?mod=tag&id=$id&type=blog"{if helper_access::check_module('blog') && (empty($showtype) || $showtype == 'blog')} class="b_0 f_0"{else} class="f_c"{/if}>{lang related_blog}</a></li>
	</ul>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<!--{/if}-->
<!--{eval comiis_load('ySY1Zq0eDE1n9rfOd2', 'showtype,threadlist,id,count,tpp,multipage,page,comiis_page,comiis_app_list_num,bloglist');}-->
<!--{else}-->
<div class="comiis_search bg_e b_b cl">
<table width="100%" cellspacing="0" cellpadding="0">
	<tbody>
		<form method="post" action="misc.php?mod=tag&type=thread">
			<tr>
				<td><input type="text" name="name" class="ss_input" value="" placeholder="{lang search}{lang tag}"></td>
				<td width="60"><input type="submit" value="{lang search}" class="ss_btn"></td>
			</tr>
		</form>
	</tbody>
</table>
</div>
<div class="comiis_tagtit b_b f_c">{lang tag}: $searchtagname</div>
<div class="comiis_notip cl">
	<i class="comiis_font f_e cl">&#xe613;</i>
	<span class="f_d">{lang empty_tags}</span>
</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->