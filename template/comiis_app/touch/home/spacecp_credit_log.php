<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--><div style="height:80px;"><div class="comiis_scrollTop_box"><!--{/if}-->
<div class="comiis_topnv bg_f b_b">
	<ul class="comiis_flex">
		<li class="flex{if $opactives[base]} kmon{/if}"><a href="home.php?mod=spacecp&ac=credit&op=base"{if $opactives[base]} class="b_0 f_0"{else} class="f_c"{/if}>{lang my}</a></li>
		<li class="flex{if $opactives[log]} kmon{/if}"><a href="home.php?mod=spacecp&ac=credit&op=log"{if $opactives[log]} class="b_0 f_0"{else} class="f_c"{/if}>{lang doing}</a></li>
		<!--{if $_G[setting][transferstatus] && $_G['group']['allowtransfer']}-->
		<li class="flex{if $opactives[transfer]} kmon{/if}"><a href="home.php?mod=spacecp&ac=credit&op=transfer"{if $opactives[transfer]} class="b_0 f_0"{else} class="f_c"{/if}>{lang transfer_credits}</a></li>
		<!--{/if}-->
		<!--{if $_G[setting][exchangestatus]}-->
		<li class="flex{if $opactives[exchange]} kmon{/if}"><a href="home.php?mod=spacecp&ac=credit&op=exchange"{if $opactives[exchange]} class="b_0 f_0"{else} class="f_c"{/if}>{lang exchange_credits}</a></li>
		<!--{/if}-->
		<!--{if $_G[setting][ec_ratio] && ($_G[setting][ec_account] || $_G[setting][ec_tenpay_opentrans_chnid] || $_G[setting][ec_tenpay_bargainor]) || $_G['setting']['card']['open']}-->
		<li class="flex{if $opactives[buy]} kmon{/if}"><a href="home.php?mod=spacecp&ac=credit&op=buy"{if $opactives[buy]} class="b_0 f_0"{else} class="f_c"{/if}>{lang buy_credits}</a></li>
		<!--{/if}-->
	</ul>
</div>
<div class="comiis_top_sub bg_f">
	<div id="comiis_top_box" class="b_b">
		<div id="comiis_sub_btn">
			<ul>
				<li><a href="home.php?mod=spacecp&ac=credit&op=log" hidefocus="true"{if $_GET[suboperation] != 'creditrulelog'} class="f_0"{else} class="f_d"{/if}>{lang credit_log}</a></li>
				<li><span class="comiis_tm f_d">/</span><a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditrulelog" hidefocus="true"{if $_GET[suboperation] == 'creditrulelog'} class="f_0"{else} class="f_d"{/if}>{lang credit_log_sys}</a></li>
			</ul>
		</div>
	</div>
</div>
<!--{if $comiis_app_switch['comiis_subnv_top'] != 1}--></div></div><!--{/if}-->
<div class="styli_h10 bg_e b_b"></div>
<!--{if $_GET[suboperation] != 'creditrulelog' && $loglist}-->
	<div class="comiis_credits_log bg_f cl">
		<ul>
			<!--{eval $i = 0;}-->
			<!--{loop $loglist $key $value}-->
			<!--{eval $i++;}-->
			<!--{eval $value = makecreditlog($value, $otherinfo);}-->
			<li class="b_b {if $i % 2 == 0} bg_e{/if}">
				<div class="cre_mun bg_0 f_f">$value['credit']</div>
				<h2><span class="f_d y">$value['dateline']</span><span class="f_d"><!--{if $value['operation']}--><a href="home.php?mod=spacecp&ac=credit&op=log&optype=$value['operation']">$value['optype']</a><!--{else}-->$value['title']<!--{/if}--></span></h2>
				<p class="f_b"><!--{if $value['operation']}-->{echo str_replace(array("<strong>"), array("<strong class='f_0'>"), $value['opinfo']);}<!--{else}-->$value['text']<!--{/if}--></p>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
<!--{elseif $_GET[suboperation] == 'creditrulelog' && $list}-->
	<div class="comiis_credits_log bg_f cl">
		<ul>
			<!--{eval $i = 0;}-->
			<!--{loop $list $key $log}-->
			<!--{eval $i++;}-->
			<li class="xtlist b_b {if $i % 2 == 0} bg_e{/if}">
				<h2><span class="f_d y"><!--{date($log[dateline], 'Y-m-d H:i')}--></span><span class="f_0"><a href="javascript:;">$log[rulename]</a></span></h2>
				<p class="f_c"><!--{loop $_G['setting']['extcredits'] $key $value}--><!--{eval $creditkey = 'extcredits'.$key;}-->$value[title]: $log[$creditkey] &nbsp;<!--{/loop}--></p>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
<!--{else}-->
	<div class="comiis_notip comiis_sofa bg_f b_b cl">
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{$comiis_lang['all22']}</span>
	</div>
<!--{/if}-->
<!--{if $multi}--><div class="cl">$multi</div><!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->