<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $do != 'feed'}-->
<!--{template home/comiis_friend_nav}-->
<!--{if in_array($do, array('following', 'follower'))}-->
	<script>
	<!--{if $do=='following'}-->
	function succeedhandle_following(a,b,c) {
		$('#comiis_friendbox_'+c['fuid']).remove();
		if($('.comiis_friend li').length < 1) {
			$('.comiis_notip').css('display','block');
			$('.comiis_friend').css('display','none');
		}
		popup.open('{$comiis_lang['tip2']}', 'alert');
	}
	function errorhandle_following(a,b) {
		popup.open(a, 'alert');
	}		
	function succeedhandle_specialfollow(a,b,c) {
		$('#a_specialfollow_'+c['fuid']).text(c['special'] == 1 ? '{$comiis_lang['tip184']}' : '{$comiis_lang['tip185']}').attr('href', 'home.php?mod=spacecp&ac=follow&op=add&handlekey=specialfollow&hash={FORMHASH}&special='+c['special']+'&fuid='+c['fuid']);
		popup.open((c['special'] == 1 ? '{$comiis_lang['tip185']}' : '{$comiis_lang['tip184']}') + '{$comiis_lang['tip188']}', 'alert');
	}
	<!--{/if}-->
	</script>
	<!--{if $list}-->
		<div class="comiis_friend mt12 bg_f b_t b_b cl">
			<ul>
			<!--{eval comiis_load('nKK8II2K71k3IKHu28', 'list,do,viewself');}-->
			</ul>
		</div>
		<!--{if !empty($multi)}--><div class="cl">$multi</div><!--{/if}-->		
		<div id="comiis_followmod" style="display:none;">
		<div class="comiis_tip bg_f cl">
			<dt class="f_b">
				<p>{$comiis_lang['all10']}?</p>
			</dt>	
			<dd class="b_t cl">
				<a href="javascript:comiis_list_followmod();" class="tip_btn bg_f f_b"><span>{$comiis_lang['all8']}</span></a>
				<a href="javascript:popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{$comiis_lang['all9']}</span></a>
			</dd>
		</div>
		</div>		
		<script>
		$(document).ready(function() {
			$('.user_gz').on('click', function() {
				comiis_list_follow_obj = $(this);
				if(comiis_list_follow_obj.attr('href').indexOf('op=del') > 0){
					popup.open($('#comiis_followmod'));
				}else{
					comiis_list_followmod();
				}
				return false;
			});
		});
		var comiis_list_follow_obj;
		function comiis_list_followmod() {
			var comiis_list_follow_url = comiis_list_follow_obj.attr('href'),
			comiis_list_follow_uid = comiis_list_follow_obj.attr('uid');
			$.ajax({
				type:'GET',
				url: comiis_list_follow_url + '&inajax=1' ,
				dataType:'xml',
			}).success(function(s) {
				var b;
				if(s.lastChild.firstChild.nodeValue.indexOf("'type':'add'") > 0){
					$('#comiis_friendtip_'+comiis_list_follow_uid).text('{lang follow_follower_mutual}');
					$('#a_followmod_'+comiis_list_follow_uid).text('{$comiis_lang['all4']}').attr('href', 'home.php?mod=spacecp&ac=follow&op=del&fuid='+comiis_list_follow_uid+'&handlekey=follower').removeClass('bg_0 f_f').addClass('bg_b f_c');
					if(s.lastChild.firstChild.nodeValue.indexOf("{$comiis_lang['tip34']}") >= 0){
						b = '{$comiis_lang['tip1']}';
					}
				}else if(s.lastChild.firstChild.nodeValue.indexOf("'type':'del'") > 0){
					$('#comiis_friendtip_'+comiis_list_follow_uid).text('');
					$('#a_followmod_'+comiis_list_follow_uid).text('{$comiis_lang['all3']}ta').attr('href', 'home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid='+comiis_list_follow_uid+'&handlekey=follower').removeClass('bg_b f_c').addClass('bg_0 f_f');
					if(s.lastChild.firstChild.nodeValue.indexOf("{$comiis_lang['tip35']}") >= 0){
						b = '{$comiis_lang['tip2']}';
					}
				}
				popup.open(b, 'alert');
			});
		}
		</script>
	<!--{/if}-->
		<div class="comiis_notip comiis_sofa mt12 bg_f b_t b_b cl"{if $list} style="display:none"{/if}>
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_friend_list}</span>
		</div>
<!--{/if}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->