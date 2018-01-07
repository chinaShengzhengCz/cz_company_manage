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
    table_config.url = window.location.href + '&type=data';
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#search_button').on('click', function () {
            jQuery('#company_list').bootstrapTable('selectPage',1);
        });
    });
});