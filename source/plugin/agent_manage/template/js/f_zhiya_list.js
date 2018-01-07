/**
 * Created by free on 2017/10/1.
 */

table_config.queryParams = function queryParams(params) {  //配置参数
    is_f = getUrlParam('is_finish');
    is_d = getUrlParam('dis_recent');
    if (is_d) {
        jQuery('#search_form')[0].reset();
        jQuery('#search_form').hide();
        jQuery('#search_form [name="dis_recent"]').val(1);
    } else if (is_f) {
        jQuery('#search_form')[0].reset();
        jQuery('#search_form').hide();
        jQuery('#search_form [name="finish_alert"]').val(1);
    }
    jQuery('#search_form').find('input[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });
    jQuery('#search_form').find('select[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });
    return params;
};
jQuery(function () {
    table_config.columns = [
        {
            field: 'stock_code', title: '证券代码', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=view&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {field: 'shorter_name', title: '公司名称'},
        {field: 'holder_name', title: '股东名称'},
        {field: 'zhiya_name', title: '质押方'},
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
    jQuery('.search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
    ini_daterangepicker(jQuery('input[name="start_date"]'));
    ini_daterangepicker(jQuery('input[name="end_date"]'));
    ini_daterangepicker(jQuery('input[name="dis_date"]'));
});
function finish_alert() {
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&dis_recent=true') != -1) {
        window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&is_finish=true';
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val(0);
    jQuery('#search_form').hide();
    jQuery('#search_form [name="finish_alert"]').val(1);
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function dis_recent() {
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&is_finish=true') != -1) {
        window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&dis_recent=true';
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val(0);
    jQuery('#search_form').hide();
    jQuery('#search_form [name="dis_recent"]').val(1);
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}