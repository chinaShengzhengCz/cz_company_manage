<?PHP exit('Access Denied');?>
<!--{if $comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])}-->
<div id="comiis_post_type" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
	<ul>{eval print_r($_G[forum_thread]);}
		<!--{if !empty($_G['forum']['sortmode']) && $comiis_app_switch['comiis_flxx_list']}-->
		<!--{else}-->
		<!--{if !$_G['forum']['allowspecialonly']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]">{$comiis_lang['post51']}</a></li><!--{/if}-->
		<!--{/if}-->
		<!--{if $_G['group']['allowpostpoll']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=1">{lang post_newthreadpoll}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowpostreward']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=3">{lang post_newthreadreward}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowpostdebate']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=5">{lang post_newthreaddebate}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowpostactivity']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=4">{$comiis_lang['post52']}</a></li><!--{/if}-->
		<!--{if $_G['group']['allowposttrade']}--><li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&special=2">{$comiis_lang['post53']}</a></li><!--{/if}-->
		<!--{if $_G['forum']['threadsorts'] && !$_G['forum']['allowspecialonly']}-->
			<!--{loop $_G['forum']['threadsorts']['types'] $id $threadsorts}-->
				<!--{if $_G['forum']['threadsorts']['show'][$id]}-->
					<li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&extra=$extra&sortid=$id">$threadsorts</a></li>
				<!--{/if}-->
			<!--{/loop}-->
		<!--{/if}-->
		<!--{if $_G['setting']['threadplugins']}-->
			<!--{loop $_G['forum']['threadplugin'] $tpid}-->
				<!--{if array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])}-->
					<li class="bg_f b_b"><a href="forum.php?mod=post&action=newthread&fid=$_G[fid]&specialextra=$tpid">{$_G[setting][threadplugins][$tpid][name]}</a></li>
				<!--{/if}-->
			<!--{/loop}-->
		<!--{/if}-->
		<li><a href="javascript:popup.comiis_close();" class="comiis_glclose mt10 bg_f b_t f_g">{lang cancel}</a></li>
	</ul>
</div>
<!--{/if}-->