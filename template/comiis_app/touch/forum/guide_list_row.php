<?PHP exit('Access Denied');?>
<!--{if $list['threadcount']}-->
	<ul class="hotlist">
		<!--{loop $list['threadlist'] $key $thread}-->
			<li>
				<a href="forum.php?mod=viewthread&tid=$thread[tid]&fromguid=hot&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
					<!--{if !$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])}-->
							<!--{eval $thread[tid]=$thread[closed];}-->
					<!--{/if}-->
					$thread[typehtml] $thread[sorthtml]
					$thread[subject]
					<span class="by">$thread[author]</span>
					<span class="num"><!--{if $thread['isgroup'] != 1}-->$thread[replies]<!--{else}-->{$groupnames[$thread[tid]][replies]}<!--{/if}--></span>
					<!--{if $thread['digest'] > 0}-->
						<span class="icon_top"><img src="{STATICURL}image/mobile/images/icon_digest.png"></span>
					<!--{elseif $thread['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0}-->
						<span class="icon_tu"><img src="{STATICURL}image/mobile/images/icon_tu.png"></span>
					<!--{/if}-->
				</a>
			</li>
		<!--{/loop}-->
	</ul>
<!--{else}-->
	<p>{lang guide_nothreads}</p>
<!--{/if}-->
