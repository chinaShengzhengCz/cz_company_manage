jQuery(function () {
    jQuery('#be_co_operator').on('click', function () {
        if (!jQuery(this).data('uid')) {
            alert('ÇëÏÈµÇÂ¼');
            return false;
        } else {
            if (jQuery(this).data('uid')) {
                uid = jQuery(this).data('uid');
            } else {
                uid = 0;
            }
            jQuery.ajax({
                url: 'plugin.php?id=agent_manage:add_agent_page',
                type: "POST",
                dataType: 'json',
                data: {uid: uid}
            })
        }
    });
});