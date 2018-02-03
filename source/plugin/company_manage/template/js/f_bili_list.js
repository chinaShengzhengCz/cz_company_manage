/**
 * Created by free on 2017/10/1.
 */
window.name = '';
table_config.queryParams = function queryParams(params) {  //���ò���
    jQuery('#search_form').find('input[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });
    jQuery('#search_form').find('select[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });

    return params;
};
table_config.sortOrder = 'desc';
jQuery('#search_form').on('keydown', function (event) {
    if (event.keyCode == "13") {
        jQuery('#search_form [type="hidden"]').val('');
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    }
    return true;
});
jQuery(function () {

    table_config.columns = [
        {field: 'stock_code', title: '��Ʊ����'},
        {field: 'shorter_name', title: '��Ʊ����'},
        {
            field: 'zhiyabili', title: '��Ѻ����', formatter: function (val) {
            return val + '%';
        },
        },
    ];
    table_config.url = "plugin.php?id=company_manage:get_bili_page";
    jQuery('#company_list').bootstrapTable(table_config);
    jQuery('.search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
});
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //����һ������Ŀ�������������ʽ����
    var r = window.location.search.substr(1).match(reg);  //ƥ��Ŀ�����
    if (r != null) return unescape(r[2]);
    return null; //���ز���ֵ
}
function multi_search() {
    gap();
    jQuery('#search_form').toggle();
    return false;
}