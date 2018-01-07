<?PHP exit('Access Denied');?>
<!--{eval $comiis_bg = 1}-->
<!--{template common/header}-->
<!--{if $type != 'countitem'}-->
<div class="comiis_search bg_e b_b cl bowo">
<form method="post" action="misc.php?mod=tag&type=thread">
	<div class="comiis_ssbox comiis_flex">
		<div class="ssbox_input flex ssbox_tagl bg_f b_l b_t b_b"><input type="text" name="name" class="comiis_input f_c" value="" placeholder="{lang enter_content}"></div>
		<div class="comiis_ssbox_y">
			<input type="hidden" name="searchsubmit" value="yes">
			<button type="submit" value="true" class="ss_btns bg_a f_f"><i class="comiis_font">&#xe622;</i></button>
		</div>
	</div>
</form>
</div>
<!--{if $comiis_app_switch['comiis_tagtimgs']}-->$comiis_app_switch['comiis_tagtimgs']<!--{/if}-->
<div class="comiis_search_hot cl">
<!--{if $tagarray}-->
	<!--{eval $color = array(' ', 'color1', 'color2', 'color3', 'color4', 'color5');}-->
	<div class="comiis_search_hot_a cl">	
	<!--{loop $tagarray $tag}-->
		<a href="misc.php?mod=tag&id=$tag[tagid]&type=thread" title="$tag[tagname]" class="comiis_xifont {echo $color[array_rand($color,1)];}"><span class="f_b">$tag[tagname]</span></a>
	<!--{/loop}-->
	</div>
<!--{else}-->
	<div class="comiis_notip cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang no_tag}</span>
	</div>
<!--{/if}-->	
</div>
<!--{else}-->
$num
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->