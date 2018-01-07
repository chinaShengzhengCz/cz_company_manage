<?PHP exit('Access Denied');?>
<!--{if $param['login']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{eval $comiis_bg = 1;$comiis_app_switch = $_G['cache']['comiis_app_switch'];$comiis_app_nav = $_G['cache']['comiis_app_nav'];}-->
<!--{template common/header}-->
<!--{if $_G['inajax']}-->
	<!--{if $_GET['ac'] == 'privacy'}-->
		$show_message
	<!--{else}-->
		<div class="comiis_tip bg_f cl">
			<dt class="f_b" id="messagetext">
				<p>$show_message</p>
			</dt>
			<!--{if $_G['forcemobilemessage']}-->
				<dd class="b_t f_14 cl">
					<a href="{$_G['setting']['mobile']['pageurl']}" class="tip_btn bg_f f_b">{lang continue}</a>
					<a href="javascript:history.back();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang goback}</span></a>
				</dd>
			<!--{/if}-->
			<!--{if $url_forward && !$_GET['loc']}-->
				<script type="text/javascript">
					setTimeout(function() {
						window.location.href = '$url_forward';
					}, '3000');
				</script>
			<!--{elseif $allowreturn}-->
				<dd class="b_t cl"><a href="javascript:;" onclick="popup.close();" class="tip_btn tip_all bg_f f_b"><span>{lang close}</span></dd>
			<!--{/if}-->
		</div>
	<!--{/if}-->
<!--{else}-->
	<div class="comiis_jump">
		<h2>{lang notice}</h2>
		<p class="f_b">$show_message</p>
		<!--{if $_G['forcemobilemessage']}-->
		<p>
			<a href="{$_G['setting']['mobile']['pageurl']}" class="bg_0 f_f">{lang continue}</a>
			<a href="javascript:history.back();" class="bg_0 f_f">{lang goback}</a>
		</p>
		<!--{/if}-->
		<!--{if $url_forward}-->
		<p><a class="bg_0 f_f" href="$url_forward">{lang message_forward_mobile}</a></p>
		<script>
			setTimeout(function() {
				window.location.href = '$url_forward';
			}, 1000);
		</script>
		<!--{elseif $allowreturn}-->
		<p><a class="bg_0 f_f" href="javascript:history.back();">{lang message_go_back}</a></p>
		<script>
			setTimeout(function() {
				history.back();
			}, 3000);
		</script>
		<!--{/if}-->
	</div>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->