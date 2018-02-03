/**
 * Created by free on 2017/10/1.
 */
if (!window.name) {
    window.name = 'test';
} else {
    console.log(window.name);
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&redirect') != -1) {
        window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front';
    }
}
table_config.queryParams = function queryParams(params) {  //配置参数
    is_f = getUrlParam('is_finish');
    is_d = getUrlParam('is_recent');
    is_z = getUrlParam('is_zhiya');
    is_r = getUrlParam('dis_recent');
    is_g = getUrlParam('is_gap');
    is_b = getUrlParam('is_bili');
    is_f_r = getUrlParam('finish_recent');
    if (!jQuery('#search_form [name="dis_recent"]').val() && !jQuery('#search_form [name="finish_alert"]').val() && !jQuery('#search_form [name="zhiya_recent"]').val() && !jQuery('#search_form [name="is_gap"]').val() && !jQuery('#search_form [name="bili"]').val()) {

        if (is_r) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="dis_recent"]').val(is_r);
        } else if (is_d) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="dis_recent"]').val(is_d);
        } else if (is_f || is_f_r) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="finish_alert"]').val(1);
        } else if (is_z) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="zhiya_recent"]').val(is_z);
        } else if (is_g) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="is_gap"]').val(is_g);
        } else if (is_b) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="bili"]').val(is_b);
        }
    } else {
        // params.order = 'desc';
    }
    jQuery('#search_form').find('input[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });
    jQuery('#search_form').find('select[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });

    return params;
};
table_config.sortOrder = 'desc';
jQuery('#search_form').on('keydown', function (event) {
    if (event.keyCode == "13") {
        jQuery('#search_form [type="hidden"]').val('');
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    }
    return true;
});
jQuery(function () {

    table_config.columns = [
        {
            field: 'stock_code', title: '股票代码', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=view&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {
            field: 'shorter_name', title: '股票名称', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=child&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {field: 'holder_name', title: '股东名称'},
        {field: 'zhiya_name', title: '质押方'},
        {
            field: 'zhiyabili', title: '质押比例', formatter: function (val) {
            return val + '%';
        }
        },
        {field: 'stock_value', title: '质押日市值'},
        {
            field: 'gap', title: '差价', sortable: true, formatter: function (val) {
            if (val) {
                return val + '%';
            }
        }
        },
        {field: 'zhiya_count', title: '数量（万股)'},
        {field: 'start_date', title: '质押日期', sortable: true},
        {
            field: 'end_date', title: '到期日期', sortable: true, formatter: function (val) {
            if (val == '0000-00-00') {
                return '';
            } else {
                return val;
            }
        }
        },
        {
            field: 'dis_date', title: '解押日期', sortable: true, formatter: function (val) {
            if (val == '0000-00-00') {
                return '';
            } else {
                return val;
            }
        }
        },
    ];
    table_config.url = "plugin.php?id=company_manage:get_zhiya_page";
    jQuery('#company_list').bootstrapTable(table_config);
    if (!jQuery('#search_form [name="is_gap"]').val()) {
        gap();
    } else {
        gap(1);
    }
    if (jQuery('#search_form [name="bili"]').val()) {
        jQuery('#company_list').bootstrapTable('hideColumn', 'dis_date');
    }
    jQuery('.search_button').on('click', function () {
        gap();
        jQuery('#search_form [type="hidden"]').val('');
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
});
function finish_alert() {
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&finish_recent=true') != -1) {
        window.name = '';
        window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&is_finish=true';
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val('');
    jQuery('#search_form').hide();
    jQuery('#search_form [name="finish_alert"]').val(1);
    gap();
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function dis_recent(month) {
    month = month || 0;
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&is_recent=') != -1) {
        if (month) {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&dis_recent=' + month;
        } else {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&dis_recent=true';
        }
        return false;
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val('');
    jQuery('#search_form').hide();
    if (month) {
        jQuery('#search_form [name="dis_recent"]').val(month);
    } else {
        jQuery('#search_form [name="dis_recent"]').val('x');
    }
    gap();
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function zhiya_recent(month) {
    month = month || 0;
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&is_zhiya=') != -1) {
        if (month) {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&zhiya_recent=' + month;
        } else {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&zhiya_recent=true';
        }
        return false;
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val('');
    jQuery('#search_form').hide();
    if (month) {
        jQuery('#search_form [name="zhiya_recent"]').val(month);
    } else {
        jQuery('#search_form [name="zhiya_recent"]').val('x');
    }
    gap();
    jQuery('#company_list').bootstrapTable('selectPage', 1);
    return false;
}
function bili_search(bili) {
    bili = bili || 0;
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&is_bili=') != -1) {
        if (month) {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&bili=' + bili;
        } else {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&bili=1';
        }
        return false;
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val('');
    jQuery('#search_form').hide();
    if (bili) {
        jQuery('#search_form [name="bili"]').val(bili);
    } else {
        jQuery('#search_form [name="bili"]').val('x');
    }
    gap();
    jQuery('#company_list').bootstrapTable('hideColumn', 'dis_date');
    jQuery('#company_list').bootstrapTable('selectPage', 1);
    return false;
}
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}
function multi_search() {
    gap();
    jQuery('#search_form').toggle();
    return false;
}
function gap(gaps) {
    gaps = gaps || false;
    if (gaps) {
        jQuery('#search_form')[0].reset();
        jQuery('#search_form [type="hidden"]').val('');
        jQuery('#search_form').hide();
        jQuery('#search_form [name="is_gap"]').val(1);
        table_config.sortOrder = 'asc';
        jQuery('#company_list').bootstrapTable('refreshOptions', table_config);
        jQuery('#company_list').bootstrapTable('showColumn', 'gap');
        jQuery('#company_list').bootstrapTable('hideColumn', 'zhiya_name');
        jQuery('#company_list').bootstrapTable('hideColumn', 'dis_date');
        jQuery('#company_list').bootstrapTable('showColumn', 'stock_value');
    } else {
        jQuery('#search_form [name="is_gap"]').val('');
        jQuery('#company_list').bootstrapTable('hideColumn', 'stock_value');
        jQuery('#company_list').bootstrapTable('showColumn', 'zhiya_name');
        jQuery('#company_list').bootstrapTable('showColumn', 'dis_date');
        jQuery('#company_list').bootstrapTable('hideColumn', 'gap');
    }
    return false;
}

if (window.location.href.indexOf('id=company_manage:company_zhiya_list_front&redirect=true&multi_search') != -1) {
    window.name = '';
    jQuery('#search_form').show();
}