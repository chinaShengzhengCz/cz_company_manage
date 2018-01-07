<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $op=='changenum'}-->
	<div class="comiis_tip comiis_tip_form bg_f cl">
		<div class="tip_tit bg_e f_b b_b">{lang friend_hot}</div>		
		<form method="post" autocomplete="off" id="changenumform_{$uid}" name="changenumform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=changenum&uid=$uid&changenumsubmit=true">
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<dt class="f_c">
				<div class="tip_form">
					<li class="tip_txt f_c">{lang adjust_friend_hot}</li>
					<li class="nop b_ok f_c cl"><input type="text" name="num" value="$friend[num]" class="comiis_px" /></li>
				</div>
			</dt>	
			<dd class="b_t cl">
				<button type="submit" name="changenumsubmit" value="true" class="formdialog tip_btn bg_f f_b" comiis="handle">{lang determine}</button>
				<a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			</dd>
		</form>
	</div>
<!--{elseif $op=='changegroup'}-->
	<div class="comiis_tip comiis_tip_form bg_f cl">
		<div class="tip_tit bg_e f_b b_b">{lang set_friend_group}</div>	
		<form method="post" autocomplete="off" id="changegroupform_{$uid}" name="changegroupform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=changegroup&uid=$uid&changegroupsubmit_btn=true">
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<input type="hidden" name="changegroupsubmit" value="true" />
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<dt class="kmlabs">	
				<div class="comiis_input_style comiis_tip_radios f_c cl">
					<!--{loop $groups $key $value}-->					
					<input type="radio" id="comiis_group_$key" name="group" value="$key"$groupselect[$key] />
					<label for="comiis_group_$key" style="float:left;width:49.8%"><i class="comiis_font{if $groupselect[$key]} f_0{else} f_d{/if}"><!--{if $groupselect[$key]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>$value</label>
					<!--{/loop}-->
				</div>
			</dt>	
			<dd class="b_t cl">
				<button type="submit" name="changegroupsubmit_btn" value="true"  class="formdialog tip_btn bg_f f_b" comiis="handle">{lang determine}</button>
				<a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			</dd>
		</form>
	</div>
	<script type="text/javascript">comiis_input_style();</script>
<!--{elseif $op=='editnote'}-->
	<div class="comiis_tip comiis_tip_form bg_f cl">
		<div class="tip_tit bg_e f_b b_b">{lang friend_note}</div>		
		<form method="post" autocomplete="off" id="editnoteform_{$uid}" name="editnoteform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=editnote&uid=$uid&editnotesubmit_btn=true">
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="editnotesubmit" value="true" />
			<dt class="f_c">
				<div class="tip_form">
					<li class="tip_txt f_c">{lang friend_note_message}</li>
					<li class="nop b_ok f_c cl"><input type="text" name="note" class="comiis_px" value="$friend[note]" /></li>
				</div>
			</dt>	
			<dd class="b_t cl">
				<button type="submit" name="editnotesubmit_btn" class="formdialog tip_btn bg_f f_b" value="true" comiis="handle">{lang determine}</button>
				<a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			</dd>
		</form>
	</div>	
<!--{elseif $op =='ignore'}--> 
	<div class="comiis_tip bg_f cl">
		<form method="post" autocomplete="off" id="friendform_{$uid}" name="friendform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=ignore&uid=$uid&confirm=1&friendsubmit_btn=true">
			<input type="hidden" name="referer" value="{echo dreferer()}">
			<input type="hidden" name="friendsubmit" value="true" />
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="from" value="$_GET[from]" />
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<dt><p class="f_c">{lang determine_lgnore_friend}</p></dt>
			<dd class="b_t cl">
				<button type="submit" name="friendsubmit_btn" class="formdialog tip_btn bg_f f_b" value="true" comiis="handle">{lang determine}</button>
				<a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			</dd>
		</form>
	</div>
<!--{elseif $op=='request'}-->
	<!--{template home/comiis_friend_nav}-->	
	<!--{if $list}-->
		<div class="comiis_friend mt12 bg_f b_t b_b cl">
			<ul>
			<!--{loop $list $key $value}-->
				<li class="b_t cl" id="comiis_friendbox_$key">
					<div class="tx_img"><a href="home.php?mod=space&uid=$value[fuid]&do=profile"><!--{avatar($value[fuid],middle)}--></a></div>					
					<h2>
						<span class="y f_d"><!--{date($value[dateline], 'n-j H:i')}--></span>
						<a href="home.php?mod=space&uid=$value[fuid]&do=profile">$value[fusername]</a><!--{if $ols[$value[fuid]]}--> <span class="friend_bz f_0">{lang online}</span><!--{/if}-->					
					</h2>
					<!--{if $value[note]}--><div class="friend_quote bg_e f_c">" {$comiis_lang['all39']}: {$value[note]} "</div><!--{/if}-->				
					<div class="friend_gl">											
						<a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[fuid]&handlekey=afrfriendhk" id="afr_$value[fuid]" class="bg_0 f_f dialog">{lang confirm_applications}</a>
						<a href="home.php?mod=spacecp&ac=friend&op=ignore&uid=$value[fuid]&confirm=1&handlekey=delfriendhk" id="afi_$value[fuid]" class="b_ok f_c dialog">{lang ignore}</a>
					</div>
				</li>
			<!--{/loop}-->
			</ul>					
		</div>
	<!--{/if}-->
	<!--{if $multi}--><div class="cl">$multi</div><!--{/if}-->
		<script>
		function succeedhandle_delfriendhk(a,b,c) {
			$('#comiis_friendbox_'+c['uid']).remove();
			comiis_afrfriendhk_tip();
			popup.open('{$comiis_lang['tip44']}', 'alert');
		}
		function succeedhandle_afrfriendhk(a,b,c) {
			$('#comiis_friendbox_'+c['uid']).remove();
			comiis_afrfriendhk_tip();
			popup.open('{$comiis_lang['tip45']} ' +c['username']+ ' {$comiis_lang['tip46']}', 'alert');
		}
		function comiis_afrfriendhk_tip() {
			if($('.comiis_friend li').length < 1) {
				$('.comiis_notip').css('display','block');
				$('.comiis_friend').css('display','none');
			}
		}
		</script>
		<div class="comiis_notip comiis_sofa mt12 bg_f b_t b_b cl"{if $list} style="display:none"{/if}>
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{lang no_new_friend_application}</span>
		</div>
	<!--{eval $comiis_foot = 'no';}-->
<!--{elseif $op=='add2'}-->
	<div class="comiis_tip comiis_tip_form bg_f cl">
		<div class="tip_tit bg_e f_b b_b">{lang approval_the_request}</div>	
		<form method="post" autocomplete="off" id="addratifyform_{$tospace[uid]}" name="addratifyform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=friend&op=add&uid=$tospace[uid]">
			<input type="hidden" name="referer" value="{echo dreferer()}" />
			<input type="hidden" name="add2submit" value="true" />
			<input type="hidden" name="from" value="$_GET[from]" />
			<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<dt class="kmlab f_c" style="padding-top:15px;padding-bottom:0;">{lang approval_the_request_group}:</dt>
			<dt class="kmlabs" style="padding-top:5px;">	
				<div class="comiis_input_style comiis_tip_radios f_c cl">
					<!--{loop $groups $key $value}-->			
					<input type="radio" id="comiis_group_$key" name="group" value="$key"$groupselect[$key] />
					<label for="comiis_group_$key" style="float:left;width:49.8%"><i class="comiis_font{if $groupselect[$key]} f_0{else} f_d{/if}"><!--{if $groupselect[$key]}-->&#xe645;<!--{else}-->&#xe646;<!--{/if}--></i>$value</label>
					<!--{/loop}-->
				</div>
			</dt>	
			<dd class="b_t cl">
				<button type="submit" name="add2submit_btn" value="true"  class="formdialog tip_btn bg_f f_b" comiis="handle">{lang approval}</button>
				<a href="javascript:;" onclick="popup.close();" class="tip_btn bg_f f_b"><span class="tip_lx">{lang cancel}</span></a>
			</dd>
		</form>
	</div>
	<script type="text/javascript">comiis_input_style();</script>
	<!--{elseif $op=='add'}-->
	<!--{eval comiis_load('sTuuelOEEr1OOrCEZO', 'tospace,groups');}-->
<!--{elseif $op=='getinviteuser'}-->
	$jsstr
<!--{/if}-->
<!--{template common/footer}-->