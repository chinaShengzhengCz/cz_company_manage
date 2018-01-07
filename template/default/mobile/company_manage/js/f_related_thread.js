/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    table_config.columns = [
        {
            field: 'shorter_name', title: '机构名称', formatter: function (val,row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_manage_content&oper=view&code=' + row.code + '">' + val + '</a>';
        }
        },
        {
            field: 'fid', title: '业务类型', formatter: function (val, row) {
            str = '';
            if (row.f_name) {
                str += row.f_name;
            }
            if (row.thread_type_name) {
                str += ' - ' + row.thread_type_name;
            }
            if(row.thread_sort_name){
                str += ' - ' + row.thread_sort_name;
            }
            return str;
        }
        },
        {field: 'tid', title: 'tid', visible: false},
        {field: 'thread_create_time', title: '发表时间'},
        {
            field: 'subject', title: '业务信息', formatter: function (val, row) {
            return '<a target="_blank" href="forum.php?mod=viewthread&tid=' + row.tid + '">' + val + '</a>';
        }
        },
    ];
    table_config.url = window.location.href + '&type=thread_data';
    jQuery('#thread_list').bootstrapTable(table_config);
    jQuery(function () {
        jQuery('#searchb_utton').on('click', function () {
            jQuery('#thread_list').bootstrapTable('selectPage', 1);
        });
    });
});