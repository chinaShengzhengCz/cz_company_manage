/**
 * Created by free on 2017/10/1.
 */

var table_config = {};
table_config.dataType = 'json';
table_config.queryParams = function queryParams(params) {  //≈‰÷√≤Œ ˝
    jQuery('#search_form').find('input[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });
    jQuery('#search_form').find('select[name]').each(function () {
        params[jQuery(this).attr('name')] = jQuery(this).val();
    });
    return params;
};
table_config.onLoadSuccess = function () {
    jQuery('.page-number.active a').attr('href', 'javascript:void(0)');
};
table_config.clickToSelect = true;
table_config.sidePagination = 'server';
table_config.cache = false;
table_config.searchOnEnterKey = true;
table_config.method = 'get';
table_config.pagination = false;
table_config.escape = true;
table_config.paginationLoop = true;
table_config.locales = 'zh-CN';