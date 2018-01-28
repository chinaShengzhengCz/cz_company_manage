/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {field: 'name', title: '名称'},
        {field: 'shorter_name', title: '机构名称'},
        {field: 'cate_name', title: '机构类型'},
        {field: 'type_name', title: '业务类型'},
        {field: 'apartment', title: '部门'},
        {field: 'career', title: '职位'},
        {field: 'area_name', title: '地区'},
    ];
    table_config.url = "plugin.php?id=company_manage:get_human_page";
    jQuery('#human_list').bootstrapTable(table_config);
    jQuery('.search_button').on('click', function () {
        jQuery('#human_list').bootstrapTable('selectPage', 1);
    });
});
function type_search(type_id) {
    if (window.location.href.indexOf('company_manage:company_manage_content') != -1) {
        window.location.href = '/plugin.php?id=company_manage:company_resource_list_front&redirect&b_id=' + type_id;
    }
    jQuery('[name="b_id"]').val(type_id);
    jQuery('#human_list').bootstrapTable('selectPage', 1);
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
    return params;
};
