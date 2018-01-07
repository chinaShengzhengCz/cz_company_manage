<?PHP exit('Access Denied');?>
<!--{if $_GET['pic'] != 'yes'}-->
	<!--{template home/comiis_album}-->
<!--{else}-->	
	<!--{eval $_G['home_tpl_titles'] = array(getstr($pic['title'], 60, 0, 0, 0, -1), $album['albumname'], '{lang album}');}-->
	<!--{eval $friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');}-->
	<!--{template common/header}-->
	<style>.comiis_footer_scroll {bottom:62px;}</style>
	<div class="comiis_memu_y bg_f f_b" id="comiis_menu_xcplvtr_menu"  style="display:none;">
		<ul>		
			<li><a href="$pic[pic]" target="_blank" class="b_b"><i class="comiis_font">&#xe63a;</i>{lang look_pic}</a></li>
			<li><a href="home.php?mod=space&uid=$space[uid]&do=album&id=$pic[albumid]" class="b_b"><i class="comiis_font">&#xe657;</i>{lang back_album_list}</a></li>
			<li><a href="home.php?mod=space&do=album&view=all" class="b_b"><i class="comiis_font">&#xe627;</i>{lang show}{lang all}{lang album}</a></li>
			<li><a href="{if $_G['uid']}home.php?mod=spacecp&ac=upload{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}"><i class="comiis_font">&#xe642;</i>{lang publish}{lang album}</a></li>
		</ul>
	</div>
	<div class="comiis_album_view">
		<div class="comiis_album_pic">
			<img src="$pic[pic]" class="vm" />
			<div style="display:none;">
			<a href="home.php?mod=space&uid=$pic[uid]&do=$do&picid=$upid&pic=yes&goto=up#pic_block" class="kmprev">{lang previous_pic}</a>
			<a href="home.php?mod=space&uid=$pic[uid]&do=$do&picid=$nextid&pic=yes&goto=down#pic_block" class="kmnext">{lang next_pic}</a>
			<!--{if $album[picnum]}--><span class="f_f">$sequence - $album[picnum]</span><!--{/if}-->
			</div>
		</div>
		<h2><!--{if $pic[hot]}--><span class="f_a">{lang hot} $pic[hot]</span><!--{/if}--><em id="comiis_pic_title"><!--{if $pic[title]}-->$pic[title]<!--{else}--><!--{eval echo substr($pic['filename'], 0, strrpos($pic['filename'], '.'));}--><!--{/if}--></em><!--{if $pic[status] == 1}--> <span class="f_a">({lang moderate_need})</span><!--{/if}--></h2>
		<p class="f_c"><!--{if $do=='event'}--><a href="home.php?mod=space&uid=$pic[uid]" class="f_0">$pic[username]</a><!--{/if}--> {lang upload_at} <!--{date($pic[dateline])}--> ($pic[size])</p>
	</div>
	<div class="comiis_wztit b_0 f_0 cl"><h2><i class="comiis_font">&#xe607;</i> {lang comment}</h2></div>
		<div class="comiis_plli cl">
		<!--{loop $list $k $value}-->
			<!--{template home/space_comment_li}-->
		<!--{/loop}-->
		</div>
	<!--{if !$list}-->
		<div class="comiis_notip comiis_sofa cl">
			<i class="comiis_font f_e cl">&#xe613;</i>
			<span class="f_d">{$comiis_lang['all6']}, {$comiis_lang['all7']}</span>
		</div>	
	<!--{/if}-->
	<!--{if $multi}-->$multi<!--{/if}-->
	<!--{eval comiis_load('Adz2lsPb2dccMClvpF', 'picid,theurl,secqaacheck,seccodecheck,article');}-->
	<!--{if $_G[uid] == $pic[uid] || checkperm('managealbum')}-->
	<div id="moption" popup="true" class="comiis_manage comiis_bodybg comiis_popup" style="display:none;" comiis_popup="comiis">
		<ul>
			<li><a href="home.php?mod=spacecp&ac=album&picid=$pic[picid]&op=edithot&handlekey=picedithothk_{$pic[picid]}" class="dialog bg_f b_b">{lang hot}</a></li>
			<li><a href="home.php?mod=spacecp&ac=album&op=editpic&albumid=$pic[albumid]&picid=$pic[picid]" class="redirect bg_f b_b">{lang manage_pic}</a></li>
			<li><a href="home.php?mod=spacecp&ac=album&op=edittitle&albumid=$pic[albumid]&picid=$pic[picid]&handlekey=edittitlehk_{$pic[picid]}" class="dialog bg_f b_b">{lang edit_description}</a></li>
			<li><a href="javascript:;" class="comiis_glclose mt10 bg_f f_g b_t">{lang cancel}</a></li>
		</ul>
	</div>
	<!--{/if}-->
	<!--{eval $comiis_foot = 'no';}-->
	<!--{template common/footer}-->
<!--{/if}-->