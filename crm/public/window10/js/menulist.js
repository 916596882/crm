//@ sourceURL=menulist.js
layui.config({
    base: '/window10/lib/' //指定 winui 路径
    , version: '1.0.0-beta'
}).extend({
    winui: 'winui/winui',
    window: 'winui/js/winui.window'
}).define(['table', 'jquery', 'winui', 'window', 'layer'], function (exports) {

    winui.renderColor();

    var table = layui.table,
        $ = layui.$, tableId = 'tableid';
    //桌面显示提示消息的函数
    var msg = top.winui.window.msg;
    //         todo 数据
    // todo 客户录入
    table.render({
        id: tableId,
        elem: '#user',
        url: '/userLists',
        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 3,
        cols: [[
            { field: 'id', type: 'checkbox' },
            { field: 'user_name', title: '姓名', width: 120,edit:'user' },
            { field: 'user_phone', title: '电话', width: 150 },
            { field: 'product_name', title: '产品', width: 150 },
            { field: 'user_province', title: '省', width: 200 },
            { field: 'user_city', title: '市', width: 200 },
            { field: 'user_area', title: '区', width: 200 },
            { field: 'address', title: '具体地址', width: 200 },
            { field: 'position_name', title: '岗位', width: 200 },
            //{ field: 'openType', title: '市', width: 120, templet: '#openTypeTpl' },
            //{ field: 'openType', title: '区', width: 120, templet: '#openTypeTpl' },
            //{ field: 'isNecessary', title: '系统菜单', width: 100, templet: '#isNecessary' },
            //{ field: 'order', title: '排序', width: 80, edit: 'text' },
            { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
        ]]
    });

    // todo 跟踪订单
    table.render({
        id: tableId,
        elem: '#tail',
        url: '/tailListDo',
        //url: '',

        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 3,
        //filter:'test',
        cols: [[
            { field: 'tail', type: 'checkbox' },
            { field: 'tail_id', title: '跟踪id', width: 80 },
            { field: 'tail_status', title: '跟踪状态', width: 120 },
            { field: 'contents', title: '跟踪详情', width: 120, edit: 'text' },
            { field: 'tail_pay', title: '跟踪方式', width: 120, templet: '#openTypeTpl' },
            { field: 'utime', title: '下次联系时间', width: 200, templet: '#openTypeTpl' },
            //{ field: 'admin_id', title:  '用户id', width: 100, templet: '#isNecessary' },
            //{ field: 'order', title: '排序', width: 80, edit: 'text' },
            { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
        ]]
    });

    // todo 产品
    table.render({
        id: tableId,
        elem: '#product',
        url: 'productList',
        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 3,
        cols: [[
            { field: 'product_id' },
            { field: 'product_name', title: '产品名称', width: 120 ,edit:'text'},
            { field: 'product_price', title: '产品价格', width: 150 ,edit:'text'},
            { field: 'product_contents', title: '产品描述', width: 150,edit:'text' },
            { field: 'ctime', title: '添加时间', width: 200 },
            { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
        ]]
    });

    // todo 订单
    table.render({
        id: tableId,
        elem: '#order',
        url: '/window10/json/menulist.json',
        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 10,
        cols: [[
            { field: 'id', type: 'checkbox' },
            { field: 'icon', title: '图标', width: 120 },
            { field: 'name', title: '名称', width: 150 },
            { field: 'title', title: '标题', width: 150 },
            { field: 'pageURL', title: '页面地址', width: 200 },
            { field: 'openType', title: '页面类型', width: 120, templet: '#openTypeTpl' },
            { field: 'isNecessary', title: '系统菜单', width: 100, templet: '#isNecessary' },
            { field: 'order', title: '排序', width: 80, edit: 'text' },
            { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
        ]]
    });

    // todo 费用
    table.render({
        id: tableId,
        elem: '#cost',
        url: 'costListDo',
        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 3,
        cols: [[
            { field: 'cost_id', type: 'checkbox' },
            { field: 'company_name', title: '公司名称', width: 120 },
            { field: 'cost_amount', title: '总价钱', width: 150 },
            { field: 'content', title: '收支详情', width: 150 },
            { field: 'cost_status', title: '收支类型', width: 200 },
            { field: 'ctime', title: '添加时间', width: 200 },
            { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
        ]]
    });

    // todo 管理员
    table.render({
        id: tableId,
        elem: '#admin',
        url: '/window10/json/menulist.json',
        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 10,
        cols: [[
            { field: 'id', type: 'checkbox' },
            { field: 'icon', title: '图标', width: 120 },
            { field: 'name', title: '名称', width: 150 },
            { field: 'title', title: '标题', width: 150 },
            { field: 'pageURL', title: '页面地址', width: 200 },
            { field: 'openType', title: '页面类型', width: 120, templet: '#openTypeTpl' },
            { field: 'isNecessary', title: '系统菜单', width: 100, templet: '#isNecessary' },
            { field: 'order', title: '排序', width: 80, edit: 'text' },
            { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
        ]]
    });

    //表格渲染 todo 售后
    table.render({
        id: tableId,
        elem: '#after',
        url: '/afterListDo',
        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        //page: true,
        //limits: [10, 20, 30, 40, 50, 60, 70, 100],
        //limit: 10,
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 3,
        cols: [[
            { field: 'after_id', type: 'checkbox' },
            { field: 'user_name', title: '用户名称', width: 120 },
            { field: 'status', title: '是否处理', width: 200 },
            { field: 'position_name', title: '用户岗位', width: 150 },
            { field: 'product_name', title: '处理产品', width: 150 },
            { field: 'text', title: '退货理由', width: 150,edit: 'after' },
            { title: '操作', fixed: 'right', align: 'center', toolbar: '#barMenu', width: 200 }
        ]]
    });

    //        todo 工具条监听
    // todo 产品监听工具条
    table.on('tool(product)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var ids = '';   //选中的Id
        $(data).each(function (index, item) {
            ids += item.id + ',';
        });
        if (layEvent === 'productDel') { //删除
            deleteMenu('product', obj);
        } else if (layEvent === 'edit') { //编辑
            openEditWindow(data.id);
        } else if (layEvent === 'setting') {    //功能设置
            $.ajax({
                type: 'get',
                url: 'setting.html?menuId=' + data.id,
                async: false,
                success: function (data) {
                    content = data;
                    //从桌面打开
                    top.winui.window.open({
                        id: 'settingMenu',
                        type: 1,
                        title: '权限设置',
                        content: content,
                        area: ['55vw', '70vh'],
                        offset: ['15vh', '25vw'],
                    });
                },
                error: function (xml) {
                    msg("获取页面失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 管理员监听工具条
    table.on('tool(admin)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var ids = '';   //选中的Id
        $(data).each(function (index, item) {
            ids += item.id + ',';
        });
        if (layEvent === 'adminDel') { //删除
            deleteMenu('admin', obj);
        } else if (layEvent === 'edit') { //编辑
            openEditWindow(data.id);
        } else if (layEvent === 'setting') {    //功能设置
            $.ajax({
                type: 'get',
                url: 'setting.html?menuId=' + data.id,
                async: false,
                success: function (data) {
                    content = data;
                    //从桌面打开
                    top.winui.window.open({
                        id: 'settingMenu',
                        type: 1,
                        title: '权限设置',
                        content: content,
                        area: ['55vw', '70vh'],
                        offset: ['15vh', '25vw'],
                    });
                },
                error: function (xml) {
                    msg("获取页面失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 售后监听工具条
    table.on('tool(after)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var ids = '';   //选中的Id
        $(data).each(function (index, item) {
            ids += item.id + ',';
        });
        if (layEvent === 'afterDel') { //删除
            deleteMenu('after', obj);
        } else if (layEvent === 'edit') { //编辑
            openEditWindow(data.id);
        } else if (layEvent === 'setting') {    //功能设置
            $.ajax({
                type: 'get',
                url: 'setting.html?menuId=' + data.id,
                async: false,
                success: function (data) {
                    content = data;
                    //从桌面打开
                    top.winui.window.open({
                        id: 'settingMenu',
                        type: 1,
                        title: '权限设置',
                        content: content,
                        area: ['55vw', '70vh'],
                        offset: ['15vh', '25vw'],
                    });
                },
                error: function (xml) {
                    msg("获取页面失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 费用监听工具条
    table.on('tool(cost)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var ids = '';   //选中的Id
        $(data).each(function (index, item) {
            ids += item.id + ',';
        });
        if (layEvent === 'costDel') { //删除
            deleteMenu('cost', obj);
        } else if (layEvent === 'edit') { //编辑
            openEditWindow(data.id);
        } else if (layEvent === 'setting') {    //功能设置
            $.ajax({
                type: 'get',
                url: 'setting.html?menuId=' + data.id,
                async: false,
                success: function (data) {
                    content = data;
                    //从桌面打开
                    top.winui.window.open({
                        id: 'settingMenu',
                        type: 1,
                        title: '权限设置',
                        content: content,
                        area: ['55vw', '70vh'],
                        offset: ['15vh', '25vw'],
                    });
                },
                error: function (xml) {
                    msg("获取页面失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 订单监听工具条
    table.on('tool(order)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var ids = '';   //选中的Id
        $(data).each(function (index, item) {
            ids += item.id + ',';
        });
        if (layEvent === 'orderDel') { //删除
            deleteMenu('order', obj);
        } else if (layEvent === 'edit') { //编辑
            openEditWindow(data.id);
        } else if (layEvent === 'setting') {    //功能设置
            $.ajax({
                type: 'get',
                url: 'setting.html?menuId=' + data.id,
                async: false,
                success: function (data) {
                    content = data;
                    //从桌面打开
                    top.winui.window.open({
                        id: 'settingMenu',
                        type: 1,
                        title: '权限设置',
                        content: content,
                        area: ['55vw', '70vh'],
                        offset: ['15vh', '25vw'],
                    });
                },
                error: function (xml) {
                    msg("获取页面失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 客户监听工具条
    table.on('tool(user)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var ids = '';   //选中的Id
        $(data).each(function (index, item) {
            ids += item.id + ',';
        });
        if (layEvent === 'userDel') { //删除
            deleteMenu('user', obj);
        } else if (layEvent === 'edit') { //编辑
            openEditWindow(data.id);
        } else if (layEvent === 'setting') {    //功能设置
            $.ajax({
                type: 'get',
                url: 'setting.html?menuId=' + data.id,
                async: false,
                success: function (data) {
                    content = data;
                    //从桌面打开
                    top.winui.window.open({
                        id: 'settingMenu',
                        type: 1,
                        title: '权限设置',
                        content: content,
                        area: ['55vw', '70vh'],
                        offset: ['15vh', '25vw'],
                    });
                },
                error: function (xml) {
                    msg("获取页面失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 订单跟踪监听工具条
    table.on('tool(tail)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var ids = '';   //选中的Id
        $(data).each(function (index, item) {
            ids += item.id + ',';
        });
        if (layEvent === 'tailDel') { //删除
            deleteMenu('tail_order', obj);
        } else if (layEvent === 'edit') { //编辑
            openEditWindow(data.id);
        } else if (layEvent === 'setting') {    //功能设置
            $.ajax({
                type: 'get',
                url: 'setting.html?menuId=' + data.id,
                async: false,
                success: function (data) {
                    content = data;
                    //从桌面打开
                    top.winui.window.open({
                        id: 'settingMenu',
                        type: 1,
                        title: '权限设置',
                        content: content,
                        area: ['55vw', '70vh'],
                        offset: ['15vh', '25vw'],
                    });
                },
                error: function (xml) {
                    msg("获取页面失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });





    //    todo   监听单元格编辑
    // todo 监听产品单元格编辑
    table.on('edit(product)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        if(obj.field == 'product_price' && !/^[0-9]+$/.test(obj.value)){
            msg('格式不正确',{icon:5,time:1000},function(){
                $(".layui-laypage-btn")[0].click();
            });
            return false;
        }
            $.ajax({
                type: 'get',
                url: 'productSave',
                data: { "product_id": obj.data.product_id, "value": obj.value ,"field": obj.field},
                success: function (json) {
                    if(json.status == 1000){
                        msg(json.msg,{icon:6,time:1000});
                    }else{
                        msg(json.msg,{icon:5,time:1000},function(){
                            $('.layui-laypage-btn')[0].click();
                        });
                    }
                }
            });
    });

    // todo 监听管理员单元格编辑
    table.on('edit(admin)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        if (/^[0-9]+$/.test(obj.value)) {
            var index = layer.load(1);
            $.ajax({
                type: 'post',
                url: 'views/menu/updatemenuorder',
                data: { "id": obj.data.id, "order": obj.value },
                success: function (json) {
                    layer.close(index);
                    if (!json.isSucceed) {
                        msg(json.message);
                    }
                },
                error: function (xml) {
                    layer.close(index);
                    msg("修改失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 监听售后单元格编辑
    table.on('edit(after)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        //console.log($(this).eq(0).val());
        //funs();
        //console.log($);
        var val = obj.value;
            if(val==''){
                layer.msg('不能为空！',{time:1000,shade:[0.3,'#ccc']},function( index ){
                    layer.close(index);
                    $(".layui-laypage-btn")[0].click();
                });
                return false;
            }
        $.ajax({
            'url':'/afterUpdate',
            'data' :'field='+obj.field+'&val='+obj.value+'&id='+obj.data.user_id+'&after_id='+obj.data.after_id,
            'dataType' :'json',
            'type':'get',
            success:function( json_data ){
                if(json_data.status==1){
                    layer.msg(json_data.msg,{time:1000,shade:[0.3,'#ccc']},function( index ){
                        layer.close(index);
                        $(".layui-laypage-btn")[0].click();
                    });
                    return false;
                }
            }
        });
    });

    // todo 监听费用单元格编辑
    table.on('edit(cost)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        if (/^[0-9]+$/.test(obj.value)) {
            var index = layer.load(1);
            $.ajax({
                type: 'post',
                url: 'views/menu/updatemenuorder',
                data: { "id": obj.data.id, "order": obj.value },
                success: function (json) {
                    layer.close(index);
                    if (!json.isSucceed) {
                        msg(json.message);
                    }
                },
                error: function (xml) {
                    layer.close(index);
                    msg("修改失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 监听订单单元格编辑
    table.on('edit(order)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        if (/^[0-9]+$/.test(obj.value)) {
            var index = layer.load(1);
            $.ajax({
                type: 'post',
                url: 'views/menu/updatemenuorder',
                data: { "id": obj.data.id, "order": obj.value },
                success: function (json) {
                    layer.close(index);
                    if (!json.isSucceed) {
                        msg(json.message);
                    }
                },
                error: function (xml) {
                    layer.close(index);
                    msg("修改失败", {
                        icon: 2,
                        time: 2000
                    });
                    console.log(xml.responseText);
                }
            });
        }
    });

    // todo 监听跟踪订单单元格编辑    监听跟
    table.on('edit(tail)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        if (/^.*/.test(obj.value)) {
            var index = layer.load(1);
            $.ajax({
                type: 'get',
                url: 'tailSave',
                data: { "id": obj.data.tail_id, "order": obj.value},
                async: false,
                dataType: 'json',
                success: function (json_info) {
                    layer.close(index);
                    if (json_info.status==1000) {
                        //msg('[id: '+ data.id +'] ' + order + ' 字段更改为：'+ value);
                        msg(json_info.msg);
                    }else{
                        msg(json_info.msg);
                    }
                }

                //        icon: 2,
                //        time: 2000
                //    });
                //    console.log(xml.responseText);
                //}
            });
        }
    });

    // todo 监听客户单元格编辑
    table.on('edit(user)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
        var val = obj.value;
        if(val==''){
            layer.msg('不能为空！',{time:1000,shade:[0.3,'#ccc']},function( index ){
                layer.close(index);
                $(".layui-laypage-btn")[0].click();
            });
            return false;
        }
        $.ajax({
            'url':'/userUpdate',
            'data' :'field='+obj.field+'&val='+obj.value+'&id='+obj.data.user_id+'&user_id='+obj.data.user_id,
            'dataType' :'json',
            'type':'get',
            success:function( json_data ){
                if(json_data.status==1){
                    layer.msg(json_data.msg,{time:1000,shade:[0.3,'#ccc']},function( index ){
                        layer.close(index);
                        $(".layui-laypage-btn")[0].click();
                    });
                    return false;
                }
            }
        });
            //console.log(213333333333);
    });
    //打开编辑窗口
    function openEditWindow(id) {
        if (!id) return;
        var content;
        var index = layer.load(1);
        $.ajax({
            type: 'get',
            url: 'edit.html?id=' + id,
            success: function (data) {
                layer.close(index);
                content = data;
                //从桌面打开
                top.winui.window.open({
                    id: 'editMenu',
                    type: 1,
                    title: '编辑菜单',
                    content: content,
                    area: ['50vw', '70vh'],
                    offset: ['15vh', '25vw'],
                });
            },
            error: function (xml) {
                layer.close(index);
                msg("获取页面失败", {
                    icon: 2,
                    time: 2000
                });
                console.log(xml.responseText);
            }
        });
    }
    //删除菜单
    function deleteMenu(mark, obj) {
        layer.confirm('确认删除【' + obj.data.product_name + '】吗？',function(index){
            layer.close(index);
            if(mark == 'product'){
                var id = obj.data.product_id;
            }else if(mark == 'admin'){
                var id = obj.data.admin_id;
            }else if(mark == 'after'){
                var id = obj.data.after_id;
            }else if(mark == 'tail_order'){
                var id = obj.data.tail_id;
            }else if(mark == 'cost'){
                var id = obj.data.cost_id;
            }else if(mark == 'order'){
                var id = obj.data.order_id;
            }else if(mark == 'user'){
                var id = obj.data.user_id;
            }

            $.ajax({
                url:'delete',
                data:'mark='+mark+'&id='+id,
                type:'get',
                dataType:'json',
                success:function(json_info){
                    if(json_info.status == 1000){
                        msg(json_info.msg);
                        msg('数据请求中',{icon:6,time:1000},function(){
                            $(".layui-laypage-btn")[0].click();
                        });
                    }else{
                        msg(json_info.msg);
                    }
                }
            });
        })
    }

    //表格刷新
    function reloadTable() {
        table.reload(tableId, {});
    }

    //绑定工具栏添加按钮事件
    //添加产品
    $('#productAdd').on('click', function () {
        var content;
        var index = layer.load(1);
        $.ajax({
            type: 'get',
            url: 'productAdd',
            success: function (data) {
                layer.close(index);
                content = data;
                //从桌面打开
                top.winui.window.open({
                    id: 'productAdd',
                    type: 1,
                    title: '添加产品',
                    content: content,
                    area: ['50vw', '70vh'],
                    offset: ['15vh', '25vw']
                });
            },
            error: function (xml) {
                layer.close(load);
                msg('操作失败', {
                    icon: 2,
                    time: 2000
                });
                console.error(xml.responseText);
            }
        });
    });
    //管理员添加
    $('#adminAdd').on('click', function () {
        var content;
        var index = layer.load(1);
        $.ajax({
            type: 'get',
            url: 'adminAdd',
            success: function (data) {
                layer.close(index);
                content = data;
                //从桌面打开
                top.winui.window.open({
                    id: 'adminAdd',
                    type: 1,
                    title: '新增菜单',
                    content: content,
                    area: ['50vw', '70vh'],
                    offset: ['15vh', '25vw']
                });
            },
            error: function (xml) {
                layer.close(load);
                msg('操作失败', {
                    icon: 2,
                    time: 2000
                });
                console.error(xml.responseText);
            }
        });
    });

    //售后添加
    $('#afterAdd').on('click', function () {
        var content;
        var index = layer.load(1);
        $.ajax({
            type: 'get',
            url: 'afterAdd',
            success: function (data) {
                layer.close(index);
                content = data;
                //从桌面打开
                top.winui.window.open({
                    id: 'afterAdd',
                    type: 1,
                    title: '新增菜单',
                    content: content,
                    area: ['50vw', '70vh'],
                    offset: ['15vh', '25vw']
                });
            },
            error: function (xml) {
                layer.close(load);
                msg('操作失败', {
                    icon: 2,
                    time: 2000
                });
                console.error(xml.responseText);
            }
        });
    });

    //客户添加
    $('#userAdd').on('click', function () {
        var content;
        var index = layer.load(1);
        $.ajax({
            type: 'get',
            url: 'userAdd',
            success: function (data) {
                layer.close(index);
                content = data;
                //从桌面打开
                top.winui.window.open({
                    id: 'userAdd',
                    type: 1,
                    title: '新增菜单',
                    content: content,
                    area: ['50vw', '70vh'],
                    offset: ['15vh', '25vw'],
                    zindex:20001111
                });
            },
            error: function (xml) {
                layer.close(load);
                msg('操作失败', {
                    icon: 2,
                    time: 2000
                });
                console.error(xml.responseText);
            }
        });
    });

    //添加跟踪
    $('#tailAdd').on('click', function () {
        var content;
        var index = layer.load(1);
        $.ajax({
            type: 'get',
            url: 'tailAdd',
            success: function (data) {
                layer.close(index);
                content = data;
                //从桌面打开
                top.winui.window.open({
                    id: 'tailAdd',
                    type: 1,
                    title: '新增菜单',
                    content: content,
                    area: ['50vw', '70vh'],
                    offset: ['15vh', '25vw']
                });
            },
            error: function (xml) {
                layer.close(load);
                msg('操作失败', {
                    icon: 2,
                    time: 2000
                });
                console.error(xml.responseText);
            }
        });
    });

    //添加费用
    $('#addCost').on('click', function () {
        var content;
        var index = layer.load(1);
        $.ajax({
            type: 'get',
            url: 'addCost',
            success: function (data) {
                layer.close(index);
                content = data;
                //从桌面打开
                top.winui.window.open({
                    id: 'addCost',
                    type: 1,
                    title: '新增菜单',
                    content: content,
                    area: ['50vw', '70vh'],
                    offset: ['15vh', '25vw']
                });
            },
            error: function (xml) {
                layer.close(load);
                msg('操作失败', {
                    icon: 2,
                    time: 2000
                });
                console.error(xml.responseText);
            }
        });
    });

    //绑定工具栏编辑按钮事件
    $('#editMenu').on('click', function () {
        var checkStatus = table.checkStatus(tableId);
        var checkCount = checkStatus.data.length;
        if (checkCount < 1) {
            msg('请选择一条数据', {
                time: 2000
            });
            return false;
        }
        if (checkCount > 1) {
            msg('只能选择一条数据', {
                time: 2000
            });
            return false;
        }
        openEditWindow(checkStatus.data[0].id);
    });
    //绑定工具栏删除按钮事件
    $('#deleteMenu').on('click', function () {
        var checkStatus = table.checkStatus(tableId);
        var checkCount = checkStatus.data.length;
        if (checkCount < 1) {
            msg('请选择一条数据', {
                time: 2000
            });
            return false;
        }
        var ids = '';
        $(checkStatus.data).each(function (index, item) {
            ids += item.id + ',';
        });
        deleteMenu(ids);
    });
    //绑定工具栏刷新按钮事件
    $('#reloadTable').on('click', reloadTable);

    exports('menulist', {});
});