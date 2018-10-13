<div style="width:600px;margin:0 auto;padding-top:20px;">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">用户</label>
            <div class="layui-input-block">
                <select name="user">
                    <option value="0">请选择</option>
                    @foreach($arr as $v)
                    <option value="{{$v->user_id}}">{{$v->user_name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">产品</label>
            <div class="layui-input-block">
                <select name="product">
                    <option value="0">请选择</option>
                    @foreach($array as $v)
                    <option value="{{$v->product_id}}">{{$v->product_name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">原因</label>
            <div class="layui-input-block">
                <input type="text" name="icon" win-verify="required" placeholder="原因" autocomplete="off" class="layui-input" />
            </div>
        </div>
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">菜单名称</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<input type="text" name="name" win-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" />--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">窗口标题</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<input type="text" name="title" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" />--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">菜单地址</label>--}}
            {{--<div class="layui-input-block">--}}
                {{--<input type="text" name="pageurl" placeholder="请输入菜单地址" autocomplete="off" class="layui-input" />--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">菜单类型</label>--}}
            {{--<div class="layui-input-block winui-radio">--}}
                {{--<input type="radio" name="openType" value="1" title="HTML" />--}}
                {{--<input type="radio" name="openType" value="2" title="Iframe" checked />--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">是否处理</label>
            <div class="layui-input-block winui-switch">
                <input name="isNecessary" lay-filter="isNecessary" type="checkbox" lay-skin="switch" lay-text="是|否" />
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="winui-btn yes" type="button" lay-submit lay-filter="formAddMenu">确定</button>
                <button class="winui-btn" onclick="winui.window.close('addMenu'); return false;">取消</button>
            </div>
        </div>
    </form>
    <div class="tips">Tips：1.系统菜单不可以删除 2.窗口标题若不填则默认和菜单名称相同</div>
</div>
<script src="/window10/lib/layui/jquery-3.2.1.min.js"></script>
<script>
    layui.use(['form','layer'], function (form) {
        var $ = layui.$
                , msg = winui.window.msg;

        form.render();
        form.on('switch(isNecessary)', function (data) {
            $(data.elem).val(data.elem.checked);
        });
//        form.on('submit(formAddMenu)', function (data) {
//            //表单验证
//            if (winui.verifyForm(data.elem)) {
//                layui.$.ajax({
//                    type: 'get',
//                    url: 'json/resfailed.json',
//                    async: false,
//                    data: data.field,
//                    dataType: 'json',
//                    success: function (json) {
//                        if (json.isSucceed) {
//                            msg('添加成功');
//                        } else {
//                            msg(json.message)
//                        }
//                        winui.window.close('addMenu');
//                    },
//                    error: function (xml) {
//                        msg('添加失败');
//                        console.log(xml.responseText);
//                    }
//                });
//            }
//            return false;
//        });
    });
    $('.yes').on('click',function(){
        var user = $('[name=user]').val();
//            console.log(user);
            if(user==0){
                layer.msg('请选择用户！！！',{time:1000,shade:[0.3,'#ccc'],zIndex:5000000000000});
                return false;
            }
        var text = $('[name=icon]').val();
//            console.log(text);
            if(text==''){
                layer.msg('请填写原因！！！',{time:1000,shade:[0.3,'#ccc'],zIndex:5000000000000});
                return false;
            }
        var isa = $('[name=isNecessary]').val();
        var product = $('[name=product]').val();
        var sign = 1;
            if(isa=='on'||isa=='false'){
                sign = 2;
            }
        $.ajax({
            'url':'/afterAddDo',
            'data':'user_id='+user+'&text='+text+'&sign='+sign+'&_token='+'{{csrf_token()}}'+'&product='+product,
            'dataType':'json',
            'type':'post',
            success:function( json_data ){
                console.log(json_data);
                if(json_data.status==100){
                    layer.msg('添加成功！',{time:1000,shade:[0.3,'#ccc'],zIndex:5000000000000},function( index ){
                        layer.close(index);
                        winui.window.close('afterAdd');
                    });
                    zi = zi + 100;
                    return false;
                }else{
                    console.log('失败');
                }
            }
        });
    });
</script>