<?PHP exit('Access Denied');?>
<!--{block comiis_ztfl}-->
  <!--{if $thread['digest'] > 0}-->
	<span class="bg_c f_f">{$comiis_lang['thread_digest']}</span>
  <!--{elseif $thread[folder] == 'lock'}-->
	<span class="bg_del f_f">{$comiis_lang['close']}</span>
  <!--{elseif $thread['special'] == 1}-->
	<span class="bg_0 f_f">{$comiis_lang['thread_poll']}</span>
  <!--{elseif $thread['special'] == 2}-->
	<span class="bg_0 f_f">{$comiis_lang['thread_trade']}</span>
  <!--{elseif $thread['special'] == 3}-->
	<span class="bg_0 f_f">{$comiis_lang['thread_reward']}</span>
  <!--{elseif $thread['special'] == 4}-->
	<span class="bg_0 f_f">{$comiis_lang['thread_activity']}</span>
  <!--{elseif $thread['special'] == 5}-->
	<span class="bg_0 f_f">{$comiis_lang['thread_debate']}</span>
  <!--{/if}-->
  <!--{if $rushreply}--><span class="bg_a f_f">{$comiis_lang['rushreply']}</span><!--{/if}-->
<!--{/block}-->