<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('f_list');
0
|| checktplrefresh('./source/plugin/company_manage/template/touch/f_list.htm', './template/default/touch/common/footer.htm', 1514778167, 'company_manage', './data/template/1_company_manage_touch_f_list.tpl.php', './source/plugin/company_manage/template', 'touch/f_list')
;?><?php include template('common/header'); ?><link rel="stylesheet" href="./source/plugin/company_manage/template/touch/dict/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
<link rel="stylesheet" href="./source/plugin/company_manage/template/dict/bootstrap-table/bootstrap-table.min.css" type="text/css" media="all">
<link rel="stylesheet" href="./source/plugin/company_manage/template/css/company_manage_common.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo $_G['setting']['csspath'];?><?php echo STYLEID;?>_common.css"/>
<style>
    #residedistrictbox, #showerror_residecity {
        display: inline;
    }

    p select.ps {
        width: 30% !important;
    }

    table a {
        color: #4d89cd !important;
    }

    .collapse-submenu > a:after {
        border: 4px solid transparent;
        border-top-color: #B0B0B0;
        display: block;
        float: right;
        width: 0;
        height: 0;
        margin-top: 5px;
        margin-right: -10px;
        content: " ";
    }

    .dropdown-menu > li > a > span {
        padding: 5px 50% 5px 5px;
    }

    .collapse-submenu .collapse li {
        padding: 3px 0px 3px 30px;
        background-color: #e9e9e9;
    }
</style>


<div class="btn-group">
    <button class="btn btn-default" type="button">地区</button>
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-submenu>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" style="width:100%;position:absolute;top:0;left:0;height:60%;z-index:99999">
    <div style="width:50%;background-color:white;height:60%;">
            <?php echo $diqu;?>
            <li class="dropdown-submenu">
                <a tabindex="0">Action</a>

                <ul class="dropdown-menu">
                    <li><a tabindex="0">Sub action</a></li>
                    <li data-toggle="collapse" class="collapse-submenu" href="#collapse1">
                        <a tabindex="0">Another sub action</a>

                        <ul id="collapse1" class="collapse">
                            <li><a tabindex="0">Sub action</a></li>
                            <li><a tabindex="0">Another sub action</a></li>
                            <li><a tabindex="0">Something else here</a></li>
                        </ul>
                    </li>
                    <li><a tabindex="0">Something else here</a></li>
                    <li class="disabled"><a tabindex="-1">Disabled action</a></li>
                    <li class="dropdown-submenu">
                        <a tabindex="0">Another action</a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="0">Sub action</a></li>
                            <li><a tabindex="0">Another sub action</a></li>
                            <li><a tabindex="0">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown-submenu">
                <a tabindex="0">Another action</a>

                <ul class="dropdown-menu">
                    <li><a tabindex="0">Sub action</a></li>
                    <li><a tabindex="0">Another sub action</a></li>
                    <li><a tabindex="0">Something else here</a></li>
                </ul>
            </li>
            <li><a tabindex="0">Something else here</a></li>
            <li class="divider"></li>
            <li><a tabindex="0">Separated link</a></li>
    </div>
    </ul>
</div>


<div id="pt" class="bm cl">
    <input type="text" id="company_name" placeholder="企业名称">
    <input class="btn btn-primary search_button" type="button" value="搜索">
</div>
<div>
    <div class="table-responsive">
        <form id="search_form">
            <input type="hidden" name="cate_id">
            <input class="btn btn-primary search_button" type="button" value="筛选">

        </form>

    </div>
</div>
<table id="company_list" data-mobile-responsive="true"></table>

<script src="./source/plugin/company_manage/template/touch/dict/jquery/jquery.min.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/touch/dict/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/touch/dict/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/touch/dict/bootstrap-table/bootstrap-table-locale-all.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/touch/js/f_table_common.js" type="text/javascript"></script>
<script src="./static/js/common.js" type="text/javascript"></script>
<script src="./static/js/common_extra.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/touch/js/f_content_common.js" type="text/javascript"></script>
<script src="./source/plugin/company_manage/template/touch/js/f_list.js" type="text/javascript"></script><?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?><?php $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''?><?php if(strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';?><?php } elseif(strpos($useragent, 'android') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';?><?php } elseif(strpos($useragent, 'windows phone') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';?><?php } ?>

<div id="mask" style="display:none;"></div>
<?php if(!$nofooter) { ?>
<div class="footer">
<div>
<?php if(!$_G['uid'] && !$_G['connectguest']) { ?>
<a href="forum.php">首页</a> | <a href="member.php?mod=logging&amp;action=login" title="登录">登录</a> | <a href="<?php if($_G['setting']['regstatus']) { ?>member.php?mod=<?php echo $_G['setting']['regname'];?><?php } else { ?>javascript:;" style="color:#D7D7D7;<?php } ?>" title="<?php echo $_G['setting']['reglinkname'];?>">注册</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1"><?php echo $_G['member']['username'];?></a> , <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" title="退出" class="dialog">退出</a>
<?php } ?>
</div>
    <div>
<a href="<?php echo $_G['setting']['mobile']['simpletypeurl']['0'];?>">标准版</a> |  
<a href="javascript:;" style="color:#D7D7D7;">触屏版</a> | 
<a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">电脑版</a> | 
<?php if($clienturl) { ?><a href="<?php echo $clienturl;?>">客户端</a><?php } ?>
    </div>
<p>&copy; Comsenz Inc.</p>
</div>
<?php } ?>
</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>
