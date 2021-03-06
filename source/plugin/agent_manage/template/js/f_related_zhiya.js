/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {
            field: 'stock_code', title: '证券代码', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=view&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {field: 'shorter_name', title: '公司名称'},
        {
            field: 'holder_name', title: '股东名称', formatter: function (val,row) {
            if(val){
                return val;
            }else{
                return row.holder_id;
            }
        }
        },
        {field: 'zhiya_name', title: '质押方'},
        {field: 'zhiya_count', title: '数量(万股)'},
        {field: 'start_date', title: '起始日期', sortable: true},
        {
            field: 'end_date', title: '截止日期', sortable: true, formatter: function (val) {
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
    table_config.url = window.location.href + '&type=data';
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#search_button').on('click', function () {
            jQuery('#company_list').bootstrapTable('selectPage', 1);
        });
    });
});
function finish_alert() {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&is_finish=true';
    return false;
}
function dis_recent() {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&dis_recent=true';
    return false;
}