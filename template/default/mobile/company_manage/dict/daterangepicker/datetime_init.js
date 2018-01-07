//��ʼ��daterangepicker
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
                    '���': [null, null],
                    '��2Сʱ': [moment().subtract(2, 'hours'), moment()],
                    '����': [moment().startOf('day'), moment()],
                    '����': [moment().subtract(1, 'days'), moment()],
                    '��ȥ7��': [moment().subtract(7, 'days'), moment()],
                    '��ȥ30��': [moment().subtract(30, 'days'), moment()],
                    '�����': [moment().startOf('month'), moment().endOf('month')],
                    '�ϸ���': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().format(format),
                locale: {
                    applyLabel: 'ȷ��',
                    cancelLabel: 'ȡ��',
                    fromLabel: '��ʼʱ��',
                    toLabel: '����ʱ��',
                    customRangeLabel: '�Զ���',
                    daysOfWeek: ['��', 'һ', '��', '��', '��', '��', '��'],
                    monthNames: ['һ��', '����', '����', '����', '����', '����',
                        '����', '����', '����', 'ʮ��', 'ʮһ��', 'ʮ����'],
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
