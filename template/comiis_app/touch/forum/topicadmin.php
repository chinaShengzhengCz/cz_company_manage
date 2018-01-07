<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_tip bg_f cl">
<form id="moderateform" method="post" autocomplete="off" action="forum.php?mod=topicadmin&action=moderate&optgroup=$optgroup&modsubmit=yes&mobile=2" >
	<input type="hidden" name="frommodcp" value="$frommodcp" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="fid" value="$_G[fid]" />
	<input type="hidden" name="redirect" value="{echo dreferer()}" />
	<!--{loop $threadlist $thread}-->
		<input type="hidden" name="moderate[]" value="$thread[tid]" />
	<!--{/loop}-->	
	<input type="hidden" name="reason" value="{lang topicadmin_mobile_mod}" />
	<!--{if $_GET['optgroup'] == 1}-->
		<!--{eval comiis_load('PWNCy9sKnN6WNn8S8X', 'threadlist,defaultcheck,stickcheck,expirationstick,digestcheck,expirationdigest,stylecheck,colorcheck,highlight_bgcolor,expirationhighlight');}-->
	<!--{elseif $_GET['optgroup'] == 2}-->
		<!--{eval comiis_load('hJomcLmJoW6cC622pc', 'operation,forumselect,typeselect');}-->
	<!--{elseif $_GET['optgroup'] == 3}-->
		<!--{if $operation == 'delete'}-->
			<!--{if $_G['group']['allowdelpost']}-->
				<input name="operations[]" type="hidden" value="delete"/>
				<dt class="f_b"><p>{lang admin_delthread_confirm}</p></dt>
					<!--{if ($modpostsnum == 1 || $authorcount == 1) && $crimenum > 0}-->
						<dt class="f_b"><p>{lang topicadmin_crime_delpost_nums}</p></dt>
					<!--{/if}-->
			<!--{else}-->
				<dt class="f_b"><p>{lang admin_delthread_nopermission}</p></dt>
			<!--{/if}-->
		<!--{elseif $operation == 'down' || $operation='bump'}-->
			<div class="tip_tit bg_e mb5 f_b b_b">{lang modmenu_updown}</div>
			<dt class="comiis_input_style comiis_tip_radios kmlabs f_b">			
				<input type="radio" id="operations_bump" name="operations[]" value="bump" checked="checked" />
				<label for="operations_bump"><i class="comiis_font"></i>{lang admin_bump}</label>
				<div class="comiis_flex cl">
					<div class="styli_tit f_c">{lang expire}</div>
					<div class="flex"><input type="text" name="expirationbump" id="expirationbump" autocomplete="off" value="" tabindex="1" class="comiis_dateshow kmshow comiis_inputs b_b f_c" /></div>
					<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647;</i></a></div>
				</div>
				<input type="radio" id="operations_down" name="operations[]" value="down" />
				<label for="operations_down" class="mt10"><i class="comiis_font"></i>{lang admin_down}</label>			
			</dt>
		<!--{/if}-->
	<!--{elseif $_GET['optgroup'] == 4}-->
			<div class="tip_tit bg_e mb5 f_b b_b"><!--{if $closecheck[0]}-->{lang modmenu_switch_off}<!--{else}-->{lang modmenu_switch_on}<!--{/if}--></div>
			<dt class="kmlabs f_b">
				<div class="comiis_flex cl">
					<div class="styli_tit f_c">{lang expire}</div>
					<div class="flex"><input type="text" name="expirationclose" id="expirationclose" class="comiis_dateshow kmshow comiis_inputs b_b f_c" autocomplete="off" value="$expirationclose" /></div>
					<div class="styli_r f_c"><a href="javascript:;" onclick="$('.comiis_dateshow').val('');"><i class="comiis_font f_g">&#xe647;</i></a></div>
				</div>
				<div class="comiis_input_style comiis_tip_radios mt10">			
					<input type="radio" name="operations[]" value="open" $closecheck[0] id="comiis_gbzt_1" />
					<label for="comiis_gbzt_1"><i class="comiis_font{if $closecheck[0]} f_0{else} f_d{/if}"><!--{if $closecheck[0]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>{lang admin_open}</label>					
					<input type="radio" name="operations[]" value="close" $closecheck[1] id="comiis_gbzt_2" />
					<label for="comiis_gbzt_2"><i class="comiis_font{if $closecheck[1]} f_0{else} f_d{/if}"><!--{if $closecheck[1]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>{lang admin_close}</label>
				</div>
			</dt>			
	<!--{/if}-->	
	<!--{if empty($hiddensubmit)}-->
		<dd class="b_t cl">
			<input type="submit" name="modsubmit" id="modsubmit"  value="{lang confirms}" class="formdialog tip_btn bg_f f_b">
			<a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>	
		</dd>
	<!--{/if}-->
</form>
</div>
<script>
comiis_input_style();
function succeedhandle_mods(locationhref) {
	popup.open('{$comiis_lang['tip27']}', 'alert');
	setTimeout(function() {
	<!--{if !empty($_GET[from])}-->
		location.href = 'forum.php?mod=viewthread&tid=$_GET[from]&extra=$_GET[listextra]';
	<!--{else}-->
		location.href = locationhref;
	<!--{/if}-->
	}, 888);
}
function switchhl(obj, v) {
	if(parseInt($('.highlight_style_' + v).val())) {
		$('.highlight_style_' + v).val(0);
		obj.className = obj.className.replace(/ bg_del f_f/, '');
	} else {
		$('.highlight_style_' + v).val(1);
		obj.className += ' bg_del f_f';
	}
}
function set_color_style(k, c) {
	$('.highlight_color').val(k);
	$('.set_color_style').css('background-color', c);
}
</script>
<!--{template common/footer}-->