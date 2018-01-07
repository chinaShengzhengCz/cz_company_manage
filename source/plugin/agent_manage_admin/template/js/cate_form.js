/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    jQuery(document).on('change', 'select[name="parent_id"]', function () {
        if (jQuery(this).val() != 0) {
            if (jQuery(this).val() == jQuery('[name="cate_id"]').val()) {
                jQuery(this).val('');
                alert('�������Լ�Ϊ������');
                return false;
            }
            var level = jQuery(this).data('level');
            cate_change(level);
        }
    });
    jQuery(document).on('change', 'select[name="former_cate_id"]', function () {
        for (i = jQuery(this).data('level'); i < 20; i++) {
            jQuery('select[data-level="' + (i + 1) + '"]').remove(); //���resText�������������
            jQuery('#level' + (i + 1)).remove(); //���resText�������������
        }
        if (jQuery(this).val() == jQuery('[name="cate_id"]').val()) {
            jQuery(this).val('');
            alert('�������Լ�Ϊ������');
            return false;
        }
        if (jQuery(this).val() != 0) {
            cate_change(jQuery(this).data('level'));
        }
    });
});
function cate_change(level, parent_id) {
    parent_id = '' || parent_id;
    if (parent_id) {
        jQuery('select[data-level="' + level + '"]').val(parent_id);
    }
    jQuery.ajax(
        {
            type: "POST",
            url: 'plugin.php?id=company_manage_admin:get_company_cate',
            data: {parent_id: jQuery('select[data-level="' + level + '"]').val()},
            dataType: "json",
            success: function (data) {
                jQuery('#level' + (level + 1)).remove(); //���resText�������������
                jQuery('select[data-level="' + (level + 1) + '"]').remove(); //���resText�������������
                html = '<label id="level' + (level + 1) + '">' + (level + 1) + '������</label><select name="next_parent_id" data-level="' + (level + 1) + '"><option value="">' + (level + 1) + '������</option>';
                if (data.rows.length > 0) {
                    html = html.replace('next_parent_id', 'parent_id');
                    jQuery('select[data-level="' + level + '"]').attr('name', 'former_cate_id'); //���resText�������������
                    jQuery.each(data.rows, function (i, cate) {
                            if (cate.cate_id == parent_id) {
                                html += '<option value="' + cate.cate_id + '" selected>' + cate.name + '</option>';
                            } else {
                                html += '<option value="' + cate.cate_id + '">' + cate.name + '</option>';
                            }
                        }
                    );
                }
                html += '</select>';
                jQuery(html).insertAfter('select[data-level="' + level + '"]');
            }

        });
}
