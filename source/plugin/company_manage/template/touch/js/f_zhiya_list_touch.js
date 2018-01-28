var offset = 0;  // 分页数据
var tableData = [];  // 页面数据
var searchData = {}; // 存储页面顶部搜索的数据
var dropMe = {};
var obj = {};
$(function () {
    $(".js-drop").off("click").on("click", function () {
        is_show = $(this).next().css('display');
        if (is_show == 'none') {
            showCondition($(this).data('type'))
        } else {
            hideCondition($(this).data('type'));
        }
    })

    // 入口
    getTableList(false, function () {
        scroolEven();
    });
    $.each($('.laydate'), function (i, ele) {
        laydate.render({
            elem: '.dropdown-zone-cate input[name="' + $(ele).attr('name') + '"]'
            //,type: 'date' //默认，可不填
        });
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

// 搜索按钮事件调用
function getSearchData() {
    hideCondition();
    $('.single_search').val('');
    searchData = {};
    getTableList(0, function () {
        obj.opts.loadUpFn(obj, 1);
        dropMe.resetload();
    });
}
/*
 table数据获取
 * */
function getTableList(flag, fn, errFn) {
    var data = arrToObj($("#FormData").find("input").serializeArray());
    var multi_data = arrToObj($(".dropdown-zone-cate").find("input").serializeArray());
    data['offset'] = offset;
    $.extend(data, searchData);
    $.extend(data, multi_data);
    var url = 'plugin.php?id=company_manage:get_zhiya_page';
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
            if (data.total <= offset + 20) {
                is_bottom = true;
            }
        }
        if (data.condition_name) {
            $('#cateShow').html(data.condition_name + '<span class="caret"></span>');
        } else {
            $('#cateShow').html('预设条件<span class="caret"></span>');
        }
        if (fn) {
            fn();
        }
        if (typeof(dropMe.noData) != 'undefined') {
            if (obj)
                dropMe.noData(false);
            if (is_bottom) {
                dropMe.noData();
                dropMe.resetload();
            }
        }
        return false;
    }
    var errorFn = function () {
        if (errFn) {
            errFn();
        }
    }
    SendAjax('get', url, data, success, errorFn);
}
function formatSearch(name, value) {
    $('.single_search').val('');
    $(".dropdown-zone-cate input").val('');
    searchData = {};
    if (name != '') {
        $('#FormData [name="' + name + '"]').val(value);
        searchData[name] = value;
    }
    offset = 0;
    hideCondition();
    getTableList(0, function () {
        if (typeof(dropMe.noData) != 'undefined') {
            dropMe.resetload()
        }
    });
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
            return true;
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
        loadUpFn: function (me, init) {
            dropMe = me;
            offset = 0;
            if (init) {
                return true;
            }
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