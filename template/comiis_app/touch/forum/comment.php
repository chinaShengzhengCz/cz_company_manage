<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<div class="comiis_gosx_title bg_e b_b cl"><span class="y"><i class="comiis_font f_d" onclick="popup.close();">&#xe639;</i></span><span class="f_c">{lang comments}<span></div>
<div class="bg_f" style="padding-top:12px;">
	<form method="post" autocomplete="off" id="commentform" action="forum.php?mod=post&action=reply&comment=yes&tid=$post[tid]&pid=$_GET[pid]&extra=$extra{if !empty($_GET[page])}&page=$_GET[page]{/if}&commentsubmit=yes&infloat=yes">
		<input type="hidden" name="formhash" id="formhash" value="{FORMHASH}" />
		<input type="hidden" name="handlekey" value="$_GET['handlekey']" />
		<div class="comiis_mood_inputbox bg_e cl">
			<div class="comiis_mood_input cl">
				<textarea class="comiis_pt message" name="message" id="commentmessage" onkeyup="strLenCalc(this, 'checklen')"></textarea>
			</div>
		</div>
		<!--{if $secqaacheck || $seccodecheck}-->
		<div class="comiis_spdp_sec b_b">
			<!--{subtemplate common/seccheck}-->
		</div>
		<!--{/if}-->
		<div class="comiis_mood_btn b_b cl">
			<button type="submit" id="commentsubmit" value="true" name="commentsubmit" class="formdialog comiis_sendbtn bg_c f_f y">{lang publish}</button>
			<span class="f_d">{lang comment_message1} <strong class="checklen">200</strong> {lang comment_message2}</span>
		</div>
	</form>
</div>
<!--{template common/footer}-->