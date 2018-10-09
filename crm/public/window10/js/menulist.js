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

    // todo 跟踪订单
    table.render({
        id: tableId,
        elem: '#tail',
        url: 'tailListDo',
        //url: '',

        //height: 'full-65', //自适应高度
        //size: '',   //表格尺寸，可选值sm lg
        //skin: '',   //边框风格，可选值line row nob
        //even:true,  //隔行变色
        page: true,
        limits: [10, 20, 30, 40, 50, 60, 70, 100],
        limit: 10,
        cols: [[
            { field: 'tail_id', type: 'checkbox' },
            { field: 'tail_id', title: '跟踪id', width: 80 },
            { field: 'tail_status', title: '跟踪状态', width: 120 },
            { field: 'contents', title: '跟踪详情', width: 120 },
            { field: 'tail_pay', title: '跟踪方式', width: 120, templet: '#openTypeTpl' },
            { field: 'utime', title: '下次联系时间', width: 120, templet: '#openTypeTpl' },
            { field: 'admin_id', title: '用户id', width: 100, templet: '#isNecessary' },
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
        if (layEvent === 'del') { //删除
            deleteMenu(ids, obj);
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
        if (layEvent === 'del') { //删除
            deleteMenu(ids, obj);
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
        if (layEvent === 'del') { //删除
            deleteMenu(ids, obj);
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
        if (layEvent === 'del') { //删除
            deleteMenu(ids, obj);
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
        if (layEvent === 'del') { //删除
            deleteMenu(ids, obj);
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
        if (layEvent === 'del') { //删除
            deleteMenu(ids, obj);
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
        if (layEvent === 'del') { //删除
            deleteMenu(ids, obj);
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

    // todo 监听跟踪订单单元格编辑
    table.on('edit(tail)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
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

    // todo 监听客户单元格编辑
    table.on('edit(user)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
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
    function deleteMenu(ids, obj) {
        layer.confirm('确认删除【' + obj.data.product_name + '】吗？',function(index){
            layer.close(index);
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
