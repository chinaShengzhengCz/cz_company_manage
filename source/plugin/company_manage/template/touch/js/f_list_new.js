var offset = 0;  // ��ҳ����
var tableData = [];  // ҳ������
var searchData = {}; // �洢ҳ�涥������������
var dropMe = {};
var obj = {};
var cateData =
{
    0: [//һ������
        {"id": "", "name": "ȫ��", "is_all": 1},
        {"id": "1", "name": "����"},
        {"id": "2", "name": "ȯ��"},
        {"id": "3", "name": "�ڻ�"},
        {"id": "17", "name": "���й�˾"},
        {"id": "18", "name": "������"},
        {"id": "4", "name": "����"},
        {"id": "6", "name": "����"},
        {"id": "10", "name": "�ʲ�AMC"},
        {"id": "89", "name": "����"},
        {"id": "86", "name": "����˾"},
    ],
    1: [
        {"id": "1", "name": "ȫ��", "is_all": 1},
        {"id": "20", "name": "������", "noChild": 1, "is_all": 1},
        {"id": "21", "name": "������", "noChild": 1, "is_all": 1},
        {"id": "22", "name": "ũ����", "noChild": 1, "is_all": 1},
        {"id": "25", "name": "������", "noChild": 1, "is_all": 1},
        {"id": "24", "name": "��Ӫ����", "noChild": 1, "is_all": 1},
        {"id": "77", "name": "��������", "noChild": 1, "is_all": 1},
        {"id": "23", "name": "��������", "noChild": 1, "is_all": 1},
        {"id": "26", "name": "ũ����", "noChild": 1, "is_all": 1},
        {"id": "27", "name": "�ʽ�����", "noChild": 1, "is_all": 1},
        {"id": "19", "name": "������", "noChild": 1, "is_all": 1},
    ],
    2: [
        {"id": "2", "name": "ȫ��", "is_all": 1},
        {"id": "74", "name": "֤ȯ��˾", "noChild": 1, "is_all": 1},
        {"id": "75", "name": "֤ȯ�ֹ�˾", "noChild": 1, "is_all": 1},
        {"id": "76", "name": "֤ȯӪҵ��", "noChild": 1, "is_all": 1},
    ],
    3: [
        {"id": "3", "name": "ȫ��", "is_all": 1},
        {"id": "9", "name": "�ڻ���˾", "noChild": 1, "is_all": 1},
        {"id": "7", "name": "�ڻ��ֹ�˾", "noChild": 1, "is_all": 1},
        {"id": "8", "name": "�ڻ�Ӫҵ��", "noChild": 1, "is_all": 1},
    ],
    17: [
        {"id": "17", "name": "ȫ��", "is_all": 1},
        {"id": "67", "name": "�Ϻ�����", "noChild": 1, "is_all": 1},
        {"id": "68", "name": "��������", "noChild": 1, "is_all": 1},
        {"id": "69", "name": "��С��", "noChild": 1, "is_all": 1},
        {"id": "70", "name": "��ҵ��", "noChild": 1, "is_all": 1},
        {"id": "106", "name": "IPO��ͨ��", "noChild": 1, "is_all": 1},
        {"id": "104", "name": "IPO�����", "noChild": 1, "is_all": 1},
        {"id": "107", "name": "IPOδͨ��", "noChild": 1, "is_all": 1},
    ],
    18: [
        {"id": "18", "name": "ȫ��", "is_all": 1},
        {"id": "71", "name": "���²�", "noChild": 1, "is_all": 1},
        {"id": "72", "name": "������", "noChild": 1, "is_all": 1},
        {"id": "73", "name": "����������", "noChild": 1, "is_all": 1},
        {"id": "105", "name": "ת��", "noChild": 1, "is_all": 1},
        {"id": "81", "name": "��ֹ����", "noChild": 1, "is_all": 1},
    ],
    4: [
        {"id": "4", "name": "ȫ��", "is_all": 1},
        {"id": "82", "name": "���й�˾", "noChild": 1, "is_all": 1},
        {"id": "83", "name": "����������֧", "noChild": 1, "is_all": 1},
    ],
    6: [
        {"id": "6", "name": "ȫ��", "is_all": 1},
        {"id": "84", "name": "���տعɼ���", "noChild": 1, "is_all": 1},
        {"id": "85", "name": "����", "noChild": 1, "is_all": 1},
        {"id": "96", "name": "������", "noChild": 1, "is_all": 1},
        {"id": "97", "name": "�ٱ���", "noChild": 1, "is_all": 1},
        {"id": "98", "name": "�����ʹ�", "noChild": 1, "is_all": 1},
        {"id": "99", "name": "�����н�", "noChild": 1, "is_all": 1},
        {"id": "100", "name": "���չ���", "noChild": 1, "is_all": 1},
        {"id": "101", "name": "��֧����", "noChild": 1, "is_all": 1},
        {"id": "102", "name": "���ʴ���", "noChild": 1, "is_all": 1},
        {"id": "103", "name": "����", "noChild": 1, "is_all": 1},
    ],
    10: [
        {"id": "10", "name": "ȫ��", "is_all": 1},
        {"id": "11", "name": "�Ĵ�AMC"},
        {"id": "12", "name": "�ط�AMC", "noChild": 1, "is_all": 1},
    ],
    89: [
        {"id": "89", "name": "ȫ��", "is_all": 1},
        {"id": "90", "name": "��������", "noChild": 1, "is_all": 1},
        {"id": "93", "name": "��������", "noChild": 1, "is_all": 1},
    ],
    86: [
        {"id": "86", "name": "ȫ��", "is_all": 1},
        {"id": "87", "name": "����˾", "noChild": 1, "is_all": 1},
        {"id": "88", "name": "������֧", "noChild": 1, "is_all": 1},
    ],
    11: [
        {"id": "11", "name": "ȫ��", "is_all": 1},
        {"id": "13", "name": "�Ĵ�AMC�ܹ�˾", "noChild": 1, "is_all": 1},
        {"id": "14", "name": "�Ĵ�AMC��֧", "noChild": 1, "is_all": 1},
    ]

};
$(function () {
    $(".js-drop").off("click").on("click", function () {
        is_show = $(this).next().css('display');
        if (is_show == 'none') {
            showCondition($(this).data('type'))
        } else {
            hideCondition($(this).data('type'));
        }
        return false;
    })

    // ���
    getTableList(false, function () {
        getCurrentLi('one', ''); //��ȡһ������
        getCateLi('one', ''); //��ȡһ������
        scroolEven();
    });
})

// ��ʾ��������
function showCondition(type) {
    $("html").addClass("fobidden-html");
    $(".bg-shadow").show();
    $(".dropdown-zone").hide();
    if (type == 'cate') {
        $(".dropdown-zone-cate").show();
    } else if (type == 'area') {
        $(".dropdown-zone-area").show();
    }
}

// ������������
function hideCondition(type) {
    $("html").removeClass("fobidden-html");
    $(".bg-shadow").hide();
    $(".dropdown-zone").hide();
}

function getCateLi(type, id) {
    if (type == 'one') {
        $("#OneCate").html(baidu.template('tmplLoading', {}))
        $("#SecondCate").html(baidu.template('', {}))
        $("#ThirdCate").html(baidu.template('', {}))
        searchData['cate_id'] = id;
    } else if (type == 'second') {
        $("#SecondCate").html(baidu.template('tmplLoading', {}))
        $("#ThirdCate").html(baidu.template('', {}))
        searchData['cate_id'] = id;
    } else {
        $("#ThirdCate").html(baidu.template('tmplLoading', {}))
        searchData['cate_id'] = id;
    }
    if (id != '') {
        data = cateData[id];
    } else {
        data = cateData[0];
    }
    if (type == 'one') {
        renderOneCate(data);
    } else if (type == 'second') {
        renderSecondCate(data);
    } else {
        renderThirdCate(data);
    }
    return false;
}
// ҳ��li����¼� ����ȡ����
function getCurrentLi(type, id) {
    //�˴�ͨ��ajax��ȡ���� type one => ʡ second=>�� third=>�� ��type��ͬ���ò�ͬ�е���Ⱦ
    // searchData['proId'] = id;
    if (type == 'one') {
        $("#OneArea").html(baidu.template('tmplLoading', {}))
        $("#SecondArea").html(baidu.template('', {}))
        $("#ThirdArea").html(baidu.template('', {}))
        searchData['area_id'] = id;
    } else if (type == 'second') {
        $("#SecondArea").html(baidu.template('tmplLoading', {}))
        $("#ThirdArea").html(baidu.template('', {}))
        searchData['area_id'] = id;
    } else {
        $("#ThirdArea").html(baidu.template('tmplLoading', {}))
        searchData['area_id'] = id;
    }
    var data = {
        operaId: id,
        type: 'getArea'
    }
    if (id) {
        $('#areaShow').html($(this).html());
    }
    var url = '';
    var success = function (data) {
        data = JSON.parse(data);
        if (type == 'one') {
            renderOneArea(data.rows);
        } else if (type == 'second') {
            // �˴��ж��Ƿ��е����� �жϺ�̨�����������鳤�ȼ���
            renderSecondArea(data.rows);
        } else {
            renderThirdArea(data.rows);
        }
    }
    var errorFn = function () {
        if (errFn) {
            errFn();
        }
    }
    SendAjax('post', url, data, success, errorFn);
    return false;
}

// ��Ⱦһ���б�����
function renderOneArea(data) { //����һ����������
    var $OneArea = $("#OneArea");
    var $tmpl = baidu.template('tmplLiTbody', {list: data, type: 'second'});
    $OneArea.html($tmpl);
}
//��Ⱦ����������
function renderSecondArea(data) { // data ��Ҫʱ����
    var $SecondArea = $("#SecondArea");
    var $tmpl = baidu.template('tmplLiTbody', {list: data, type: 'third'});
    $SecondArea.html($tmpl)
}
//��Ⱦ����������
function renderThirdArea(data) {
    var $ThirdArea = $("#ThirdArea");
    var $tmpl = baidu.template('tmplLiTbody', {list: data, type: ''});
    $ThirdArea.html($tmpl)
}

// ��Ⱦһ�������б�����
function renderOneCate(data) { //����һ����������
    var $tmpl = baidu.template('cateLiTbody', {list: data, type: 'second'});
    $("#OneCate").html($tmpl);
}
//��Ⱦ����������
function renderSecondCate(data) { // data ��Ҫʱ����
    var $tmpl = baidu.template('cateLiTbody', {list: data, type: 'third'});
    $("#SecondCate").html($tmpl)
}
//��Ⱦ����������
function renderThirdCate(data) {
    var $tmpl = baidu.template('cateLiTbody', {list: data, type: ''});
    $("#ThirdCate").html($tmpl)
}

// ������ť�¼�����
function getSearchData() {
    hideCondition();
    getTableList();
    return false;
}
/*
 table���ݻ�ȡ
 * */
function getTableList(flag, fn, errFn) {
    var data = arrToObj($("#FormData").find("input").serializeArray());
    data['offset'] = offset;
    if ($('#company_name').val()) {
        searchData['full_name'] = encodeURI($('#company_name').val());
    }
    $.extend(data, searchData);
    var url = 'plugin.php?id=company_manage:get_company_page';
    var success = function (data) {
        data = JSON.parse(data);
        is_bottom = false;
        if (!data.rows) {
            is_bottom = true;
        } else {
            if (flag) {
                tableData = tableData.concat(data.rows);
            } else {
                tableData = data.rows;
            }
            var MyTmpl = baidu.template('tmplTbody', {rows: tableData});
            $("#tbodyMain").html(MyTmpl);
            if (data.total < offset + 20) {
                is_bottom = true;
            }
        }
        if (data.cateName) {
            $('#cateShow').html(data.cateName + '<span class="caret"></span>');
        } else {
            $('#cateShow').html('����<span class="caret"></span>');

        }
        if (data.areaName) {
            $('#areaShow').html(data.areaName + '<span class="caret"></span>');
        } else {
            $('#areaShow').html('����<span class="caret"></span>');
        }
        if (fn) {
            fn();
        }
        if (dropMe) {
            dropMe.noData(false);
            if (is_bottom) {
                dropMe.noData();
            }
            dropMe.resetload();
        }
        return false;
    };
    var errorFn = function () {
        if (errFn) {
            errFn();
        }
    }
    SendAjax('get', url, data, success, errorFn);
    return false;
}
function formatSearch(name, value, show_name) {
    offset = 0;
    $('#FormData [name="' + name + '"]').val(value);
    searchData[name] = value;
    getTableList(0, function () {
        if (dropMe) {
            dropMe.resetload()
        }
    });
    hideCondition();
    return false;
}
/*
 ͨ��ajax����
 * */
function SendAjax(type, url, data, success, err) {
    $.ajax({
        type: type || "get",
        url: url,
        data: data || {},
        async: true,
        success: function (data) {
            if (success) {
                success(data);
            }
        },
        error: function (msg) {
            if (err) {
                err();
            }
            alert(msg)
        }
    });
}

// ���������¼�
function scroolEven() {
    obj = $("#body-main").dropload({
        scrollArea: window,
        domUp: {
            domClass: 'dropload-up',
            domRefresh: '<div class="dropload-refresh">������ˢ��</div>',
            domUpdate: '<div class="dropload-update">���ͷŸ���</div>',
            domLoad: '<div class="dropload-load"><span class="loading"></span>������...</div>'
        },
        domDown: {
            domClass: 'dropload-down',
            domRefresh: '<div class="dropload-refresh">���������ظ���</div>',
            domLoad: '<div class="dropload-load"><span class="loading"></span>������...</div>',
            domNoData: '<div class="dropload-noData">��������</div>'
        },
        loadDownFn: function (me) {
            dropMe = me;
            offset += 20;
            // ÿ�����ݲ��룬��������
            getTableList(true, function () {
                // ÿ�����ݲ��룬��������
                me.resetload();
            }, function () {
                me.resetload();
            })
        },
        loadUpFn: function (me) {
            dropMe = me;
            offset = 0;
            setTimeout(function () {
                // ÿ�����ݲ��룬��������
                getTableList(false, function () {
                    // ÿ�����ݲ��룬��������
                    me.resetload();
                }, function () {
                    me.resetload();
                })
            }, 1000)
        },
        threshold: 50,
    })
}

// ����ת���� ����ת������
function arrToObj(arr) {
    var obj = {};
    if (!arr) {
        return obj
    }
    for (var i = 0; i < arr.length; i++) {
        if (!obj[arr[i]['name']]) {
            obj[arr[i]['name']] = arr[i]['value'];
        }
    }
    return obj;
}

//��ȡurl�еĲ���
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //����һ������Ŀ�������������ʽ����
    var r = window.location.search.substr(1).match(reg);  //ƥ��Ŀ�����
    if (r != null) return unescape(r[2]);
    return null; //���ز���ֵ
}