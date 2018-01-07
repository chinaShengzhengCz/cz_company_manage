<?PHP exit('Access Denied');?>
<!--{hook/global_footer_mobile}-->
<!--{eval comiis_load('j9alEz9X55JrjbA3l9', '');}-->
<div id="mask" style="display:none;"></div>
<div id="comiis_menu_bg" style="display:none;"></div>
<div id="comiis_alert" style="display:none;"></div></div>
<!--{if $comiis_app_switch['comiis_statcode']}--><div style="display:none;">$comiis_app_switch['comiis_statcode']</div><!--{/if}-->
<!--{if $comiis_app_switch['comiis_scrolltop'] > 0}-->
<div class="comiis_footer_scroll{if $comiis_app_switch['comiis_scrolltop'] == 1} scrolltop_l{/if}"{if $comiis_foot != 'no' || $comiis_open_footer} style="bottom:62px;"{/if}>
<!--{if $comiis_app_switch['comiis_scrolltop'] > 0}-->
    <!--{if $comiis_app_switch['comiis_leftnv_rtop'] == 0}--><a href="javascript:;" onclick="$('body,html').animate({scrollTop:0}, 800);" class="comiis_scrolltops f_f" style="display:none"><i class="comiis_font">&#xe621</i></a>
<!--{/if}-->
    <!--{if $comiis_isweixin == 1 && $comiis_app_switch['comiis_leftnv_rback'] == 1}-->    
        <!--{if $comiis_app_switch['comiis_foot_backico'] != 1 && $comiis_app_switch['comiis_foot_backico'] != 0}-->    
            <a href="javascript:history.back();" class="f_f"><i class="comiis_font">&#xe60d</i></a>
        <!--{/if}-->    
    <!--{/if}-->
    <!--{if $comiis_app_switch['comiis_leftnv_rico'] == 0}--><a href="javascript:;" onclick="comiis_leftnv();" class="f_f"><i class="comiis_font">&#xe603</i></a><!--{/if}-->
    <!--{if $comiis_isweixin == 1 && $comiis_app_switch['comiis_leftnv_rshownav'] == 0}-->
        <a href="javascript:;" class="comiis_isweixin_key f_f"><i class="comiis_font">&#xe62b</i></a>
        <script>
        $(document).on('click', '.comiis_isweixin_key', function() {
        $('#comiis_head').toggleClass("comiis_head_hidden");
        });
        </script>
    <!--{/if}-->
<!--{/if}-->
<!--{if $_G['uid'] && ($_G[member][newpm] || $_G[member][newprompt]) && $comiis_app_switch['comiis_showpm'] == 2}-->
    <a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1&mobile=2#pm" class="bg_a f_f comiis_rpm"><i class="comiis_font">&#xe614</i><span class="bg_del"></span></a>
<!--{/if}-->
<!--{if ($_G['basescript'] == 'forum' && CURMODULE == 'forumdisplay' && $comiis_app_switch['comiis_list_fpost'] == 2) || ($_G['basescript'] == 'comiis_app_home' && CURMODULE == 'forumdisplay')}-->
    <!--{if $comiis_app_switch['comiis_post_yindao'] == 1 && $_G['group']['allowpost'] && ($_G['group']['allowposttrade'] || $_G['group']['allowpostpoll'] || $_G['group']['allowpostreward'] || $_G['group']['allowpostactivity'] || $_G['group']['allowpostdebate'] || $_G['setting']['threadplugins'] || $_G['forum']['threadsorts'])}-->
        <a href="{if $_G['uid']}#comiis_post_type{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" title="{$comiis_lang['send_threads']}" class="{if $_G['uid']}popup {/if}bg_0 f_f"><i class="comiis_font">&#xe62d</i></a>
    <!--{else}-->
        <a href="{if $_G['uid']}forum.php?mod=post&action=newthread&fid=$_G[fid]{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" title="{$comiis_lang['send_threads']}" class="bg_0 f_f"><i class="comiis_font">&#xe62d</i></a>
    <!--{/if}-->
<!--{/if}-->
<!--{if $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='blog'}-->
    <a href="{if $_G['uid']}home.php?mod=spacecp&ac=blog{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="bg_0 f_f"><i class="comiis_font">&#xe62d</i></a>
<!--{/if}-->
<!--{if $_G['basescript'] == 'home' && CURMODULE == 'space' && $_GET['do']=='album'}-->
    <a href="{if $_G['uid']}home.php?mod=spacecp&ac=upload{elseif !$_G[connectguest]}javascript:popup.open('{$comiis_lang['tip16']}', 'confirm', 'member.php?mod=logging&action=login');{else}javascript:popup.open('{$comiis_lang['reg23']}', 'confirm', 'member.php?mod=connect');{/if}" class="bg_0 f_f"><i class="comiis_font">&#xe642</i></a>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_leftnv_rsxico'] == 0}--><a href="javascript:;" onclick="location.reload();" class="f_f"><i class="comiis_font" style="font-size:22px">&#xe673</i></a><!--{/if}-->
</div>
<!--{/if}-->
<!--{if $comiis_closefooter == 1}-->
	<!--{eval $comiis_foot = 'no';$comiis_open_footer = 0;}-->
<!--{/if}-->
<!--{if ($comiis_foot != 'no' || $comiis_open_footer) && count($comiis_app_nav['mnav'])}-->
<div class="comiis_foot_height"></div>
<!--{/if}-->
<!--{if ($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') && CURMODULE == 'viewthread'}-->
<!--{eval comiis_load('jj74PQM0ehoQfoM9EU', 'comiis_thead_fav,comiis_my_recommend,comiis_isweixin');}-->
<!--{elseif ($comiis_foot != 'no' || $comiis_open_footer) && count($comiis_app_nav['mnav'])}-->
<div id="comiis_foot_box" class="qzsi">
	<div id="comiis_foot_memu" class="comiis_foot_memu bg_f b_t">
		<ul class="comiis_flex">
		<!--{eval $nn=0;}-->
		<!--{loop $comiis_app_nav['mnav'] $temp}-->
			<!--{eval $nn++;}-->
			<!--{if $nn < 7}-->
				<!--{if $temp['url'] == ':comiis:'}-->
					<li class="flex"><a href="javascript:;" class="comiis_openfootbox" title="$temp['name']" icon1="&#x{$temp['icon']};" icon2="&#x{$temp['bgcolor']};"><i class="comiis_font foot_btn bg_0 f_f">&#x{$temp['icon']};</i></a></li>
				<!--{elseif $temp['url'] == '#comiis_post'}-->
					<li class="flex"><a href="javascript:;" class="comiis_openfootboxg f_c" title="$temp['name']" icon1="&#x{$temp['icon']};" icon2="&#x{$temp['bgcolor']};"><i class="comiis_font">&#x{$temp['icon']};</i><span>$temp['name']</span></a></li>
				<!--{else}-->
					<li class="flex f_{if $temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2}0{else}c{/if}"><a href="$temp['url']" title="$temp['name']"><i class="comiis_font">&#x{if $temp['nav_ids'] == $comiis_nav_ids || $temp['nav_ids'] == $comiis_nav_ids2}$temp['bgcolor']{else}$temp['icon']{/if};</i><span>$temp['name']</span></a></li>
				<!--{/if}-->
			<!--{/if}-->
		<!--{/loop}-->
		</ul>
	</div>
	<div class="comiis_gobtn cl">
	<!--{if $comiis_app_switch['comiis_fnav_date']}-->
		<div class="comiis_gobtn_top cl">
			<div class="comiis_fttime cl" id="comiis_show_datebox"></div>		
		</div>
	<!--{/if}-->
	<!--{if $comiis_app_switch['comiis_fnavimgs']}-->$comiis_app_switch['comiis_fnavimgs']<!--{/if}-->
	</div>
	<div class="comiis_gobtn_box bg_f b_t cl">
		<h2 class="f_c">{$comiis_app_switch['comiis_fnav_title']}</h2>
		<ul class="cl">
			<!--{loop $comiis_app_nav['fnav'] $temp}-->
				<li><a href="$temp['url']"><span style="background:{if $temp['bgcolor']}{$temp['bgcolor']}{else}#FF9900{/if};"><i class="comiis_font f_f">&#x{if $temp['icon']}$temp['icon']{else}e651{/if};</i></span>$temp['name']</a></li>
			<!--{/loop}-->
		</ul>
		<div class="comiis_gobtn_foot cl">
		</div>
	</div>
</div>
<script type="text/javascript"> 
<!--{if $comiis_app_switch['comiis_fnav_date']}-->
var sWeek = new Array({$comiis_lang['tip223']});
var dNow = new Date();
var CalendarData = new Array(100);
var madd = new Array(12);
var numString = "{$comiis_lang['tip224']}";
var monString = "{$comiis_lang['tip225']}";
var cYear, cMonth, cDay, TheDate;
CalendarData = new Array(0xA4B, 0x5164B, 0x6A5, 0x6D4, 0x415B5, 0x2B6, 0x957, 0x2092F, 0x497, 0x60C96, 0xD4A, 0xEA5, 0x50DA9, 0x5AD, 0x2B6, 0x3126E, 0x92E, 0x7192D, 0xC95, 0xD4A, 0x61B4A, 0xB55, 0x56A, 0x4155B, 0x25D, 0x92D, 0x2192B, 0xA95, 0x71695, 0x6CA, 0xB55, 0x50AB5, 0x4DA, 0xA5B, 0x30A57, 0x52B, 0x8152A, 0xE95, 0x6AA, 0x615AA, 0xAB5, 0x4B6, 0x414AE, 0xA57, 0x526, 0x31D26, 0xD95, 0x70B55, 0x56A, 0x96D, 0x5095D, 0x4AD, 0xA4D, 0x41A4D, 0xD25, 0x81AA5, 0xB54, 0xB6A, 0x612DA, 0x95B, 0x49B, 0x41497, 0xA4B, 0xA164B, 0x6A5, 0x6D4, 0x615B4, 0xAB6, 0x957, 0x5092F, 0x497, 0x64B, 0x30D4A, 0xEA5, 0x80D65, 0x5AC, 0xAB6, 0x5126D, 0x92E, 0xC96, 0x41A95, 0xD4A, 0xDA5, 0x20B55, 0x56A, 0x7155B, 0x25D, 0x92D, 0x5192B, 0xA95, 0xB4A, 0x416AA, 0xAD5, 0x90AB5, 0x4BA, 0xA5B, 0x60A57, 0x52B, 0xA93, 0x40E95);
madd[0] = 0;
madd[1] = 31;
madd[2] = 59;
madd[3] = 90;
madd[4] = 120;
madd[5] = 151;
madd[6] = 181;
madd[7] = 212;
madd[8] = 243;
madd[9] = 273;
madd[10] = 304;
madd[11] = 334;
function GetBit(m, n) {
    return (m >> n) & 1
}
function e2c() {
    TheDate = (arguments.length != 3) ? new Date() : new Date(arguments[0], arguments[1], arguments[2]);
    var total, m, n, k;
    var isEnd = false;
    var tmp = TheDate.getFullYear();
    total = (tmp - 1921) * 365 + Math.floor((tmp - 1921) / 4) + madd[TheDate.getMonth()] + TheDate.getDate() - 38;
    if (TheDate.getYear() % 4 == 0 && TheDate.getMonth() > 1) {
        total++
    }
    for (m = 0;; m++) {
        k = (CalendarData[m] < 0xfff) ? 11 : 12;
        for (n = k; n >= 0; n--) {
            if (total <= 29 + GetBit(CalendarData[m], n)) {
                isEnd = true;
                break
            }
            total = total - 29 - GetBit(CalendarData[m], n)
        }
        if (isEnd) break
    }
    cYear = 1921 + m;
    cMonth = k - n + 1;
    cDay = total;
    if (k == 12) {
        if (cMonth == Math.floor(CalendarData[m] / 0x10000) + 1) {
            cMonth = 1 - cMonth
        }
        if (cMonth > Math.floor(CalendarData[m] / 0x10000) + 1) {
            cMonth--
        }
    }
}
function GetcDateString() {
    var tmp = '<h2 class="f_f">';
    if (cMonth < 1) {
        tmp += "{$comiis_lang['tip226']}";
        tmp += monString.charAt( - cMonth - 1)
    } else {
        tmp += monString.charAt(cMonth - 1)
    }
    tmp += '{$comiis_lang['tip227']}</h2><p class="bg_f f_c">';
    tmp += (cDay < 11) ? "{$comiis_lang['tip228']}": ((cDay < 20) ? "{$comiis_lang['tip229']}": ((cDay < 30) ? "{$comiis_lang['tip230']}": "{$comiis_lang['tip234']}"));
    if (cDay == 20) {
    tmp += "{$comiis_lang['tip229']}";
    }
    if (cDay % 10 != 0 || cDay == 10) {
        tmp += numString.charAt((cDay - 1) % 10)
    }
    return tmp + '</p>'
}
function GetLunarDay(solarYear, solarMonth, solarDay) {
    if (solarYear < 1921 || solarYear > 2020) {
        return ""
    } else {
        solarMonth = (parseInt(solarMonth) > 0) ? (solarMonth - 1) : 11;
        e2c(solarYear, solarMonth, solarDay);
        return GetcDateString()
    }
}
function comiis_timesadd0(obj){
	if(obj<10){
		return "0" +""+ obj;
	}else{
		return obj;
	}
}
var D = new Date();
var yy = D.getFullYear();
var mm = D.getMonth() + 1;
var dd = D.getDate();
var ww = D.getDay();
var ss = parseInt(D.getTime() / 1000);
function getFullYear(d) {
    yr = d.getYear();
    if (yr < 1000) yr += 1900;
    return yr
}
$('#comiis_show_datebox').html('<div class="z fttime_rq f_b">' + comiis_timesadd0(dNow.getDate()) + '</div><div class="z fttime_xq"><span class="f_b">{$comiis_lang['tip231']}' + sWeek[dNow.getDay()] + '</span><em class="f_d">/</em><span class="f_b">' + getFullYear(dNow) + '{$comiis_lang['tip232']}' + comiis_timesadd0(dNow.getMonth() + 1) + '{$comiis_lang['tip233']}</span></div><div class="z fttime_nl bg_0">' + GetLunarDay(yy, mm, dd) + '</div>');
<!--{/if}-->
$(document).on('click', '.comiis_openfootbox,.comiis_openfootboxg,.comiis_gobtn', function() {
	if($('#comiis_foot_box').hasClass('comiis_footer_showbox')){
		$('.comiis_openfootboxg i').text($('.comiis_openfootboxg').attr('icon1')).removeClass('f_0');
		$('.comiis_openfootbox i').text($('.comiis_openfootbox').attr('icon1'));
		$('#comiis_foot_box').removeClass('comiis_footer_showbox');
		Comiis_Touch_on = 1;
	}else{
		Comiis_Touch_on = 0;
		$('.comiis_openfootboxg i').text($('.comiis_openfootboxg').attr('icon2')).addClass('f_0');
		$('.comiis_openfootbox i').text($('.comiis_openfootbox').attr('icon2'));
		$('#comiis_foot_box').addClass('comiis_footer_showbox');
	}
});
</script> 
<!--{eval loadcache('forums');}-->
<!--{eval comiis_load('g7J1y0H7T0j12HU32t', '');}-->
<!--{/if}-->	
<div id="comiis_bgbox" style="display:none;"></div>
</div>
{if $comiis_app_switch['comiis_share_html']}
	{$comiis_app_switch['comiis_share_html']}
{/if}
<script>
$('.comiis_openrebox').on('click', function() {
	<!--{if $_G['uid']}-->
		comiis_openrebox(1);
	<!--{else}-->
		popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');
	<!--{/if}-->
	return false;
});
<!--{if $comiis_app_switch['comiis_loadimg']}-->
$(document).ready(function() {
	$("img.comiis_loadimages").lazyload();
});
<!--{/if}-->
var comiis_wx_title = '{if $comiis_app_wx_share['title']}{$comiis_app_wx_share['title']}{else}{$navtitle}{/if}';
var comiis_wx_description = '{if $comiis_app_wx_share['desc']}{$comiis_app_wx_share['desc']}{elseif $metadescription}{echo dhtmlspecialchars($metadescription)}{else}{if $comiis_app_switch['comiis_sitename']}$comiis_app_switch['comiis_sitename']{else}$_G['setting']['sitename']{/if}
{/if}';
<!--{if $comiis_app_wx_share['img']}-->
	var comiis_wx_imgUrl = "{$_G['siteurl']}{$comiis_app_wx_share['img']}";
<!--{else}-->
	var comiis_wx_img = $("img[src*='attachment'],img[src*='forum.php?mod=image']:eq(0)").attr('src');
	if (!comiis_wx_img) {
		var comiis_wx_img = $("img[comiis_loadimages*='attachment'],img[comiis_loadimages*='forum.php?mod=image']:eq(0)").attr('comiis_loadimages');
		if (!comiis_wx_img) {
			var comiis_wx_img = '{$comiis_app_switch['comiis_wximg']}';
		}
	}
	var comiis_wx_imgUrl = ((comiis_wx_img.indexOf("ttp://") > 0 || comiis_wx_img.indexOf("ttps://") > 0) ? '' : "{$_G['siteurl']}") + comiis_wx_img;			
<!--{/if}-->
	var comiis_wx_url = window.location.href.replace('&mobile=2', '');
<!--{if $comiis_app_switch['comiis_share_js']}-->
function comiis_user_share() {
	{$comiis_app_switch['comiis_share_js']}
}
<!--{/if}-->
</script>
<!--{if $_G[uid] && !isset($_G['cookie']['checkpm'])}-->
<script type="text/javascript" src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=$_G[timestamp]"></script>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_foot_backico'] < 2 && $comiis_is_new_url == 1}-->
<script>$('.backico').html('<li class="backico" style="margin-left:3px;"><a href="./" class="b_r"><i class="comiis_font f_0" style="line-height:24px;">&#xe662;</i></a></li>');</script>
<!--{/if}-->
<!--{if $comiis_app_switch['comiis_wxappid'] && $comiis_app_switch['comiis_wxappsecret']}-->
	<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/jssdk.php';}-->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
	<script>
		wx.config({
			debug: 0,
			appId: '{$comiis_signPackage["appId"]}',
			timestamp: '{$comiis_signPackage["timestamp"]}',
			nonceStr: '{$comiis_signPackage["nonceStr"]}',
			signature: '{$comiis_signPackage["signature"]}',
			jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo', 'onMenuShareQZone', 'getLocation', 'openLocation']
		});
		wx.ready(function () {
			var comiis_wx_share_data = {
				title: comiis_wx_title,
				desc: comiis_wx_description,
				imgUrl: comiis_wx_imgUrl,
				link: comiis_wx_url
			}
			wx.onMenuShareAppMessage(comiis_wx_share_data);
			wx.onMenuShareQQ(comiis_wx_share_data);
			wx.onMenuShareWeibo(comiis_wx_share_data);
			wx.onMenuShareQZone(comiis_wx_share_data);
			wx.onMenuShareTimeline(comiis_wx_share_data);
		});
	</script>
<!--{/if}-->
</body>
</html>
<!--{eval}-->
	global $comiis_fsimage;
	$content = ob_get_contents();
	ob_end_clean();
	$content = output_replace($content);
	$content = str_replace(array('http://'.$_G['setting']['domain']['app']['default'].'/'), array($_G['siteurl']), $content);
	$_G['gzipcompress'] ? ob_start('ob_gzhandler') : ob_start();
	echo $content;
	updatesession();
	output();		
<!--{/eval}-->