<?PHP exit('Access Denied');?>
<!--{template common/header}-->
<!--{if $_GET[infloat]}-->
<script>window.location.href = 'member.php?mod=logging&action=login';</script>
<!--{else}-->
{eval $loginhash = 'L'.random(4);}
<div class="comiis_loginbox <!--{if $_GET[infloat]}-->comiis_login_pop comiis_bodybg<!--{/if}-->">
	<!--{if $_GET['lostpasswd'] == 'yes'}-->
		<form method="post" autocomplete="off" id="lostpwform" class="cl" onsubmit="ajaxpost('lostpwform', 'returnmessage3_$loginhash', 'returnmessage3_$loginhash', 'onerror');return false;" action="member.php?mod=lostpasswd&lostpwsubmit=yes&infloat=yes">
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<input type="hidden" name="handlekey" value="lostpwform" />
			<div class="comiis_login_from bg_f b_t b_b">
				<ul>
					<li><input type="text" value="" tabindex="1" class="comiis_px" size="30" autocomplete="off" name="email" id="lostpw_email" placeholder="{lang email}"></li>
					<li class="b_t"><input type="text" value="" tabindex="2" class="comiis_px" size="30" autocomplete="off" name="username" id="lostpw_username" placeholder="{lang username}"></li>
				</ul>
			</div>
			<div class="comiis_btn_login"><button tabindex="3" value="true" name="lostpwsubmit" type="submit" class="formdialog comiis_btn bg_c f_f" comiis='handle'>{lang submit}</button></div>
		</form>
		<script>
			$('.comiis_head h2').html("{lang getpassword}");
			function succeedhandle_lostpwform(a, b, c){
				popup.open(b, 'alert');
				if(a){
					setTimeout(function() {
						window.location.href = a;
					}, 1000);
				}
			}
			function errorhandle_lostpwform(a, b){
				popup.open(a, 'alert');
			}
		</script>
	<!--{else}-->
		<!--{if $_GET[infloat]}-->
			<h2 class="comiis_log_tit"><a href="javascript:;" onclick="popup.close();"><i class="comiis_font f_d y">&#xe639;</i></a>{lang login}</h2>
		<!--{/if}-->
			<form id="loginform" method="post" action="member.php?mod=logging&action=login&loginsubmit=yes&loginhash=$loginhash" onsubmit="{if $_G['setting']['pwdsafety']}pwmd5('password3_$loginhash');{/if}" >
			<input type="hidden" name="formhash" id="formhash" value='{FORMHASH}' />
			<input type="hidden" name="referer" id="referer" value="<!--{if dreferer()}-->{echo dreferer()}<!--{else}-->forum.php?mobile=2<!--{/if}-->" />
			<input type="hidden" name="fastloginfield" value="username">
			<input type="hidden" name="cookietime" value="2592000">
			<!--{if $auth}-->
				<input type="hidden" name="auth" value="$auth" />
			<!--{/if}-->
		<div class="comiis_login_from bg_f b_t b_b">
			<ul>
				<li><input type="text" value="" tabindex="1" class="comiis_px" size="30" autocomplete="off" value="" name="username" placeholder="{lang inputyourname}" fwin="login"></li>
				<li class="b_t"><input type="password" tabindex="2" class="comiis_px" size="30" value="" name="password" placeholder="{lang login_password}" fwin="login" id="password"></li>
				<li class="b_t">
					<div class="comiis_login_select">
					<span class="inner">
						<i class="comiis_font f_d">&#xe60c;</i>
						<span class="z">
							<span class="comiis_question f_c">{lang security_question}</span>
						</span>					
					</span>
					<select id="questionid_{$loginhash}" name="questionid" class="comiis_sel_list">
						<option value="0" selected="selected">{lang security_question}</option>
						<option value="1">{lang security_question_1}</option>
						<option value="2">{lang security_question_2}</option>
						<option value="3">{lang security_question_3}</option>
						<option value="4">{lang security_question_4}</option>
						<option value="5">{lang security_question_5}</option>
						<option value="6">{lang security_question_6}</option>
						<option value="7">{lang security_question_7}</option>
					</select>
					</div>
				</li>
				<li class="answerli b_t" style="display:none;"><input type="text" name="answer" id="answer_{$loginhash}" class="comiis_px" size="30" placeholder="{lang security_a}"></li>
			</ul>
			<!--{if $seccodecheck}-->
			<!--{subtemplate common/seccheck}-->
			<!--{/if}-->
		</div>
		<div class="btn_login comiis_btn_login"><button value="true" name="submit" type="submit" class="formdialog comiis_btn bg_c f_f" tabindex="3" comiis='handle'>{lang login}</button></div>
		</form>
		<script src="./template/comiis_app/comiis/js/comiis_hideShowPassword.js"></script>
		<script type="text/javascript">
			$('#password').hidePassword(true);
			(function() {
				$(document).on('change', '.comiis_sel_list', function() {
					var obj = $(this);
					$('.comiis_question').text(obj.find('option:selected').text());
					if(obj.val() == 0) {
						$('.answerli').css('display', 'none');
						$('.questionli').addClass('bl_none');
					} else {
						$('.answerli').css('display', 'block');
						$('.questionli').removeClass('bl_none');
					}
				});
			 })();
			function succeedhandle_loginform(a, b, c){
				popup.open(b, 'alert');
				if(a){
					setTimeout(function() {
						window.location.href = a;
					}, 1000);
				}
			}
			function errorhandle_loginform(a, b){
				popup.open(a, 'alert');
			}
		</script>
	<!--{/if}-->	
	<!--{if $_G['setting']['regstatus']}-->
	<div class="comiis_reg_link f_c cl"><!--{if $_GET['lostpasswd'] == 'yes'}--><a href="member.php?mod=logging&action=login" class="y">{$comiis_lang['reg1']}</a><!--{else}--><a href="member.php?mod=logging&action=login&lostpasswd=yes" class="y">{$comiis_lang['reg2']}</a><!--{/if}--><a href="member.php?mod={$_G[setting][regname]}">{$comiis_lang['reg3']}</a></div>
	<!--{/if}-->
	<!--{if ($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed']) || !empty($_G['setting']['pluginhooks']['global_comiis_member_login_mobile'])}-->
	<div class="comiis_log_dsf cl">
		<div class="comiis_log_line cl"><span class="comiis_bodybg f_c">{$comiis_lang['reg4']}</span></div>
		<div class="comiis_log_ico">
			<!--{if ($_G['setting']['connect']['allow'] && !$_G['setting']['bbclosed'])}--><a href="$_G[connect][login_url]&statfrom=login_simple" class="bg_f b_ok"><i class="comiis_font f_qq">&#xe625;</i></a><!--{/if}-->
			<!--{hook/global_comiis_member_login_mobile}-->
		</div>
	</div>
	<!--{/if}-->
	<!--{hook/logging_bottom_mobile}-->
</div>
<!--{if $_G['setting']['pwdsafety']}-->
	<script type="text/javascript" src="{$_G['setting']['jspath']}md5.js?{VERHASH}" reload="1"></script>
<!--{/if}-->
<!--{eval updatesession();}-->
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->