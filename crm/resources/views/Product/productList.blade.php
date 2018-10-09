<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>菜单列表</title>
    <link href="/window10/lib/layui/css/layui.css" rel="stylesheet" />
    <link href="/window10/lib/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="/window10/lib/winui/css/winui.css" rel="stylesheet" />
</head>
<body>
<div class="winui-toolbar">
    <div class="winui-tool">
        <button id="reloadTable" class="winui-toolbtn"><i class="fa fa-refresh" aria-hidden="true"></i>刷新数据</button>
        <button id="productAdd" class="winui-toolbtn"><i class="fa fa-plus" aria-hidden="true"></i>产品添加</button>
        {{--<button id="editMenu" class="winui-toolbtn"><i class="fa fa-pencil" aria-hidden="true"></i>编辑菜单</button>--}}
        <button id="deleteMenu" class="winui-toolbtn"><i class="fa fa-trash" aria-hidden="true"></i>删除选中</button>
    </div>
</div>
<div style="margin:auto 10px;">
    <table id="product" lay-filter="product"></table>
    <script type="text/html" id="barMenu">
        {{--<a class="layui-btn layui-btn-xs" lay-event="setting">权限设置</a>--}}
        {{--<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>--}}
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>

</div>
<script src="/window10/lib/layui/layui.js"></script>
<script type="text/javascript">
    layui.config({
        base: '/window10/js/'
    }).use('menulist');
</script>
</body>
</html>