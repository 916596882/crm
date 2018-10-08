<div style="width:600px;margin:0 auto;padding-top:20px;">
    <form class="layui-form" action="">
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">上级菜单</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<select name="parentId">--}}
                    {{--<option value="0">请选择上级菜单</option>--}}
                    {{--<option value="1">&#x4E2A;&#x6027;&#x5316;</option>--}}
                    {{--<option value="3">&#x6253;&#x8D4F;&#x4F5C;&#x8005;</option>--}}
                    {{--<option value="4">&#x57FA;&#x672C;&#x8BF4;&#x660E;</option>--}}
                    {{--<option value="23">&#x7CFB;&#x7EDF;&#x8BBE;&#x7F6E;</option>--}}
                    {{--<option value="27">Font Awesome&#x56FE;&#x6807;&#x5C55;&#x793A;</option>--}}
                    {{--<option value="43">Font Awesome&#x7B2C;&#x4E09;&#x65B9;LOGO</option>--}}
                    {{--<option value="53">&#x81EA;&#x5B9A;&#x4E49;&#x56FE;&#x7247;&#x83DC;&#x5355;</option>--}}
                    {{--<option value="60">&#x7CFB;&#x7EDF;&#x65E5;&#x5FD7;</option>--}}
                    {{--<option value="62">&#x70B9;&#x8D5E;</option>--}}
                    {{--<option value="63">123</option>--}}
                    {{--<option value="66">&#x4F5C;&#x8005;&#x535A;&#x5BA2;</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">产品名称</label>
            <div class="layui-input-block">
                <input type="text" name="product_name" win-verify="required" placeholder="请输入产品名称" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">产品价格</label>
            <div class="layui-input-block">
                <input type="text" name="product_price" win-verify="required" placeholder="请输入产品价格" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">产品介绍</label>
            <div class="layui-input-block">
                <input type="text" win-verify="required" name="product_contents" placeholder="对此商品进行描述" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否启用</label>
            <div class="layui-input-block winui-switch">
                <input name="product_status" lay-filter="isNecessary" type="checkbox" lay-skin="switch" lay-text="是|否"  value="1" />
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="winui-btn" lay-submit lay-filter="formAddMenu">确定</button>
                <button class="winui-btn" onclick="winui.window.close('addMenu'); return false;">取消</button>
            </div>
        </div>
    </form>
    {{--<div class="tips">Tips：1.系统菜单不可以删除 2.窗口标题若不填则默认和菜单名称相同</div>--}}
</div>
<script>
    layui.use(['form','layer'], function (form) {
        var $ = layui.$
                , msg = winui.window.msg;
        form.render();
        form.on('switch(isNecessary)', function (data) {
            $(data.elem).val(data.elem.value);
        });
        form.on('submit(formAddMenu)', function (data) {
            $.ajax({
                url:'productAdd',
                type:'post',
                dataType:'json',
                data: $('form').serialize()+'&_token='+"{{csrf_token()}}",
                success:function(json_info){
                    if(json_info.status == 1000){
                        msg(json_info.msg);
                    }else{
                        msg(json_info.msg);
                    }
                }
            });
            return false;
        });
    });
</script>