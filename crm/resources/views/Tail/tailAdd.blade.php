<div style="width:600px;margin:0 auto;padding-top:20px;">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">订单进度</label>
            <div class="layui-input-block">
                <select name="tail_status">
                    <option value="0">请选择</option>
                    <option value="1">潜在客户</option>
                    <option value="2">准备下单</option>
                    <option value="3">犹豫客户</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">详细内容</label>
            <div class="layui-input-block">
                <input type="text" name="contents" win-verify="required" placeholder="" autocomplete="off" class="layui-input" />
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">下次联系时间</label>
            <div class="layui-inline">
                <input type="text" name="utime" class="layui-input" id="test1">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">跟单类型</label>
            <div class="layui-input-block winui-radio">
                <input type="radio" name="tail_pay" value="1" title="手机" checked />
                <input type="radio" name="tail_pay" value="2" title="微信" />
            </div>
        </div>
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">系统菜单</label>--}}
            {{--<div class="layui-input-block winui-switch">--}}
                {{--<input name="isNecessary" lay-filter="isNecessary" type="checkbox" lay-skin="switch" lay-text="是|否" />--}}
            {{--</div>--}}
        {{--</div>--}}
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
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#test1' //指定元素
        });
    });
</script>

<script>
    layui.use(['form','layer'], function (form) {
        var $ = layui.$
                , msg = winui.window.msg;

        form.render();
        form.on('switch(isNecessary)', function (data) {
            $(data.elem).val(data.elem.checked);
        });
        form.on('submit(formAddMenu)', function (data) {
            //表单验证
            if (winui.verifyForm(data.elem)) {
                layui.$.ajax({
                    type: 'post',
                    url: 'tailAdd',
                    async: false,
                    data: $('form').serialize()+'&_token='+"{{csrf_token()}}",
                    dataType: 'json',
                    success: function (json_info) {
                        if (json_info.status==1000) {
                            msg(json_info.msg);
                            winui.window.close('tailAdd');
                        } else {
                            msg(json_info.msg)
                        }
                    }

                });
            }
            return false;
        });
    });
</script>