<?PHP exit('Access Denied');?>
<!--{if $_GET['agreement'] == 'yes' && $bbrules}--><!--{eval $comiis_bg = 1;}--><!--{/if}-->
<!--{template common/header}-->
<!--{if $_GET['mod']=='connect'}-->
<div class="comiis_qq_tbox">
	<div class="comiis_space_info bg_0 f_f" style="overflow:hidden;">
		<div class="comiis_space_tx{if $comiis_app_switch['comiis_space_header']==1} comiis_space_txv1{/if}" style="padding-bottom:18px;">
			<div class="user_img"><img src="{$_G[connect][avatar_url]}/$_G['qc']['connect_app_id']/$_G['qc']['connect_openid']"></div>
			<h2>Hi, {$_G['member']['username']}</h2>
			<p>{$comiis_lang['reg15']}</p>
		</div>
	</div>
	<div class="comiis_topnv bg_f b_b">
		<ul class="comiis_flex">
			<li class="flex{if $_GET['ac']!='bind'} kmon{/if}" id="comiis_qqtab1"><a href="javascript:;"{if $_GET['ac']!='bind'} class="b_0 f_0"{/if}>{$comiis_lang['reg22']}</a></li>
			<li class="flex{if $_GET['ac']=='bind'} kmon{/if}" id="comiis_qqtab2"><a href="javascript:;"{if $_GET['ac']=='bind'} class="b_0 f_0"{/if}>{$comiis_lang['reg16']}</a></li>
		</ul>
	</div>
	<div class="comiis_qq_fbox{if $_GET['ac']=='bind'} comiis_qq_fboxs{/if}">
		<div class="comiis_wzpost mt15 cl">
			<form method="post" autocomplete="off" name="register" id="registerform"  enctype="multipart/form-data" action="member.php?mod=connect">
        <input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
        <!--{eval comiis_load('BKG4Q4gNAK4aBNB8wK', 'activationauth');}-->
			</form>
		</div>
		<!--{eval $loginhash = 'L'.random(4);}-->
		<div class="comiis_wzpost mt15 cl">
			<form method="post" autocomplete="off" name="login" id="loginform_$loginhash" action="member.php?mod=connect&action=login&loginsubmit=yes{if !empty($_GET['handlekey'])}&handlekey=$_GET[handlekey]{/if}&loginhash=$loginhash">
          <!--{eval comiis_load('mSuVGOYzUV0eVzOZoG', 'loginhash');}-->
					<li class="comiis_styli b_t">				
						<div class="comiis_input_style">
						  <div class="comiis_login_select">
							<span class="inner">
							  <i class="comiis_font f_d">&#xe60c;</i>
							  <span class="z">
								<span class="comiis_question" id="questionid_{$loginhash}_name"></span>
							  </span>					
							</span>
							<select id="questionid_{$loginhash}" name="questionid" class="comiis_security_list">
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
						</div>		
					</li>
					<li class="comiis_security_input comiis_styli b_t" style="display:none;">
						<div class="comiis_flex">
							<div class="styli_tit f_c">{$comiis_lang['reg18']}</div>
							<div class="flex">
								<input type="text" name="answer" id="answer_{$loginhash}" placeholder="{$comiis_lang['reg19']}" class="comiis_input">
							</div>
						</div>
					</li>
				</ul>
				<div class="comiis_btnbox"><button type="submit" name="loginsubmit" value="true" class="comiis_btn bg_c f_f">{$comiis_lang['reg20']}</button></div>
			</form>
		</div>
	</div>
	<script>
		$('#comiis_qqtab1,#comiis_qqtab2').on("click", function() {
			if($(this).attr('id') == 'comiis_qqtab1'){
				$('.comiis_qq_fbox').removeClass('comiis_qq_fboxs');
			}else{
				$('.comiis_qq_fbox').addClass('comiis_qq_fboxs');
			}
			$('.comiis_flex li').removeClass('kmon');
			$('.comiis_flex li a').removeClass('b_0').removeClass('f_0');
			$(this).addClass('kmon').find('a').addClass('b_0').addClass('f_0');
		});
		$(document).on('change', '.comiis_security_list', function() {
			if($(this).val() == 0) {
				$('.comiis_security_input').css('display', 'none');
			} else {
				$('.comiis_security_input').css('display', 'block');
			}
		});
	</script>
<!--{else}-->
	<!--{if $_GET['agreement'] == 'yes' && $bbrules}-->	
		<div id="comiis_agreement">
			<div class="comiis_fwtk f_b cl">
				{$bbrulestxt}		
			</div>
			<a href="member.php?mod=register" class="comiis_btn bg_c f_f">{$comiis_lang['reg5']}</a>	
		</div>	
		<script>$('.comiis_head h2').html("{lang rulemessage}");</script>
	<!--{else}-->
		<script>
			function showdistrict(container, elems, totallevel, changelevel, containertype) {						
				var getdid = function(elem) {
					var op = elem.options[elem.selectedIndex];
					return op['did'] || op.getAttribute('did') || '0';
				};
				var pid = changelevel >= 1 && elems[0] && $(elems[0]) ? getdid(document.getElementById(elems[0])) : 0;
				var cid = changelevel >= 2 && elems[1] && $(elems[1]) ? getdid(document.getElementById(elems[1])) : 0;
				var did = changelevel >= 3 && elems[2] && $(elems[2]) ? getdid(document.getElementById(elems[2])) : 0;
				var coid = changelevel >= 4 && elems[3] && $(elems[3]) ? getdid(document.getElementById(elems[3])) : 0;
				var url = 'home.php?mod=misc&ac=ajax&op=district&container='+container+'&containertype='+containertype
					+'&province='+elems[0]+'&city='+elems[1]+'&district='+elems[2]+'&community='+elems[3]
					+'&pid='+pid + '&cid='+cid+'&did='+did+'&coid='+coid+'&level='+totallevel+'&handlekey='+container+'&inajax=1'+(!changelevel ? '&showdefault=1' : '');
				$.ajax({
					type : 'GET',
					url : url,
					dataType : 'xml'
				}).success(function(s) {
					var rehtml = s.lastChild.firstChild.nodeValue;
					rehtml = rehtml.replace('<select name="'+elems[0]+'"', '<div class="comiis_login_select comiis_styli"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="'+elems[0]+'_text f_c"></span></span></span><select name="'+elems[0]+'"');
					rehtml = rehtml.replace('<select name="'+elems[1]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="'+elems[1]+'_text f_c"></span></span></span><select name="'+elems[1]+'"');
					rehtml = rehtml.replace('<select name="'+elems[2]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="'+elems[2]+'_text f_c"></span></span></span><select name="'+elems[2]+'"');
					rehtml = rehtml.replace('<select name="'+elems[3]+'"', '<div class="comiis_login_select comiis_selectli b_t"><span class="inner"><i class="comiis_font f_d">&#xe60c;</i><span class="z"><span class="'+elems[3]+'_text f_c"></span></span></span><select name="'+elems[3]+'"');
					rehtml = rehtml.replace(/&nbsp;/g, '');
					rehtml = rehtml.replace(/<\/select>/g, '</select></div>');
					$('.comiis_'+container).html(rehtml);
					$('.'+elems[0]+'_text').text($('#'+elems[0]).find('option:selected').text());
					$('.'+elems[1]+'_text').text($('#'+elems[1]).find('option:selected').text());
					$('.'+elems[2]+'_text').text($('#'+elems[2]).find('option:selected').text());
					$('.'+elems[3]+'_text').text($('#'+elems[3]).find('option:selected').text());
				});
			}
			function showbirthday(){
				var el = document.getElementById('birthday');
				var birthday = el.value;
				el.length=0;
				el.options.add(new Option('{$comiis_lang['all15']}', ''));
				for(var i=0;i<28;i++){
					el.options.add(new Option(i+1, i+1));
				}
				if(document.getElementById('birthmonth').value!="2"){
					el.options.add(new Option(29, 29));
					el.options.add(new Option(30, 30));
					switch(document.getElementById('birthmonth').value){
						case "1":
						case "3":
						case "5":
						case "7":
						case "8":
						case "10":
						case "12":{
							el.options.add(new Option(31, 31));
						}
					}
				} else if(document.getElementById('birthyear').value!="") {
					var nbirthyear=document.getElementById('birthyear').value;
					if(nbirthyear%400==0 || (nbirthyear%4==0 && nbirthyear%100!=0)) el.options.add(new Option(29, 29));
				}
				el.value = birthday;
			}
		</script>	
		<div class="comiis_post_from mt15 cl">
			<div class="comiis_wzpost bg_f b_t cl">
				<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod={$_G[setting][regname]}">
				<input type="hidden" name="regsubmit" value="yes" />
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<!--{eval $dreferer = str_replace('&amp;', '&', dreferer());}-->
				<input type="hidden" name="referer" value="$dreferer" />
				<input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
				<input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
				<!--{if $_G['setting']['sendregisterurl']}-->
					<input type="hidden" name="hash" value="$_GET[hash]" />
				<!--{/if}-->
				<ul class="comiis_input_style">
				<!--{if $sendurl}-->
					<li class="comiis_styli comiis_flex b_b">
						<div class="styli_tit f_c">{lang email}<span class="f_g">*</span></div>
						<div class="flex"><input type="text" tabindex="1" class="comiis_input kmshow" autocomplete="off" value="" id="{$this->setting['reginput']['email']}" name="$this->setting['reginput']['email']" fwin="login"></div>
					</li>
					<li class="comiis_stylitit b_b bg_e f_c" style="height:auto;">{$comiis_lang['tip249']}</li>
				<!--{else}-->
					<li class="comiis_styli comiis_flex b_b">
						<div class="styli_tit f_c">{lang username}<span class="f_g">*</span></div>
						<div class="flex"><input type="text" tabindex="1" class="comiis_input kmshow" autocomplete="off" value="" name="{$_G['setting']['reginput']['username']}" fwin="login"></div>
					</li>
					<li class="comiis_styli comiis_flex b_b">
						<div class="styli_tit f_c">{$comiis_lang['post37']}{lang password}<span class="f_g">*</span></div>
						<div class="flex"><input type="password" id="password" tabindex="2" class="comiis_input kmshow" value="" name="{$_G['setting']['reginput']['password']}" fwin="login"></div>
					</li>
					<li class="comiis_styli comiis_flex b_b">
						<div class="styli_tit f_c">{lang password_confirm}<span class="f_g">*</span></div>
						<div class="flex"><input type="password" id="password2" tabindex="3" class="comiis_input kmshow" value="" name="{$_G['setting']['reginput']['password2']}" fwin="login"></div>
					</li>
					<li class="comiis_styli comiis_flex b_b">
						<div class="styli_tit f_c">{lang email}<!--{if !$_G['setting']['forgeemail']}--><span class="f_g">*</span><!--{/if}--></div>
						<div class="flex"><input type="email" tabindex="4" class="comiis_input kmshow" autocomplete="off" value="$hash[0]" name="{$_G['setting']['reginput']['email']}" fwin="login"></div>
					</li>					
					<!--{if substr($_G['setting']['version'], 0, 1) == 'F'}-->
						<!--{eval comiis_load('wsy568KCpgc5K1sDu1', '');}-->
						<!--{if $sendsms}-->
							<!--{eval comiis_load('vVSNYpOf70N7O4z8wS', '');}-->
						<!--{/if}-->
					<!--{/if}-->					
					<!--{if empty($invite) && ($_G['setting']['regstatus'] == 2 || $_G['setting']['regstatus'] == 3)}-->
					<li class="comiis_styli comiis_flex b_b">
						<div class="styli_tit f_c">{lang invite_code}</div>
						<div class="flex"><input type="text" name="invitecode" autocomplete="off" tabindex="5" class="comiis_input kmshow" value="" fwin="login"></div>
					</li>
					<!--{/if}-->
					<!--{if $_G['setting']['regverify'] == 2}-->
						<li class="comiis_styli comiis_flex b_b">
							<div class="styli_tit f_c">{lang register_message}<span class="f_g">*</span></div>
							<div class="flex"><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="comiis_input kmshow" value="" fwin="login"></div>
						</li>
					<!--{/if}-->
					<!--{eval require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_function.php';}-->
					<!--{loop $_G['cache']['fields_register'] $field}-->
					<!--{if $htmls[$field['fieldid']]}-->
					<!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox') || stripos($htmls[$field['fieldid']], 'birthdistrictbox')}-->				
					<li class="comiis_stylitit b_b bg_e f_c">$field[title]<!--{if $field['required']}--><span class="f_g">*</span><!--{/if}--></li>
					<!--{/if}-->				
					<li class="{if !stripos($htmls[$field['fieldid']], 'residedistrictbox') && !stripos($htmls[$field['fieldid']], 'birthdistrictbox')}comiis_styli {/if}comiis_flex b_b">
						<!--{if !stripos($htmls[$field['fieldid']], 'residedistrictbox') && !stripos($htmls[$field['fieldid']], 'birthdistrictbox')}--><div class="styli_tit f_c">$field[title]<!--{if $field['required']}--><span class="f_g">*</span><!--{/if}--></div><!--{/if}-->
						<div class="flex{if stripos($htmls[$field['fieldid']], 'residedistrictbox')} comiis_residedistrictbox{elseif stripos($htmls[$field['fieldid']], 'birthdistrictbox')} comiis_birthdistrictbox{/if}">
						<!--{if $field['fieldid']=='birthday'}-->
							<span class="y"><!--{echo str_replace('class="ps"', 'class="bg_f b_ok comiis_stylino"', $htmls[$field['fieldid']]);}--></span>
						<!--{elseif stripos($htmls[$field['fieldid']], 'input')}-->
							<!--{if stripos($htmls[$field['fieldid']], 'radio') || stripos($htmls[$field['fieldid']], 'checkbox')}-->
								<!--{echo comiis_read_setting($field['fieldid'], array(), false, false, true);}-->
							<!--{else}-->
								<!--{echo str_replace(array('class="px"','class="pr"'), array('class="comiis_input kmshow"','class="kmshow"'), preg_replace('/<p>(.*?)<\/p>/', '', $htmls[$field['fieldid']]));}-->
							<!--{/if}-->
						<!--{elseif stripos($htmls[$field['fieldid']], 'select')}-->
							<!--{if stripos($htmls[$field['fieldid']], 'residedistrictbox')}-->
								<div class="comiis_login_select comiis_styli">
									<span class="inner">
										<i class="comiis_font f_d">&#xe60c;</i>
										<span class="z">
											<span class="comiis_residedistrictbox_text f_c"></span>
										</span>					
									</span>
									<!--{echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_residedistrictbox"', ''), $htmls[$field['fieldid']]);}-->
								</div>
								<script>$('.comiis_residedistrictbox_text').text($('.comiis_residedistrictbox').find('option:selected').text());</script>
							<!--{else}-->
								<div class="comiis_login_select{if stripos($htmls[$field['fieldid']], 'birthdistrictbox')} comiis_styli{/if}">
									<span class="inner">
										<i class="comiis_font f_d">&#xe60c;</i>
										<span class="z">
											<span class="comiis_question_{$field['fieldid']} f_c"></span>
										</span>					
									</span>
									<!--{echo str_replace(array('class="ps"', '&nbsp;'), array('class="comiis_sel_list_'.$field['fieldid'].'"', ''), $htmls[$field['fieldid']]);}-->
								</div>
								<script>
								$('.comiis_question_{$field['fieldid']}').text($('.comiis_sel_list_{$field['fieldid']}').find('option:selected').text());
								$(document).on('change', '.comiis_sel_list_{$field['fieldid']}', function() {
									$('.comiis_question_{$field['fieldid']}').text($(this).find('option:selected').text());
								});
								</script>
							<!--{/if}-->
						<!--{else}-->
							{$htmls[$field['fieldid']]}
						<!--{/if}-->
						</div>
					</li>
					<!--{/if}-->
					<!--{/loop}-->
				<!--{/if}-->
				</ul>
				<!--{if $secqaacheck || $seccodecheck}-->
					<!--{if $secqaacheck}--><div class="styli_h bg_e b_b"></div><!--{/if}-->
					<div class="comiis_regsec b_b">
					<!--{subtemplate common/seccheck}-->
					</div>
				<!--{/if}-->
			</div>
			<div class="comiis_btnbox"><button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog comiis_btn bg_c f_f" comiis='handle'>{lang quickregister}</button></div>
			<!--{hook/global_comiis_member_register_mobile}-->
			</form>
			<!--{if $bbrules}-->
			<div class="comiis_reg_link comiis_input_style cl" style="margin-top:-5px;">
			<input type="checkbox" class="pc" name="agreebbrule" value="$bbrulehash" id="agreebbrules" checked="checked" />
			<label for="agreebbrules"><i class="comiis_font f_0">&#xe644;</i> <span class="f_c">{$comiis_lang['reg7']}</span>
			<a href="member.php?mod=register&agreement=yes" class="f_0 f_u">{lang rulemessage}</a></label>
			</div>
			<!--{/if}-->
			<div class="comiis_reg_link f_a cl"><a href="member.php?mod=logging&action=login">{$comiis_lang['reg6']} &gt;&gt;</a></div>
		</div>
		<script src="./template/comiis_app/comiis/js/comiis_hideShowPassword.js"></script>
		<script type="text/javascript">
			$('#password,#password2').hidePassword(true);
			function succeedhandle_registerform(a, b, c){
				popup.open(b, 'alert');
				if(a){
					setTimeout(function() {
						window.location.href = a;
					}, 1000);
				}
			}
			function errorhandle_registerform(a, b){
				popup.open(a, 'alert');
			}
		</script>
	<!--{/if}-->
<!--{/if}-->
<!--{hook/register_bottom}-->
<!--{eval updatesession();}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->