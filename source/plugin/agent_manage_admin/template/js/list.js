/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    jQuery('#search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage',1);
    });
    var table_config = {};
    table_config.dataType = 'json';
    if (window.location.href.indexOf('agent_manage_admin:agent_manage_list_front') != -1 && window.location.href.indexOf('redirect') != -1) {
        if (!window.name) {
            window.name = 'test';
        } else {
            window.location.href = '/plugin.php?id=agent_manage_admin:agent_manage_list_front';
        }
    }
    cate_id = getUrlParam('cate_id');
    if (cate_id) {
        jQuery('[name="cate_id"]').val(cate_id);
    }
    table_config.queryParams = function queryParams(params) {  //配置参数
        jQuery('#search_form').find('input[name]').each(function () {
            params[jQuery(this).attr('name')] = jQuery(this).val();
        });
        jQuery('#search_form').find('select[name]').each(function () {
            params[jQuery(this).attr('name')] = jQuery(this).val();
        });
        return params;
    };
    table_config.onLoadSuccess = function () {
        jQuery('.page-number.active a').attr('href','javascript:void(0)');
    };
    table_config.clickToSelect = true;
    table_config.sidePagination = 'server';
    table_config.cache = false;
    table_config.method = 'get';
    table_config.pagination = true;
    table_config.pageSize = 20;
    table_config.pageList = [20, 50];
    table_config.locales = 'zh-CN';

    table_config.columns = [
        {field: 'co_id', title: 'ID',visible:false},
        {field: 'co_name', title: '名称'},
        {field: 'co_level', title: '等级'},
        {field: 'ensure_money', title: '保证金'},
        {field: 'tel', title: '手机'},
        {field: 'cash', title: '余额'},
        {field: 'point', title: '积分'},
    ];
    table_config.url = "plugin.php?id=agent_manage_admin:get_agent_page";
    jQuery('#company_list').bootstrapTable(table_config);
});
function cate_search(cate_id) {
    if (window.location.href.indexOf('agent_manage:agent_manage_form') != -1) {
        window.location.href = '/plugin.php?id=agent_manage_admin:agent_manage_list_front&redirect&cate_id=' + cate_id;
    }
    jQuery('[name="cate_id"]').val(cate_id);
    jQuery('#company_list').bootstrapTable('refresh');
}
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}