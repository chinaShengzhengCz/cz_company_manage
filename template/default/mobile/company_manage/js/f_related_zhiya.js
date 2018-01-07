/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {
            field: 'stock_code', title: '��Ʊ����', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=view&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {field: 'shorter_name', title: '��Ʊ����'},
        {
            field: 'holder_name', title: '�ɶ�����', formatter: function (val,row) {
            if(val){
                return val;
            }else{
                return row.holder_id;
            }
        }
        },
        {field: 'zhiya_name', title: '��Ѻ��'},
        {field: 'zhiya_count', title: '����(���)'},
        {field: 'start_date', title: '��ʼ����', sortable: true},
        {
            field: 'end_date', title: '��ֹ����', sortable: true, formatter: function (val) {
            if (val == '0000-00-00') {
                return '';
            } else {
                return val;
            }
        }
        },
        {
            field: 'dis_date', title: '��Ѻ����', sortable: true, formatter: function (val) {
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