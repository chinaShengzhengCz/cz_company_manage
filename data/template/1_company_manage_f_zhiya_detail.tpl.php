<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('f_zhiya_detail');
0
|| checktplrefresh('./source/plugin/company_manage/template/f_zhiya_detail.htm', './template/default/company_manage/zhiya_side_left.htm', 1514097762, 'company_manage', './data/template/1_company_manage_f_zhiya_detail.tpl.php', './source/plugin/company_manage/template', 'f_zhiya_detail')
|| checktplrefresh('./source/plugin/company_manage/template/f_zhiya_detail.htm', './template/default/common/footer.htm', 1514097762, 'company_manage', './data/template/1_company_manage_f_zhiya_detail.tpl.php', './source/plugin/company_manage/template', 'f_zhiya_detail')
;?><?php include template('common/header'); if(($oper=='child')||($oper=='holder')) { ?>
<link rel="stylesheet" href="./source/plugin/company_manage/template/dict/bootstrap/css/bootstrap.css" type="text/css" media="all">
<link rel="stylesheet" href="./source/plugin/company_manage/template/dict/bootstrap-table/bootstrap-table.min.css" type="text/css" media="all">
<link rel="stylesheet" href="./source/plugin/company_manage/template/css/company_manage_common.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo $_G['setting']['csspath'];?><?php echo STYLEID;?>_common.css"/>
<style>
    li {
        line-height: 30px;
    }

    table a {
        color: #4d89cd;
    }

    ul, ol {
        padding: 0;
        margin: 0;
    }

    p {
        margin: 0;
    }

    h1, h2, h3, h4, h5, h6 {
        margin: 0;
    }
</style>
<?php } ?>
<style>
    td a {
        color: #4d89cd;
    }
</style>
<div id="pt" class="bm cl">
    <div class="z">
        <a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
        <a href="plugin.php?id=company_manage:company_zhiya_list_front">��Ѻ��</a>
    </div>
</div>


<style id="diy_style" type="text/css"></style>
<div id="ct" class="ct2_a wp cl">
    <div class="mn">
        <!--don't close the div here-->
        <ul class="tb cl">
            <li <?php if(($oper=='view')) { ?>class="a"<?php } ?>><a href="plugin.php?id=company_manage:company_zhiya_detail&amp;oper=view&amp;zhiya_id=<?php echo $zhiya_data['id'];?>">��������</a></li>
            <li <?php if(($oper=='child')) { ?>class="a"<?php } ?>><a href="plugin.php?id=company_manage:company_zhiya_detail&amp;oper=child&amp;zhiya_id=<?php echo $zhiya_data['id'];?>">�����Ѻ</a></li>
        </ul>
        <?php if(($oper=='view')) { ?>
        <table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
            <tr>
                <th>��Ʊ����</th>
                <td><?php if(!empty($zhiya_data['stock_code'])) { ?><?php echo $zhiya_data['stock_code'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ʊ����</th>
                <td><?php if(!empty($zhiya_data['code_company'])) { ?><a href="plugin.php?id=company_manage:company_manage_content&amp;oper=view&amp;code=<?php echo $zhiya_data['code'];?>" target="_blank"><?php echo $zhiya_data['code_company'];?></a><?php } ?></td>
            </tr>
            <tr>
                <th>�ɶ�����</th>
                <td><?php if(!empty($zhiya_data['holder_name'])) { ?><?php echo $zhiya_data['holder_name'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ѻ��</th>
                <td><?php if(!empty($zhiya_data['zhiya_company_name'])) { ?><?php echo $zhiya_data['zhiya_company_name'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ѻ������</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['zhiya_type'];?><?php } ?></td>
            </tr>
            <tr>
                <th>�Ƿ���Ѻ�ع�</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['is_rebuy'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ѻ����(���)</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['zhiya_count'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ѻ�ɷ�����</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['stock_type'];?><?php } ?></td>
            </tr>
            <tr>
                <th>�ο���ֵ(��Ԫ)</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['value'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ѻ��ʼʱ��</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['start_date'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ѻ��ֹ����</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['end_date'];?><?php } ?></td>
            </tr>
            <tr>
                <th>��Ѻ����</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['dis_date'];?><?php } ?></td>
            </tr>
            <tr>
                <th>���˵��</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['remark'];?><?php } ?></td>
            </tr>
            <tr>
                <th>������ҵ</th>
                <td><?php if(!empty($zhiya_data)) { ?><?php echo $zhiya_data['industry'];?><?php } ?></td>
            </tr>
        </table>
        <?php } elseif(($oper=='child')) { ?>
        <table id="company_list"></table>

        <?php } ?>

    </div>


    <div class="appl">
        <!--[diy=diysidetop]-->
        <div id="diysidetop" class="area"></div><!--[/diy]-->
        <div class="tbn">
 <!--CSS/JS-->
<style type="text/css">
*{margin:0;padding:0;}
ul,li{list-style:none;}
body{font-size:14px;font-family:"΢���ź�";}
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
<li><a href="plugin.php?id=company_manage:company_zhiya_list_front">��Ѻ����</a><span></span></li>
<li><a href="javescript:void(0)" onclick="finish_alert();return false;">��Ѻ��������</a><span></span></li>
<li><a href="javescript:void(0)" onclick="dis_recent();return false;">���ڽ�Ѻ</a><span></span></li>
<li><a href="javescript:void(0)" onclick="zhiya_recent(1);return false;">1���¶�����Ѻ</a><span></span></li>
<li><a href="javescript:void(0)" onclick="zhiya_recent(3);return false;">3���¶�����Ѻ</a><span></span></li>
<li><a href="javescript:void(0)" onclick="dis_recent(1);return false;">1�����ڽ�Ѻ</a><span></span></li>
<li><a href="javescript:void(0)" onclick="dis_recent(3);return false;">3�����ڽ�Ѻ</a><span></span></li>
<li><a href="javescript:void(0)" onclick="multi_search();return false;">��ϲ�ѯ</a><span></span>
</li>
<li><a href="forum.php?mod=forumdisplay&amp;fid=2" target="_blank">��վ��Ѻ��Ŀ</a><span></span>    
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
<script src="./source/plugin/company_manage/template/js/f_table_common.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/js/f_content_common.js" type="text/javascript"></script>
<script src="static/js/common.js" type="text/javascript"></script>
<script src="static/js/common_extra.js" type="text/javascript"></script>
<?php if(($oper=='view')) { ?>
<script src="./source/plugin/company_manage/template/js/f_zhiya_detail.js" type="text/javascript"></script>
<?php } elseif(($oper=='child')) { ?>
<script src="./source/plugin/company_manage/template/js/f_related_zhiya.js" type="text/javascript"></script>

<?php } else { ?>
<script src="./source/plugin/company_manage/template/js/f_list.js" type="text/javascript"></script>
<?php } ?>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="�ر�">�ر�</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>վ���Ƽ�<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="��һ��" title="��һ��" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="��һ��" title="��һ��" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
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
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">�鿴 &raquo;</a></p>
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
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>����<?php } else { ?>����<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script>
<?php } ?>
</div>
<?php } if(!$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
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
<?php } if(!$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])) { ?>
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
h5n.shownotification('pm', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=pm', '<?php echo avatar($_G[uid],small,true);?>', '�µĶ���Ϣ', '���µĶ���Ϣ����ȥ������');
<?php } if($_G['member']['newprompt'] && $_GET['do'] != 'notice') { if(is_array($_G['member']['category_num'])) foreach($_G['member']['category_num'] as $key => $val) { $noticetitle = lang('template', 'notice_'.$key);?>h5n.shownotification('notice_<?php echo $key;?>', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=notice&view=<?php echo $key;?>', '<?php echo avatar($_G[uid],small,true);?>', '<?php echo $noticetitle;?> (<?php echo $val;?>)', '���µ����ѣ���ȥ������');
<?php } } ?>
}
</script>
<?php } userappprompt();?><?php if($_G['basescript'] != 'userapp') { ?>
<div id="scrolltop">
<?php if($_G['fid'] && $_G['mod'] == 'viewthread') { ?>
<span><a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?><?php if($_GET['from']) { ?>&amp;from=<?php echo $_GET['from'];?><?php } ?>" onclick="showWindow('reply', this.href)" class="replyfast" title="���ٻظ�"><b>���ٻظ�</b></a></span>
<?php } ?>
<span hidefocus="true"><a title="���ض���" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>���ض���</b></a></span>
<?php if($_G['fid']) { ?>
<span>
<?php if($_G['mod'] == 'viewthread') { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>" hidefocus="true" class="returnlist" title="�����б�"><b>�����б�</b></a>
<?php } else { ?>
<a href="forum.php" hidefocus="true" class="returnboard" title="���ذ��"><b>���ذ��</b></a>
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