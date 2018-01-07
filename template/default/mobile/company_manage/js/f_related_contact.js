/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {field: 'contact', title: '联系人'},
        {field: 'apartment', title: '部门'},
        {
            field: 'contact_type', title: '联系类型', formatter: function (val) {
            if (val == '1') {
                return '固定电话';
            } else if (val == '2') {
                return '移动电话';
            }else if (val == '3') {
                return 'qq';
            }
        }
        },
        {field: 'content', title: '联系方式'},
        {field: 'type_name', title: '业务'},
    ];
    table_config.url = window.location.href + '&type=contact_data';
    jQuery('#contact_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#search_button').on('click', function () {
            jQuery('#contact_list').bootstrapTable('selectPage', 1);
        });
    });
});