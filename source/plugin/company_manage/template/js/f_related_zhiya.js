/**
 * Created by free on 2017/10/1.
 */
window.name = '';
jQuery(function () {
    table_config.columns = [
        {
            field: 'stock_code', title: '股票代码', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=view&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {field: 'shorter_name', title: '股票名称'},
        {
            field: 'holder_name', title: '股东名称', formatter: function (val, row) {
            if (val) {
                return val;
            } else {
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
    table_config.queryParams = function queryParams(params) {  //配置参数
        params.order = 'desc';
        return params;
    };
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#search_button').on('click', function () {
            jQuery('#company_list').bootstrapTable('selectPage', 1);
        });
    });
});
function finish_alert() {
    window.name = '';
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&&finish_recent=true';
    return false;
}
function dis_recent(month) {
    month = month || true;
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_recent=' + month;
    return false;
}
function zhiya_recent(month) {
    month = month || true;
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_zhiya=' + month;
    return false;
}
function gap(is_gap) {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_gap=1';
    return false;
}
function bili_search(bili) {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_bili='+bili;
    return false;
}
function multi_search() {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&multi_search';
    return false;
}