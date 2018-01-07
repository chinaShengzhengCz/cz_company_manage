/**
 * Created by free on 2017/10/1.
 */
$(function () {
    var table_config = {};
    table_config.dataType = 'json';
    table_config.clickToSelect = true;
    table_config.sidePagination = 'server';
    table_config.cache = false;
    table_config.method = 'get';
    table_config.pagination = true;
    table_config.pageSize = 20;
    table_config.pageList = [20, 50];
    table_config.locales = 'zh-CN';
    table_config.columns = [
        {field: 'select', title: 'ѡ��', radio: true},
        {field: 'cate_id', title: 'ID'},
        {field: 'name', title: '����'},
        {field: 'parent_name', title: '��������'},
        {
            field: 'myac', title: '����', formatter: function (val, row) {
            return '<button class="btn btn-success">' +
                '<a target="_blank" href="admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_cate_form&cate_id=' + row.cate_id + '">�༭</a>' +
                '</button>';
        }
        },
    ];
    table_config.url = "plugin.php?id=company_manage_admin:get_company_cate";
    $('#cate_list').bootstrapTable(table_config);
});