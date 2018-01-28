var offset = 0;  // 分页数据
var tableData = [];  // 页面数据
var searchData = {}; // 存储页面顶部搜索的数据
var dropMe = {};
var obj = {};
var cateData =
{
    0: [//一级分类
        {"id": "", "name": "全部", "is_all": 1},
        {"id": "1", "name": "银行"},
        {"id": "2", "name": "券商"},
        {"id": "3", "name": "期货"},
        {"id": "17", "name": "上市公司"},
        {"id": "18", "name": "新三板"},
        {"id": "4", "name": "信托"},
        {"id": "6", "name": "保险"},
        {"id": "10", "name": "资产AMC"},
        {"id": "89", "name": "租赁"},
        {"id": "86", "name": "财务公司"},
    ],
    1: [
        {"id": "1", "name": "全部", "is_all": 1},
        {"id": "20", "name": "国股行", "noChild": 1, "is_all": 1},
        {"id": "21", "name": "城商行", "noChild": 1, "is_all": 1},
        {"id": "22", "name": "农商行", "noChild": 1, "is_all": 1},
        {"id": "25", "name": "信用社", "noChild": 1, "is_all": 1},
        {"id": "24", "name": "民营银行", "noChild": 1, "is_all": 1},
        {"id": "77", "name": "外资银行", "noChild": 1, "is_all": 1},
        {"id": "23", "name": "村镇银行", "noChild": 1, "is_all": 1},
        {"id": "26", "name": "农合行", "noChild": 1, "is_all": 1},
        {"id": "27", "name": "资金互助社", "noChild": 1, "is_all": 1},
        {"id": "19", "name": "政策行", "noChild": 1, "is_all": 1},
    ],
    2: [
        {"id": "2", "name": "全部", "is_all": 1},
        {"id": "74", "name": "证券公司", "noChild": 1, "is_all": 1},
        {"id": "75", "name": "证券分公司", "noChild": 1, "is_all": 1},
        {"id": "76", "name": "证券营业部", "noChild": 1, "is_all": 1},
    ],
    3: [
        {"id": "3", "name": "全部", "is_all": 1},
        {"id": "9", "name": "期货公司", "noChild": 1, "is_all": 1},
        {"id": "7", "name": "期货分公司", "noChild": 1, "is_all": 1},
        {"id": "8", "name": "期货营业部", "noChild": 1, "is_all": 1},
    ],
    17: [
        {"id": "17", "name": "全部", "is_all": 1},
        {"id": "67", "name": "上海主板", "noChild": 1, "is_all": 1},
        {"id": "68", "name": "深圳主板", "noChild": 1, "is_all": 1},
        {"id": "69", "name": "中小板", "noChild": 1, "is_all": 1},
        {"id": "70", "name": "创业板", "noChild": 1, "is_all": 1},
        {"id": "106", "name": "IPO已通过", "noChild": 1, "is_all": 1},
        {"id": "104", "name": "IPO已审核", "noChild": 1, "is_all": 1},
        {"id": "107", "name": "IPO未通过", "noChild": 1, "is_all": 1},
    ],
    18: [
        {"id": "18", "name": "全部", "is_all": 1},
        {"id": "71", "name": "创新层", "noChild": 1, "is_all": 1},
        {"id": "72", "name": "基础层", "noChild": 1, "is_all": 1},
        {"id": "73", "name": "两网及退市", "noChild": 1, "is_all": 1},
        {"id": "105", "name": "转板", "noChild": 1, "is_all": 1},
        {"id": "81", "name": "终止挂牌", "noChild": 1, "is_all": 1},
    ],
    4: [
        {"id": "4", "name": "全部", "is_all": 1},
        {"id": "82", "name": "信托公司", "noChild": 1, "is_all": 1},
        {"id": "83", "name": "信托其他分支", "noChild": 1, "is_all": 1},
    ],
    6: [
        {"id": "6", "name": "全部", "is_all": 1},
        {"id": "84", "name": "保险控股集团", "noChild": 1, "is_all": 1},
        {"id": "85", "name": "财险", "noChild": 1, "is_all": 1},
        {"id": "96", "name": "人身险", "noChild": 1, "is_all": 1},
        {"id": "97", "name": "再保险", "noChild": 1, "is_all": 1},
        {"id": "98", "name": "保险资管", "noChild": 1, "is_all": 1},
        {"id": "99", "name": "保险中介", "noChild": 1, "is_all": 1},
        {"id": "100", "name": "保险公估", "noChild": 1, "is_all": 1},
        {"id": "101", "name": "分支网点", "noChild": 1, "is_all": 1},
        {"id": "102", "name": "外资代表处", "noChild": 1, "is_all": 1},
        {"id": "103", "name": "其他", "noChild": 1, "is_all": 1},
    ],
    10: [
        {"id": "10", "name": "全部", "is_all": 1},
        {"id": "11", "name": "四大AMC"},
        {"id": "12", "name": "地方AMC", "noChild": 1, "is_all": 1},
    ],
    89: [
        {"id": "89", "name": "全部", "is_all": 1},
        {"id": "90", "name": "金融租赁", "noChild": 1, "is_all": 1},
        {"id": "93", "name": "融资租赁", "noChild": 1, "is_all": 1},
    ],
    86: [
        {"id": "86", "name": "全部", "is_all": 1},
        {"id": "87", "name": "财务公司", "noChild": 1, "is_all": 1},
        {"id": "88", "name": "其他分支", "noChild": 1, "is_all": 1},
    ],
    11: [
        {"id": "11", "name": "全部", "is_all": 1},
        {"id": "13", "name": "四大AMC总公司", "noChild": 1, "is_all": 1},
        {"id": "14", "name": "四大AMC分支", "noChild": 1, "is_all": 1},
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

    // 入口
    getTableList(false, function () {
        getCurrentLi('one', ''); //获取一级数据
        getCateLi('one', ''); //获取一级数据
        scroolEven();
    });
})

// 显示搜索条件
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

// 隐藏搜索条件
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
// 页面li点击事件 ，获取内容
function getCurrentLi(type, id) {
    //此处通过ajax获取市区 type one => 省 second=>市 third=>区 ，type不同调用不同列的渲染
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
            // 此处判断是否有第三级 判断后台返回来的数组长度即可
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

// 渲染一级列表内容
function renderOneArea(data) { //加载一级地区数据
    var $OneArea = $("#OneArea");
    var $tmpl = baidu.template('tmplLiTbody', {list: data, type: 'second'});
    $OneArea.html($tmpl);
}
//渲染二级区函数
function renderSecondArea(data) { // data 需要时数组
    var $SecondArea = $("#SecondArea");
    var $tmpl = baidu.template('tmplLiTbody', {list: data, type: 'third'});
    $SecondArea.html($tmpl)
}
//渲染三级区函数
function renderThirdArea(data) {
    var $ThirdArea = $("#ThirdArea");
    var $tmpl = baidu.template('tmplLiTbody', {list: data, type: ''});
    $ThirdArea.html($tmpl)
}

// 渲染一级分类列表内容
function renderOneCate(data) { //加载一级地区数据
    var $tmpl = baidu.template('cateLiTbody', {list: data, type: 'second'});
    $("#OneCate").html($tmpl);
}
//渲染二级区函数
function renderSecondCate(data) { // data 需要时数组
    var $tmpl = baidu.template('cateLiTbody', {list: data, type: 'third'});
    $("#SecondCate").html($tmpl)
}
//渲染三级区函数
function renderThirdCate(data) {
    var $tmpl = baidu.template('cateLiTbody', {list: data, type: ''});
    $("#ThirdCate").html($tmpl)
}

// 搜索按钮事件调用
function getSearchData() {
    hideCondition();
    getTableList();
    return false;
}
/*
 table数据获取
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
            $('#cateShow').html('分类<span class="caret"></span>');

        }
        if (data.areaName) {
            $('#areaShow').html(data.areaName + '<span class="caret"></span>');
        } else {
            $('#areaShow').html('地区<span class="caret"></span>');
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
 通用ajax方法
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

// 上啦下拉事件
function scroolEven() {
    obj = $("#body-main").dropload({
        scrollArea: window,
        domUp: {
            domClass: 'dropload-up',
            domRefresh: '<div class="dropload-refresh">↓下拉刷新</div>',
            domUpdate: '<div class="dropload-update">↑释放更新</div>',
            domLoad: '<div class="dropload-load"><span class="loading"></span>加载中...</div>'
        },
        domDown: {
            domClass: 'dropload-down',
            domRefresh: '<div class="dropload-refresh">↑上拉加载更多</div>',
            domLoad: '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
            domNoData: '<div class="dropload-noData">暂无数据</div>'
        },
        loadDownFn: function (me) {
            dropMe = me;
            offset += 20;
            // 每次数据插入，必须重置
            getTableList(true, function () {
                // 每次数据插入，必须重置
                me.resetload();
            }, function () {
                me.resetload();
            })
        },
        loadUpFn: function (me) {
            dropMe = me;
            offset = 0;
            setTimeout(function () {
                // 每次数据插入，必须重置
                getTableList(false, function () {
                    // 每次数据插入，必须重置
                    me.resetload();
                }, function () {
                    me.resetload();
                })
            }, 1000)
        },
        threshold: 50,
    })
}

// 数组转对象 用来转换数据
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

//获取url中的参数
function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]);
    return null; //返回参数值
}