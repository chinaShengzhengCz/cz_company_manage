<?PHP exit('Access Denied');?>
{eval
require_once DISCUZ_ROOT.'./template/comiis_app/comiis/php/comiis_lang.'.currentlang().'.php';
ob_end_clean();
ob_start();
@header("Expires: -1");
@header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
@header("Pragma: no-cache");
@header("Content-type: text/xml; charset=".GHARSET);
echo '<?xml version="1.0" encoding="'.GHARSET.'"?>'."\r\n";
}
<root><![CDATA[