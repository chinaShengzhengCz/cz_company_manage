/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {field: 'holder_name', title: '股东名称'},
        {field: 'stock', title: '持股数（万股）'},
        {field: 'percent', title: '持股比例'},
        {
            field: 'report_date', title: '报表日期', sortable: true, formatter: function (val) {
            if (val == '0000-00-00') {
                return '';
            } else {
                return val;
            }
        }
        },
    ];
    table_config.url = window.location.href + '&type=holder_data';
    jQuery('#holder_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#search_button').on('click', function () {
            jQuery('#holder_list').bootstrapTable('selectPage', 1);
        });
    });
});