/**
 * Created by free on 2017/10/1.
 */
jQuery(function () {
    jQuery('#search_button').on('click', function () {
        jQuery('#company_list').bootstrapTable('selectPage',1);
    });
    var table_config = {};
    table_config.dataType = 'json';
    if (window.location.href.indexOf('company_manage:company_manage_list_front') != -1 && window.location.href.indexOf('redirect') != -1) {
        if (!window.name) {
            window.name = 'test';
        } else {
            window.location.href = '/plugin.php?id=company_manage:company_manage_list_front';
        }
    }
    cate_id = getUrlParam('cate_id');
    if (cate_id) {
        jQuery('[name="cate_id"]').val(cate_id);
    }
    table_config.queryParams = function queryParams(params) {  //配置参数
        jQuery('#search_form').find('input[name]').each(function () {
            params[jQuery(this).attr('name')] = jQuery(this).val();
        });
        jQuery('#search_form').find('select[name]').each(function () {
            params[jQuery(this).attr('name')] = jQuery(this).val();
        });
        if (jQuery('#residecommunity').val()) {
            params.area_id = jQuery('#residecommunity option:selected').attr('did');
        } else if (jQuery('#residedist').val()) {
            params.area_id = jQuery('#residedist option:selected').attr('did');
        } else if (jQuery('#residecity').val()) {
            params.area_id = jQuery('#residecity option:selected').attr('did');
        } else if (jQuery('#resideprovince').val()) {
            params.area_id = jQuery('#resideprovince option:selected').attr('did');
        }
        if (jQuery('#company_name').val()) {
            params.full_name = encodeURI(jQuery('#company_name').val());
        }
        return params;
    };
    table_config.onLoadSuccess = function () {
        jQuery('.page-number.active a').attr('href','javascript:void(0)');
    };
    table_config.clickToSelect = true;
    table_config.sidePagination = 'server';
    table_config.cache = false;
    table_config.method = 'get';
    table_config.pagination = true;
    table_config.pageSize = 20;
    table_config.pageList = [20, 50];
    table_config.locales = 'zh-CN';

    table_config.columns = [
        {field: 'id', title: 'ID'},
        {field: 'code', title: '编码'},
        {
            field: 'full_name', title: '全称', formatter: function (value, row) {
            return '<a target="_blank" href="/plugin.php?id=company_manage:company_manage_content&oper=view&code=' + row.code + '">' + value + '</a>';
        }
        },
        {field: 'shorter_name', title: '简称'},
        {field: 'cate_name', title: '分类'},
        {field: 'area_name', title: '所在地'},
        {field: 'position', title: '排序'},
        {
            field: 'myac', title: '操作', formatter: function (val, row) {
            return '<a class="btn btn-success" target="_blank" href="admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_form&code=' + row.code + '">编辑</a>' +
                '<a class="btn btn-success" target="_blank" href="admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_form&p_code=' + row.code + '">新增下级</a>'+
                '<a class="btn btn-success" target="_blank" href="plugin.php?id=company_manage_admin:del_company_page&company_id=' + row.id + '">删除</a>';
        }
        },
    ];
    table_config.url = "plugin.php?id=company_manage:get_company_page";
    jQuery('#company_list').bootstrapTable(table_config);
});
function cate_search(cate_id) {
    if (window.location.href.indexOf('company_manage:company_manage_form') != -1) {
        window.location.href = '/plugin.php?id=company_manage:company_manage_list_front&redirect&cate_id=' + cate_id;
    }
    jQuery('[name="cate_id"]').val(cate_id);
    jQuery('#company_list').bootstrapTable('refresh');
}
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}