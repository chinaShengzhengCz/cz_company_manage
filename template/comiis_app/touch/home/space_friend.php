<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{template home/comiis_friend_nav}-->
<!--{if $_GET['view']=='blacklist'}-->
	<div class="comiis_crezz mt10 bg_f b_t cl">
		<form method="post" autocomplete="off" name="blackform" action="home.php?mod=spacecp&ac=friend&op=blacklist&start=$_GET[start]">						
			<li class="comiis_styli cl">{lang add_blacklist}</li>
			<li class="comiis_stylino cl"><input type="text" name="username" value="" placeholder="{lang username}" class="comiis_input b_b" style="padding-bottom:10px;" /></li>
			<li class="comiis_p12 b_b cl"><button type="submit" name="blacklistsubmit_btn" id="moodsubmit_btn" value="true" class="comiis_btn bg_0 f_f formdialog">{lang add}</button></li>
			<input type="hidden" name="blacklistsubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
		</form>
	</div>
<!--{/if}-->
<!--{if $list}-->
	<div class="comiis_friend mt10 bg_f b_t b_b cl">
		<ul>
		<!--{eval comiis_load('ASpHMJxbjb00I060xH', 'list');}-->
		</ul>					
	</div>
<!--{/if}-->
	<script>	
	function succeedhandle_delfriendhk(a,b,c) {
		$('#comiis_friendbox_'+c['uid']).remove();
		comiis_afrfriendhk_tip();
		popup.open('{$comiis_lang['tip33']}', 'alert');
	}
	function errorhandle_delfriendhk(a,b) {
		popup.open(a, 'alert');
	}	
	function succeedhandle_editnote(a,b,c) {
		$('#friend_bz_'+c['uid']).html(c['note']);
		popup.open('{$comiis_lang['tip3']}', 'alert');
	}
	function errorhandle_editnote(a,b) {
		popup.open(a, 'alert');
	}	
	function succeedhandle_hotuserhk(a,b,c) {
		$('#spannum_'+c['fuid']).html(c['num']);
		popup.open('{$comiis_lang['tip3']}', 'alert');
	}
	function errorhandle_hotuserhk(a,b) {
		popup.open(a, 'alert');
	}	
	function succeedhandle_editgrouphk(a,b,c) {
		popup.open('{$comiis_lang['tip3']}', 'alert');
	}
	function errorhandle_editgrouphk(a,b) {
		popup.open(a, 'alert');
	}	
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
				$('#a_followmod_' + comiis_list_follow_uid).html('{$comiis_lang['all4']}').attr('href','home.php?mod=spacecp&ac=follow&op=del&fuid='+comiis_list_follow_uid+'&hash={FORMHASH}&from=a_followmod_'+comiis_list_follow_uid+'&handlekey=followmod').removeClass('bg_0 f_f').addClass('bg_b f_c');
				if(s.lastChild.firstChild.nodeValue.indexOf("{$comiis_lang['tip34']}") >= 0){
					b = '{$comiis_lang['tip1']}';
				}
			}else if(s.lastChild.firstChild.nodeValue.indexOf("'type':'del'") > 0){
				$('#a_followmod_' + comiis_list_follow_uid).html('{$comiis_lang['all3']}ta').attr('href','home.php?mod=spacecp&ac=follow&op=add&fuid='+comiis_list_follow_uid+'&hash={FORMHASH}&from=a_followmod_'+comiis_list_follow_uid+'&handlekey=followmod').removeClass('bg_b f_c').addClass('bg_0 f_f');
				if(s.lastChild.firstChild.nodeValue.indexOf("{$comiis_lang['tip35']}") >= 0){
					b = '{$comiis_lang['tip2']}';
				}
			}
			popup.open(b, 'alert');
		});
	}
	function comiis_afrfriendhk_tip() {
		if($('.comiis_friend li').length < 1) {
			$('.comiis_notip').css('display','block');
			$('.comiis_friend').css('display','none');
		}
	}
	</script>
	<!--{if $multi}--><div class="cl">$multi</div><!--{/if}-->
	<div class="comiis_notip comiis_sofa mt10 bg_f b_t b_b cl"{if $list} style="display:none;"{/if}>
		<i class="comiis_font f_e cl">&#xe613;</i>
		<span class="f_d">{lang no_friend_list}</span>
	</div>	
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
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->