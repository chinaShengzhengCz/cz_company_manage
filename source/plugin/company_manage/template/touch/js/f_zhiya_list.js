/**
 * Created by free on 2017/10/1.
 */
if (!window.name) {
    window.name = 'test';
} else {
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&redirect') != -1) {
        window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front';
    }
}
table_config.queryParams = function queryParams(params) {  //���ò���
    is_f = getUrlParam('is_finish');
    is_d = getUrlParam('is_recent');
    is_z = getUrlParam('is_zhiya');
    is_r = getUrlParam('dis_recent');
    is_f_r = getUrlParam('finish_recent');

    if (!jQuery('#search_form [name="dis_recent"]').val() && !jQuery('#search_form [name="finish_alert"]').val() && !jQuery('#search_form [name="zhiya_recent"]').val()) {

        if (is_r) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="dis_recent"]').val(is_r);
        } else if (is_d) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="dis_recent"]').val(is_d);
        } else if (is_f || is_f_r) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="finish_alert"]').val(1);
        } else if (is_z) {
            jQuery('#search_form')[0].reset();
            jQuery('#search_form').hide();
            jQuery('#search_form [name="zhiya_recent"]').val(is_z);
        }
    } else {
        params.order = 'desc';
    }
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
        {
            field: 'stock_code', title: '��Ʊ����', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=view&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {
            field: 'shorter_name', title: '��Ʊ����', formatter: function (value, row) {
            return '<a target="_blank" href="plugin.php?id=company_manage:company_zhiya_detail&oper=child&zhiya_id=' + row.id + '">' + value + '</a>';
        }
        },
        {field: 'holder_name', title: '�ɶ�����'},
        {field: 'zhiya_name', title: '��Ѻ��'},
        {field: 'zhiya_count', title: '���������)'},
        {field: 'start_date', title: '��Ѻ����', sortable: true},
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
        jQuery('#search_form [type="hidden"]').val('');
        jQuery('#company_list').bootstrapTable('selectPage', 1);
    });
});
function finish_alert() {
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&finish_recent=true') != -1) {
        window.name = '';
        window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&is_finish=true';
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val('');
    jQuery('#search_form').hide();
    jQuery('#search_form [name="finish_alert"]').val(1);
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function dis_recent(month) {
    month = month || 0;
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&is_recent=') != -1) {
        if (month) {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&dis_recent=' + month;
        } else {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&dis_recent=true';
        }
        return false;
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val('');
    jQuery('#search_form').hide();
    if (month) {
        jQuery('#search_form [name="dis_recent"]').val(month);
    } else {
        jQuery('#search_form [name="dis_recent"]').val('x');
    }
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function zhiya_recent(month) {
    month = month || 0;
    if (window.location.href.indexOf('company_manage:company_zhiya_list_front&is_zhiya=') != -1) {
        if (month) {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&zhiya_recent=' + month;
        } else {
            window.name = '';
            window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&zhiya_recent=true';
        }
        return false;
    }
    jQuery('#search_form')[0].reset();
    jQuery('#search_form [type="hidden"]').val('');
    jQuery('#search_form').hide();
    if (month) {
        jQuery('#search_form [name="zhiya_recent"]').val(month);
    } else {
        jQuery('#search_form [name="zhiya_recent"]').val('x');
    }
    jQuery('#company_list').bootstrapTable('selectPage', 1);
}
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //����һ������Ŀ��������������ʽ����
    var r = window.location.search.substr(1).match(reg);  //ƥ��Ŀ�����
    if (r != null) return unescape(r[2]);
    return null; //���ز���ֵ
}
function multi_search() {
    jQuery('#search_form').toggle();
}
if (window.location.href.indexOf('id=company_manage:company_zhiya_list_front&redirect=true&multi_search') != -1) {
    window.name = '';
    jQuery('#search_form').show();
}