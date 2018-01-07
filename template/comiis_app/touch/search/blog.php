<?PHP exit('Access Denied');?>
<!--{eval $comiis_bg = 1;}-->
<!--{template common/header}-->
<div id="ct" class="w">
	<form class="searchform" method="post" autocomplete="off" action="search.php?mod=blog">
		<input type="hidden" name="formhash" value="{FORMHASH}" />
		<!--{subtemplate search/pubsearch}-->
	</form>
	<!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
	<!--{subtemplate search/blog_list}-->
	<!--{/if}-->
</div>
<!--{eval $comiis_foot = 'no';}-->
<!--{template common/footer}-->