//初始化daterangepicker
function ini_daterangepicker(element, format, is_single, tableId) {
    element = element || '';
    if (!element) {
        return false;
    }
    format = 'YYYY-MM-DD';
    is_single = is_single || false;
    element.on('focus', function (element) {
            jQuery(this).daterangepicker({
                separator: ' - ',
                showDropdowns: true,
                autoUpdateInput: false,
                timePicker: true,
                singleDatePicker: is_single,
                timePicker24Hour: true,
                format: format,
                ranges: {
                    '清空': [null, null],
                    '近2小时': [moment().subtract(2, 'hours'), moment()],
                    '今天': [moment().startOf('day'), moment()],
                    '昨天': [moment().subtract(1, 'days'), moment()],
                    '过去7天': [moment().subtract(7, 'days'), moment()],
                    '过去30天': [moment().subtract(30, 'days'), moment()],
                    '这个月': [moment().startOf('month'), moment().endOf('month')],
                    '上个月': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().format(format),
                locale: {
                    applyLabel: '确定',
                    cancelLabel: '取消',
                    fromLabel: '起始时间',
                    toLabel: '结束时间',
                    customRangeLabel: '自定义',
                    daysOfWeek: ['日', '一', '二', '三', '四', '五', '六'],
                    monthNames: ['一月', '二月', '三月', '四月', '五月', '六月',
                        '七月', '八月', '九月', '十月', '十一月', '十二月'],
                    format: format,
                    firstDay: 1,
                },
            }, function (start, end) {
                ele = jQuery(this).get(0).element;
                if (!start || !end) {
                    ele.val('');
                    return false;
                }
                if (start._isValid && end._isValid) {
                    if (is_single) {
                        ele.val(start.format(format));
                    } else {
                        ele.val(start.format(format) + ' - ' + end.format(format));
                    }
                }
                else {
                    ele.val('');
                }
                jQuery('#' + tableId).bootstrapTable('refresh');
                return true;
            });
        }
    );
    element.on('cancel.daterangepicker', function (ev, picker) {
        jQuery(this).val('');
    });
}
