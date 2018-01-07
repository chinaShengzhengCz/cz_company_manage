<?PHP exit('Access Denied');?>
<!--{if $sgid}--><!--{eval $_GET['hot'] = 'yes';}--><!--{/if}-->
<!--{eval include_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_grouplist.php'}-->
<script>
	var url = 'group.php?gid={$gid}';
	function comiis_grouplist(id) {
		$('.comiis_bbslist_gid li').removeClass('bg_f');
		$('#comiis_grouplist_l_' + id).addClass('bg_f');
		$('.comiis_bbslist_fid ul').css("display" , "none");
		$('#comiis_grouplist_' + id).css("display" , "block");
		if(id == 0){
			if(url.indexOf("hot=yes") < 0){
				url = url + '&hot=yes';
			}
		}else{
			url = 'group.php?gid=' + id;
		}
		window.history.pushState({title:document.title,url:url},document.title,url);
	}
</script>
<script src="template/comiis_app/comiis/js/comiis_forum.js?{VERHASH}" charset="{CHARSET}"></script>
<div class="comiis_topsearch cl">	  
    <div id="comiis_search_noe"><a href="javascript:comiis_search_show(1);" class="ssbox ssct b_ok bg_f f_d"><i class="comiis_font f_d">&#xe622;</i> $comiis_group_lang['024']</a></div>
    <div id="comiis_search_two" style="display:none">            
        <form class="searchform" method="post" autocomplete="off" action="search.php?mod=group">
            <input type="hidden" name="formhash" value="{FORMHASH}" />
            <input type="hidden" name="searchsubmit" value="yes" />
            <ul class="comiis_flex">				
            <input type="search" id="scform_srchtxt" name="srchtxt" placeholder="{$comiis_lang['enter_content']}..." class="ssbox b_ok bg_f f_d flex" />	
            <a href="javascript:comiis_search_show(0);" class="f_0">{$comiis_lang['all9']}</a>
            </ul>			
        </form>
    </div>
</div>	
<script>
function comiis_search_show(a){
    if(a == 1){
        $('#comiis_search_noe').hide();
        $('#comiis_search_two').show()
        $('#scform_srchtxt').focus();
    }else{
        $('#comiis_search_two').hide();
        $('#comiis_search_noe').show();
    }
}
</script>
<!--{eval comiis_load('v8jnSKFNPFDLPNEypJ', 'first,gid,user_fid,comiis_group_lang,list,lastupdategroup,comiis_isweixin');}-->
{eval}
$comiis_app_wx_share['img'] = './template/comiis_app/pic/icon152.png';
$comiis_app_wx_share['title'] = $comiis_group_lang['001'].' - '.$comiis_app_switch['comiis_sitename'];
{/eval}