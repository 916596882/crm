<div style="width:600px;margin:0 auto;padding-top:20px;">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">选择用户</label>
            <div class="layui-input-block">
                <select name="user_id" lay-filter="user">
                    <option value="">请选择</option>
                    @foreach($user_info as $v)
                        <option value="{{$v->user_id}}">{{$v->user_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">产品</label>
            <div class="layui-input-block">
                <input type="text" name="product_name"  placeholder="请输入产品名" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">总金额</label>
            <div class="layui-input-block">
                <input type="text" name="cost_amount" placeholder="" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">收支详情</label>
            <div class="layui-input-block">
                <input type="text" name="content" win-verify="required" placeholder="" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">收支类型</label>
            <div class="layui-input-block winui-radio">
                <input type="radio" name="cost_status" value="1" title="收" />
                <input type="radio" name="cost_status" value="2" title="支" checked />
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
            $(data.elem).val(data.elem.checked);
        });
        //监听select
        form.on('select(user)',function(info){
            $.ajax({
                url:'autoProduct',
                type:'post',
                data:'user_id='+info.value+'&_token='+"{{csrf_token()}}",
                dataType:'json',
                success:function(json_info){
                    $('[name=product_name]').val(json_info.product);
                }
            });
        });
        form.on('submit(formAddMenu)', function (data) {
            //表单验证
            if (winui.verifyForm(data.elem)) {
                layui.$.ajax({
                    type: 'post',
                    url: 'addCost',
                    async: false,
                    data: $('form').serialize()+'&_token='+"{{csrf_token()}}",
                    dataType: 'json',
                    success: function (json_info) {
                        if (json_info.status==1000) {
                            msg(json_info.msg);
                            winui.window.close('addCost');
                            $.ajax({
                                url :'createOrder',
                                type:'post',
                                data: $('form').serialize()+'&_token='+"{{csrf_token()}}",
                                dataType:'json',
                                success:function(json_info){

                                }
                            });
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