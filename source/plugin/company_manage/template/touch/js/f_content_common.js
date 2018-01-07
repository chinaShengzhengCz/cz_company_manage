/**
 * Created by free on 2017/10/1.
 */

if (window.location.href.indexOf('company_manage:company_manage_list_front') != -1 && window.location.href.indexOf('redirect') != -1) {
    if (!window.name) {
        window.name = 'test';
    } else {
        window.location.href = '/plugin.php?id=company_manage:company_manage_list_front';
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
    if (jQuery('#residecommunity').val()) {
        params.area_id = jQuery('#residecommunity option:selected').attr('did');
    } else if (jQuery('#residedist').val()) {
        params.area_id = jQuery('#residedist option:selected').attr('did');
    } else if (jQuery('#residecity').val()) {
        params.area_id = jQuery('#residecity option:selected').attr('did');
    } else if (jQuery('#resideprovince').val()) {
        params.area_id = jQuery('#resideprovince option:selected').attr('did');
    }
    c_name = getUrlParam('name');
    if (c_name) {
        jQuery('#company_name').val(decodeURI(c_name));
    }
    if (jQuery('#company_name').val()) {
        params.full_name = encodeURI(jQuery('#company_name').val());
    }
    return params;
};
function cate_search(cate_id) {
    if (window.location.href.indexOf('company_manage:company_manage_content') != -1) {
        window.location.href = '/plugin.php?id=company_manage:company_manage_list_front&redirect&cate_id=' + cate_id;
    }
    jQuery(document).trigger('click');
    jQuery('[name="cate_id"]').val(cate_id);
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}
jQuery(document).on('keydown', '#company_name', function (e) {
    switch (e.keyCode) {
        case 13:
            if (window.location.href.indexOf('company_manage:company_manage_content') != -1) {
                window.location.href = '/plugin.php?id=company_manage:company_manage_list_front&redirect&full_name=' + encodeURI(jQuery('#company_name').val());
            }
            jQuery('#company_list').bootstrapTable('selectPage', 1);
    }
})