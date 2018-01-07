<?PHP exit('Access Denied');?>
<!--{eval $keywordenc = $keyword ? rawurlencode($keyword) : '';}-->
<!--{eval comiis_load('MfFSCuuXF29JZAx2FF', 'srchtype,searchid,threadlist,articlelist,bloglist,albumlist,slist,keyword,comiis_group_lang');}-->
<!--{eval comiis_load('RPmEMW3m6Xi0E8pP3I', 'threadlist,searchid,show_color,searchparams,srchotquery,srchhotkeywords');}-->
<script>
function comiis_search(){
	window.location.href = 'search.php?mod='+$('#comiis_ssbox_style').children('option:selected').val()+'{if $keyword}&srchtxt=$keywordenc&searchsubmit=yes{/if}';
}
</script>