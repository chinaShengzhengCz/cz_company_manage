/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {
            field: 'shorter_name', title: '���', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_manage_content&oper=view&code=' + row.code + '">' + value + '</a>';
        },
        },
        {field: 'full_name', title: 'ȫ��'},
        {field: 'code', title: '����', visible: false},
        {field: 'cate_name', title: '���'},
        {field: 'area_name', title: '���ڵ�'},
    ];
    table_config.url = window.location.href + '&type=data';
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#search_button').on('click', function () {
            jQuery('#company_list').bootstrapTable('selectPage',1);
        });
    });
});