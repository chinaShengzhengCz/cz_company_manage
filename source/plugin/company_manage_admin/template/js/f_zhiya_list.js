/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {field: 'stock_code', title: '证券代码'},
        {field: 'shorter_name', title: '公司名称'},
        {field: 'holder_name', title: '股东名称'},
        {field: 'zhiya_name', title: '质押方'},
        {field: 'zhiya_count', title: '质押股数（万股）'},
        {field: 'start_date', title: '起始日期', sortable: true},
        {
            field: 'end_date', title: '截至日期', sortable: true, formatter: function (val) {
            if (val == '0000-00-00') {
                return '';
            } else {
                return val;
            }
        }
        },
        {
            field: 'dis_date', title: '解押日期', sortable: true, formatter: function (val) {
            if (val == '0000-00-00') {
                return '';
            } else {
                return val;
            }
        }
        },
    ];


    table_config.url = "plugin.php?id=company_manage:get_zhiya_page";
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery('.search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
});