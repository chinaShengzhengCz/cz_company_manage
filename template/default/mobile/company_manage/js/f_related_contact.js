/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {field: 'contact', title: '��ϵ��'},
        {field: 'apartment', title: '����'},
        {
            field: 'contact_type', title: '��ϵ����', formatter: function (val) {
            if (val == '1') {
                return '�̶��绰';
            } else if (val == '2') {
                return '�ƶ��绰';
            }else if (val == '3') {
                return 'qq';
            }
        }
        },
        {field: 'content', title: '��ϵ��ʽ'},
        {field: 'type_name', title: 'ҵ��'},
    ];
    table_config.url = window.location.href + '&type=contact_data';
    jQuery('#contact_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#search_button').on('click', function () {
            jQuery('#contact_list').bootstrapTable('selectPage', 1);
        });
    });
});