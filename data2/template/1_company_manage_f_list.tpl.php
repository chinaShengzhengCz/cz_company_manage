<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('f_list');
0
|| checktplrefresh('./source/plugin/company_manage/template/f_list.htm', './template/default/company_manage/side_left.htm', 1512792732, 'company_manage', './data/template/1_company_manage_f_list.tpl.php', './source/plugin/company_manage/template', 'f_list')
|| checktplrefresh('./source/plugin/company_manage/template/f_list.htm', './template/default/common/footer.htm', 1512792732, 'company_manage', './data/template/1_company_manage_f_list.tpl.php', './source/plugin/company_manage/template', 'f_list')
;?><?php include template('common/header'); ?><link rel="stylesheet" href="./source/plugin/company_manage/template/dict/bootstrap/css/bootstrap.css" type="text/css" media="all">
<link rel="stylesheet" href="./source/plugin/company_manage/template/dict/bootstrap-table/bootstrap-table.min.css" type="text/css" media="all">
<link rel="stylesheet" href="./source/plugin/company_manage/template/css/company_manage_common.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo $_G['setting']['csspath'];?><?php echo STYLEID;?>_common.css"/>
<style>
    #residedistrictbox, #showerror_residecity {
        display: inline;
    }

    table a {
        color: #4d89cd;
    }
</style>

<div id="pt" class="bm cl">
    <div class="z">
        <a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
        <a href="plugin.php?id=company_manage:company_manage_list_front">机构名录</a>
    </div>
    <div style="display:inline-block;float:right">
        <span style="margin-left:20px">企业名称</span>
        <input type="text" id="company_name">
        <input class="btn btn-primary search_button" type="button" value="搜索">
    </div>
</div>

<style id="diy_style" type="text/css"></style>
<div id="ct" class="ct2_a wp cl">
    <div class="mn">
        <div class="table-responsive">
            <form id="search_form">
                <input type="hidden" name="cate_id">
                <span>地区</span>
                <?php echo $diqu;?>
                <input class="btn btn-primary search_button" type="button"  value="筛选">
            </form>

        </div>
        <table id="company_list"></table>


    </div>

    <div class="appl">
        <!--[diy=diysidetop]-->
        <div id="diysidetop" class="area"></div><!--[/diy]-->
        <div class="tbn">
 <!--CSS/JS-->
<style type="text/css">
*{margin:0;padding:0;}
ul,li{list-style:none;}
body{font-size:14px;font-family:"微软雅黑";}
.top-menu{display:block;width:150px;}
.top-title{background:#e4393c;color:white;height:30px;line-height:30px;font-size:14px;padding-left:0px;}
.top-menu li{display:block;padding-left:1px;height:30px;line-height:30px;}
.top-menu li:hover{background:none;box-shadow:0 0 2px #ddd;z-index:3;}
.top-menu a{text-decoration:none;color:black;}
.top-menu a:hover{font-weight:900;text-decoration:underline;color:#e4393c;}
.content{background:white;position:absolute;margin: -32px 0 0 127px;display:none;box-shadow:0 0 8px #ddd;z-index:1px;}
.content .div-left{width:300px;float:left;margin:2px;}
.top-menu li:hover .content{display:block;}
.top-menu li:hover span{position:relative;width:20px;height:20px;display:inline-block;float:right;background:white;z-index:20;}
.div-left dl{display:block;overflow:hidden;padding-bottom:8px;border-bottom: 1px solid #EEE;}
.div-left dl dt{display:block;height:22px;line-height:20px;text-align:center;float:left;padding:0 6px;}
.div-left dl dd{display:block;overflow:hidden;}
.div-left dl dt a{color: #e4393c;font-weight: bold;text-decoration: underline;font-size: 12pt;}
.div-left dl dd a{ display:block;float:left;border-left:1px solid #CCC;color: #737373;font-size: 10pt;padding: 0 8px;height: 14px;line-height: 14px;margin: 4px 0;}
</style>
<script type="text/javascript">
</script>
<!--div-->
<ul class="top-menu">
<li><a href="javascript:void(0)" onclick="cate_search(3)">期货</a><span></span>    
<div class="content">
<div class="div-left">
<dl>
<dt>期货</dt>
<dd>
<a href="javascript:void(0)" onclick="cate_search(3)">全部</a> <a href="javascript:void(0)" onclick="cate_search(4)">分公司</a> <a href="javascript:void(0)" onclick="cate_search(5)">营业部</a>
</dd>
</dl>
</div>
</div>
</li>

</ul>
</div>        <!--[diy=diysidebottom]-->
        <div id="diysidebottom" class="area"></div><!--[/diy]-->
    </div>
</div>

<script src="./source/plugin/company_manage/template/dict/jquery/jquery.min.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/dict/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/dict/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/dict/bootstrap-table/bootstrap-table-locale-all.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="static/js/common_extra.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/js/f_table_common.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/js/f_content_common.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/js/f_list.js" type="text/javascript"></script>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
</h2>
</div>
<div class="bm_c" id="focus_con">
</div>
</div>
</div><?php $focusi = 0;?><?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
<dl class="xld cl bbda">
<dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
<?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
<dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
</dl>
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?><?php } ?>
<script type="text/javascript">
var focusnum = <?php echo $focusnum;?>;
if(focusnum < 2) {
$('focus_ctrl').style.display = 'none';
}
if(!$('focuscur').innerHTML) {
var randomnum = parseInt(Math.round(Math.random() * focusnum));
$('focuscur').innerHTML = Math.max(1, randomnum);
}
showfocus();
var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
<div id="ft" class="wp cl">
<div id="flk" class="y">
<p>
<?php if($_G['setting']['site_qq']) { ?><a href="http://wpa.qq.com/msgrd?V=3&amp;Uin=<?php echo $_G['setting']['site_qq'];?>&amp;Site=<?php echo $_G['setting']['bbname'];?>&amp;Menu=yes&amp;from=discuz" target="_blank" title="QQ"><img src="<?php echo IMGDIR;?>/site_qq.jpg" alt="QQ" /></a><span class="pipe">|</span><?php } if(is_array($_G['setting']['footernavs'])) foreach($_G['setting']['footernavs'] as $nav) { if($nav['available'] && ($nav['type'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1)) ||
!$nav['type'] && ($nav['id'] == 'stat' && $_G['group']['allowstatdata'] || $nav['id'] == 'report' && $_G['uid'] || $nav['id'] == 'archiver' || $nav['id'] == 'mobile' || $nav['id'] == 'darkroom'))) { ?><?php echo $nav['code'];?><span class="pipe">|</span><?php } } ?>
<strong><a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></strong>
<?php if($_G['setting']['icp']) { ?>( <a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo $_G['setting']['icp'];?></a> )<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footerlink'])) echo $_G['setting']['pluginhooks']['global_footerlink'];?>
<?php if($_G['setting']['statcode']) { ?><?php echo $_G['setting']['statcode'];?><?php } ?>
</p>
<p class="xs0">
GMT<?php echo $_G['timenow']['offset'];?>, <?php echo $_G['timenow']['time'];?>
<span id="debuginfo">
<?php if(debuginfo()) { ?>, Processed in <?php echo $_G['debuginfo']['time'];?> second(s), <?php echo $_G['debuginfo']['queries'];?> queries
<?php if($_G['gzipcompress']) { ?>, Gzip On<?php } if(C::memory()->type) { ?>, <?php echo ucwords(C::memory()->type); ?> On<?php } ?>.
<?php } ?>
</span>
</p>
</div>
<div id="frt">
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?php echo $_G['setting']['version'];?></em><?php if(!empty($_G['setting']['boardlicensed'])) { ?> <a href="http://license.comsenz.com/?pid=1&amp;host=<?php echo $_SERVER['HTTP_HOST'];?>" target="_blank">Licensed</a><?php } ?></p>
<p class="xs0">&copy; 2001-2013 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a></p>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script>
<?php } ?>
</div>
<?php } if(!$_G['setting']['bbclosed']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?>
<script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?>
<script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } if($_GET['diy'] == 'yes') { if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<script type="text/javascript">patchNotice();</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script>
<?php } if(!$_G['setting']['bbclosed'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])) { ?>
<div class="focus plugin" id="ip_notice"></div>
<script type="text/javascript">ipNotice();</script>
<?php } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } if(($_G['member']['newpm'] || $_G['member']['newprompt']) && empty($_G['cookie']['ignore_notice'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>html5notification.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">
var h5n = new Html5notification();
if(h5n.issupport()) {
<?php if($_G['member']['newpm'] && $_GET['do'] != 'pm') { ?>
h5n.shownotification('pm', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=pm', '<?php echo avatar($_G[uid],small,true);?>', '新的短消息', '有新的短消息，快去看看吧');
<?php } if($_G['member']['newprompt'] && $_GET['do'] != 'notice') { if(is_array($_G['member']['category_num'])) foreach($_G['member']['category_num'] as $key => $val) { $noticetitle = lang('template', 'notice_'.$key);?>h5n.shownotification('notice_<?php echo $key;?>', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=notice&view=<?php echo $key;?>', '<?php echo avatar($_G[uid],small,true);?>', '<?php echo $noticetitle;?> (<?php echo $val;?>)', '有新的提醒，快去看看吧');
<?php } } ?>
}
</script>
<?php } userappprompt();?><?php if($_G['basescript'] != 'userapp') { ?>
<div id="scrolltop">
<?php if($_G['fid'] && $_G['mod'] == 'viewthread') { ?>
<span><a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onclick="showWindow('reply', this.href)" class="replyfast" title="快速回复"><b>快速回复</b></a></span>
<?php } ?>
<span hidefocus="true"><a title="返回顶部" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>返回顶部</b></a></span>
<?php if($_G['fid']) { ?>
<span>
<?php if($_G['mod'] == 'viewthread') { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" hidefocus="true" class="returnlist" title="返回列表"><b>返回列表</b></a>
<?php } else { ?>
<a href="forum.php" hidefocus="true" class="returnboard" title="返回版块"><b>返回版块</b></a>
<?php } ?>
</span>
<?php } ?>
</div>
<script type="text/javascript">_attachEvent(window, 'scroll', function () { showTopLink(); });checkBlind();</script>
<?php } if(isset($_G['makehtml'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>html2dynamic.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">
var html_lostmodify = <?php echo TIMESTAMP;?>;
htmlGetUserStatus();
<?php if(isset($_G['htmlcheckupdate'])) { ?>
htmlCheckUpdate();
<?php } ?>
</script>
<?php } output();?></body>
</html>
