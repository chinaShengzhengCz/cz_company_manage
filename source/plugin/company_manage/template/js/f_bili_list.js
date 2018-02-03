/**
 * Created by free on 2017/10/1.
 */
window.name = '';
table_config.queryParams = function queryParams(params) {  //配置参数
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
        {field: 'stock_code', title: '股票代码'},
        {field: 'shorter_name', title: '股票名称'},
        {
            field: 'zhiyabili', title: '质押比例', formatter: function (val) {
            return val + '%';
        },
        },
    ];
    table_config.url = "plugin.php?id=company_manage:get_bili_page";
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery('.search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
});
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