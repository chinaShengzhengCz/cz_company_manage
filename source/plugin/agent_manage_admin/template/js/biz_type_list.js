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
        {field: 'select', title: '选择', radio: true},
        {field: 'b_id', title: 'ID'},
        {field: 'type_name', title: '名称'},
        {field: 'parent_name', title: '父级名称'},
        {
            field: 'myac', title: '操作', formatter: function (val, row) {
            return '<button class="btn btn-success">' +
                '<a target="_blank" href="admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_biz_type_form&b_id=' + row.b_id + '">编辑</a>' +
                '</button>';
        }
        },
    ];
    table_config.url = "plugin.php?id=company_manage_admin:get_company_biz_type";
    $('#cate_list').bootstrapTable(table_config);
});