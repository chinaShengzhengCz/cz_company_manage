/**
 * Created by free on 2017/10/1.
 */

jQuery(function () {
    jQuery('#resideprovince').attr('required', true);
    jQuery(document).on('change', 'select[name="cate_id"]', function () {
        if (jQuery(this).val() != 0) {
            var level = jQuery(this).data('level');
            cate_change(level);
        }
    });
    jQuery(document).on('change', 'select[name="former_cate_id[]"]', function () {
        for (i = jQuery(this).data('level'); i < 20; i++) {
            jQuery('select[data-level="' + (i + 1) + '"]').remove(); //清空resText里面的所有内容
            jQuery('#level' + (i + 1)).remove(); //清空resText里面的所有内容
        }
        if (jQuery(this).val() != 0) {
            cate_change(jQuery(this).data('level'));
        }
    });
    if (jQuery(".select2").length) {
        if (typeof p_code != 'undefined') {
            placeholder = p_code;
        } else {
            placeholder = '请选择企业';
        }
        init_select2(placeholder);
    }

});

function init_select2(placeholder) {
    if (typeof p_datas == 'undefined') {
        p_datas = [];
    }
    jQuery(".select2:last").select2({
        language: "zh-CN",
        ajax: {
            url: "plugin.php?id=company_manage:get_company_biz_type",
            dataType: 'json',
            data: function (params) {
                return {
                    search_term: params.term
                };
            },
            delay: 250,
            allowClear: true,
            selectOnClose: false,
            closeOnSelect: false,
            templateResult: function (data) {
                return data.text;
            },
            minimumResultsForSearch: Infinity,
            processResults: function (data, params) {
                params.page = params.page || 1;
                arr = data;
                return {
                    results: arr,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true,
            multiple: true,
        },
        width: '50%',
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
    });
}
function cate_change(level, parent_id) {
    parent_id = '' || parent_id;
    if (parent_id) {
        jQuery('select[data-level="' + level + '"]').val(parent_id);
    }
    jQuery.ajax(
        {
            type: "POST",
            url: 'plugin.php?id=company_manage:get_company_cate',
            data: {parent_id: jQuery('select[data-level="' + level + '"]').val()},
            dataType: "json",
            success: function (data) {
                jQuery('#level' + (level + 1)).remove(); //清空resText里面的所有内容
                jQuery('select[data-level="' + (level + 1) + '"]').remove(); //清空resText里面的所有内容
                html = '<label id="level' + (level + 1) + '">' + (level + 1) + '级分类</label><select name="next_parent_id" data-level="' + (level + 1) + '"><option value="">' + (level + 1) + '级分类</option>';
                if (data.rows.length > 0) {
                    html = html.replace('next_parent_id', 'cate_id');
                    jQuery('select[data-level="' + level + '"]').attr('name', 'former_cate_id[]'); //清空resText里面的所有内容
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
function type_in_district(contaniner_id, val) {
    obj = document.getElementById(contaniner_id);

    for (var i = 0; i < obj.options.length; i++) {
        if (obj.options[i].value == val) {
            obj.options[i].selected = true;
            break;
        }
    }
    obj.onchange();
}
