<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $comments}-->
	<h2><i class="comiis_font f_c z">&#xe680;</i> {lang comments}</h2>
	<div class="comiis_plli b_t cl">
	<!--{loop $comments $comment}-->
		<dl class="b_t cl">
			<dt>
				<!--{if $comment['authorid']}-->
					<a href="home.php?mod=space&uid=$comment[authorid]profile"><img src="<!--{avatar($comment[authorid], middle, true)}-->" class="top_tximg"></a>
					<!--{else}-->
					<img src="<!--{avatar(0, middle, true)}-->" class="top_tximg">
				<!--{/if}-->
				<h2>
					<!--{if $comment['authorid']}-->
						<a class="top_user f_b" href="home.php?mod=space&uid=$comment[authorid]profile">$comment[author]</a>
					<!--{else}-->
						<span class="top_user f_b">{lang guest}</span>
					<!--{/if}-->
				</h2>
				<span class="top_time f_d">$comment[dateline]</span>
			</dt>
			<dd>$comment[comment]</dd>
		</dl>
	<!--{/loop}-->
	</div>
<!--{/if}-->
$multi
<!--{template common/footer}-->