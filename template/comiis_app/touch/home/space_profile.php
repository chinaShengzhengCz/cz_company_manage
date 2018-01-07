<?PHP exit('Access Denied');?>
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_space_profile.php'}-->
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!--{if !$_GET['mycenter']}-->
<!--{template home/space_header}-->
	<div class="comiis_space_profile bg_f b_t b_b mt10 cl">
		<ul>
			<li class="b_t">
				<div class="profile_r profile_face f_c">{$space[uid]}</div>
				<span>{lang share_space}ID</span> 
			</li>
			<li class="b_t">
				<div class="profile_r profile_face f_c"><!--{if $space[group][maxsigsize] && $space[sightml]}-->$space[sightml]<!--{else}-->{$comiis_lang['tip15']}<!--{/if}--></div>
				<span>{lang personal_signature}</span>	
			</li>
			<li class="b_t">
				<a href="javascript:;" class="profile_a profile_ewmbox">
					<div class="profile_rs"><i class="comiis_font f_d">&#xe60c;</i><i class="comiis_font profile_ewm f_d">&#xe663;</i></div>
					<span>{$comiis_lang['all60']}</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="comiis_user_code" style="display:none;">
		<div class="comiis_user_code_box">
			<div class="comiis_user_code_top">
				<img src="<!--{avatar($space[uid], middle, true)}-->" />
				<h2>$space[username]</h2> 
				<p class="f_d">{$comiis_lang['tip11']}</p>
			</div>
			<div id="comiis_user_code"></div>
		</div>
	</div>
	<script src="template/comiis_app/comiis/js/jquery.qrcode.min.js?{VERHASH}"></script>
	<script>
		jQuery('.profile_ewmbox').on('click', function(e) {
			$('.comiis_user_code').css('display', 'block').on('click', function(e) {
				$(this).css('display', 'none');
			});
			if(jQuery('#comiis_user_code canvas').length == 0){
				jQuery('#comiis_user_code').qrcode({width: 240, height: 240, text: "{$_G[siteurl]}home.php?mod=space&uid={$space[uid]}&do=profile"});
			}
		});
	</script>
	<div class="comiis_space_profileico bg_f b_t b_b mt10 cl">
		<ul>
		<!--{if $_G['setting']['allowviewuserthread'] !== false}-->
		<!--{eval $space['posts'] = $space['posts'] - $space['threads'];}-->
			<li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread&from=space"><i class="comiis_font ico01">&#xe64f;</i><span>{lang topic} $space[threads]</span></a></li>
			<li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=reply&from=space"><i class="comiis_font ico02">&#xe667;</i><span>{lang reply} $space[posts]</span></a></li>
		<!--{/if}-->
			<li><a href="javascript:;"><i class="comiis_font ico03">&#xe66b;</i><span>{lang friends} $space[friends]</span></a></li>
		<!--{if helper_access::check_module('blog')}-->
			<li><a href="home.php?mod=space&uid=$space[uid]&do=blog&view=me&from=space"><i class="comiis_font ico03">&#xe64d;</i><span>{lang blog} $space[blogs]</span></a></li>
		<!--{/if}-->
		<!--{if helper_access::check_module('album')}-->
			<li><a href="home.php?mod=space&uid=$space[uid]&do=album&view=me&from=space"><i class="comiis_font ico01">&#xe653;</i><span>{lang album} $space[albums]</span></a></li>
		<!--{/if}-->
		<!--{if helper_access::check_module('doing')}-->
			<li><a href="home.php?mod=space&uid=$space[uid]&do=doing&view=me&from=space"><i class="comiis_font ico02">&#xe650;</i><span>{lang doings_num} $space[doings]</span></a></li>
		<!--{/if}-->		
		</ul>
	</div>
	<div class="comiis_space_profilejf bg_f b_t b_b mt10 cl">
		<ul>
			<li class="b_t b_r"><span class="f_0">$space[credits]</span>{lang credits}</li>
			<!--{loop $_G[setting][extcredits] $key $value}-->
			<!--{if $value[title]}-->
			<li class="b_t b_r"><span class="f_0">{$space["extcredits$key"]} $value[unit]</span>$value[title]</span></li>
			<!--{/if}-->
			<!--{/loop}-->
		</ul>
	</div>
	<div class="comiis_stylitit bg_e f_c">{lang memcp_profile}</div>
	<div class="comiis_space_profile bg_f b_t b_b cl">
		<ul>
			<!--{if in_array($_G[adminid], array(1, 2))}-->
			<li class="b_t"><div class="profile_rs f_c">$space[email]</div><span>Email</span></li>
			<!--{/if}-->
			<!--{loop $profiles $value}-->
			<li class="b_t"><div class="profile_rs f_c">$value[value]</div><span>$value[title]</span></li>
			<!--{/loop}--> 
			<li class="b_t"><div class="profile_rs f_c">$space[oltime] {lang hours}</div><span>{lang online_time}</span></li>
			<li class="b_t"><div class="profile_rs f_c">$space[regdate]</div><span>{lang regdate}</span></li>
			<li class="b_t"><div class="profile_rs f_c">$space[lastvisit]</div><span>{lang last_visit}</span></li>
		</ul>
	</div>
	<!--{if $space[uid] == $_G[uid]}-->
	<div class="cl" style="height:40px;"></div>
	<div class="comiis_space_foot bg_f b_t">
		<ul class="comiis_flex">
			<li class="flex foot_cp"><a href="home.php?mod=spacecp"><i class="comiis_font f_wb">&#xe655;</i><span class="f_b">{lang update_profile}</span></a></li>
			<!--{if $_G['comiis_homestyleid']}--><li class="flex foot_cp"><a href="plugin.php?id=comiis_app_homestyle"><i class="comiis_font f_wb">&#xe612;</i><span class="f_b">{lang dress_space}</span></a></li><!--{/if}-->
		</ul>
	</div>
	<!--{else}-->
	<!--{template home/space_footer}-->
	<!--{/if}-->
<!--{else}-->
	<div class="styli_h bg_e b_t cl"></div>
	<div class="comiis_myinfo bg_f b_t cl">	
		<div class="comiis_styli myinfo_box b_t cl">
			<div class="myinfo_ewm f_d"><i class="comiis_font">&#xe663;</i></div>
			<div class="myinfo_img bg_e f_c"><a href="javascript:;" class="comiis_edit_avatar"><span class="f_f">{lang modify}</span><img src="<!--{avatar($_G[uid], middle, true)}-->" /></a></div>
			<div class="myinfo_data">
				<a href="home.php?mod=space&uid={$_G[uid]}&do=profile" class="myinfo_user">$_G[username]</a>
				<a href="home.php?mod=spacecp&ac=profile&op=info" class="myinfo_txt f_c">
					<!--{if $_G['member_'.$_G[uid].'_field_forum']['sightml']}-->
						$_G['member_'.$_G[uid].'_field_forum']['sightml']
					<!--{else}--> 
					   <i class="comiis_font">&#xe62d;</i> {$comiis_lang['all40']}
					<!--{/if}-->
				</a>
			</div>
		</div>	
		<div class="styli_h bg_e b_t cl"></div>
		<a href="plugin.php?id=comiis_app_color" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe612;</i></div><div class="flex">{lang diy_style}{$comiis_lang['post37']}</div><div class="styli_ico"><span class="f_ok">{$comiis_lang['post37']}</span><i class="comiis_font f_d">&#xe60c;</i></div>
		</a>
		<a href="home.php?mod=space&uid={$_G[uid]}&do=thread&view=me&from=space" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#10AEFF">&#xe662;</i></div><div class="flex">{lang my_space}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<a href="home.php?mod=space&do=friend&view=visitor" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#FF9900">&#xe632;</i></div><div class="flex">{lang recent_visit}</div>
			<div class="my_space_img f_d">
				<!--{loop $comiis_visitor $temp}-->
					<!--{echo avatar($temp['vuid'],'small');}-->
				<!--{/loop}-->
			</div>
			<div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<!--{hook/global_comiis_home_space_profile_mobile}-->		
		<div class="styli_h bg_e b_t cl"></div>
		<a href="home.php?mod=spacecp" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#3EBBFD">&#xe66e;</i></div><div class="flex">{lang myprofile}</div><div class="styli_ico"><span class="f_ok">{lang modify}</span><i class="comiis_font f_d">&#xe60c;</i></div>
		</a>
		<a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=all" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe617;</i></div><div class="flex">{lang myfavorite}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<a href="home.php?mod=space&uid={$_G[uid]}&do=thread&view=me" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA06">&#xe679;</i></div><div class="flex">{lang my_posts}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<!--{if $_G['setting'][groupstatus]}-->
		<a href="group.php?mod=my&view=join" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#DA99DB">&#xe66a;</i></div><div class="flex">{$comiis_lang['all58']}{$comiis_group_lang['001']}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<!--{/if}-->
		<!--{if $_G['setting'][blogstatus]}-->
		<a href="home.php?mod=space&do=blog&view=me" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#91B9EB">&#xe681;</i></div><div class="flex">{lang my_blog}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<!--{/if}-->
		<!--{if $_G['setting'][albumstatus]}-->
		<a href="home.php?mod=space&do=album&view=me" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#FFB300">&#xe627;</i></div><div class="flex">{lang my_album}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<!--{/if}-->
		<!--{if $_G['setting'][doingstatus]}-->
		<a href="home.php?mod=space&do=doing&view=me" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#F37D7D">&#xe638;</i></div><div class="flex">{$comiis_lang['all58']}{$comiis_lang['all56']}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<!--{/if}-->
		<a href="home.php?mod=space&do=friend" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#91B9EB">&#xe629;</i></div><div class="flex">{lang my_friends}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>	
		<div class="styli_h bg_e b_t b_b cl"></div>
		<div  name="pm" id="pm">
		<a href="home.php?mod=space&do=pm" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#DA99DB">&#xe665;</i></div><div class="flex"><span class="z">{lang mypm}</span><!--{if $_G[member][newpm]}--><span class="myinfo_tip bg_del f_f">{$_G[member][newpm]}</span><!--{/if}--></div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		<a href="home.php?mod=space&do=notice" class="comiis_flex comiis_styli b_t cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#FFB300">&#xe62f;</i></div><div class="flex"><span class="z">{lang my}{lang remind}</span><!--{if $_G[member][newprompt]}--><span class="myinfo_tip bg_del f_f">{$_G[member][newprompt]}</span><!--{/if}--></div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
		</div>
		<a href="home.php?mod=spacecp&ac=credit" class="comiis_flex comiis_styli b_t b_b cl">
			<div class="styli_tit f_c"><i class="comiis_font" style="color:#9DCA08">&#xe641;</i></div><div class="flex">{lang my_credits}</div><div class="styli_ico f_d"><i class="comiis_font">&#xe60c;</i></div>
		</a>
	</div>
	<div class="comiis_btnbox cl"><a href="member.php?mod=logging&action=logout&referer=forum.php&formhash={FORMHASH}&handlekey=logout" class="dialog comiis_btn bg_del f_f" />{lang logout_mobile}</a></div>
	<div class="comiis_user_code" style="display:none;">
		<div class="comiis_user_code_box">
			<div class="comiis_user_code_top">
				<img src="<!--{avatar($_G[uid], middle, true)}-->" />
				<h2>$_G[username]</h2> 
				<p class="f_d">{$comiis_lang['tip11']}</p>
			</div>
			<div id="comiis_user_code"></div>
		</div>
	</div>
	<script src="template/comiis_app/comiis/js/jquery.qrcode.min.js?{VERHASH}"></script>
	<script>
		jQuery('.myinfo_ewm').on('click', function(e) {
			$('.comiis_user_code').css('display', 'block').on('click', function(e) {
				$(this).css('display', 'none');
			});
			if(jQuery('#comiis_user_code canvas').length == 0){
				jQuery('#comiis_user_code').qrcode({width: 240, height: 240, text: "{$_G[siteurl]}home.php?mod=space&uid={$_G[uid]}&do=profile"});
			}
		});
	</script>
<!--{/if}-->
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->