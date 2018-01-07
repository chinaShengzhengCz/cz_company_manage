/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {
            field: 'shorter_name', title: '简称', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_manage_content&oper=view&code=' + row.code + '">' + value + '</a>';
        },
        },
        {field: 'full_name', title: '全称'},
        {field: 'code', title: '编码', visible: false},
        {field: 'cate_name', title: '类别'},
        {field: 'area_name', title: '所在地'},
    ];
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
            params.full_name = params.full_name.replace(/\(/g, "（");
            params.full_name = params.full_name.replace(/\)/g, "）");
        }
        params.fields = 'code,shorter_name,full_name,cate_id,area_id,position';
        return params;
    };
    table_config.url = "plugin.php?id=company_manage:get_company_page";
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery('.search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
});
