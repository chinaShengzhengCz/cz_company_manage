/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {field: 'stock_code', title: '֤ȯ����'},
        {field: 'shorter_name', title: '��˾����'},
        {field: 'holder_name', title: '�ɶ�����'},
        {field: 'zhiya_name', title: '��Ѻ��'},
        {field: 'zhiya_count', title: '��Ѻ��������ɣ�'},
        {field: 'start_date', title: '��ʼ����', sortable: true},
        {
            field: 'end_date', title: '��������', sortable: true, formatter: function (val) {
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


    table_config.url = "plugin.php?id=company_manage:get_zhiya_page";
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery('.search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
});