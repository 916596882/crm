<style>
    .layui-form-item{    margin-bottom: 15px;clear: none;}
</style>

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
            <label class="layui-form-label">用户名称</label>
            <div class="layui-input-block">
                <input type="text" name="username" win-verify="required" placeholder="用户名名称" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户电话</label>
            <div class="layui-input-block">
                <input type="text" name="usertel" win-verify="required" placeholder="用户电话" autocomplete="off" class="layui-input" />
            </div>
        </div>
        {{--<div style="width: 100%;height: auto;clear: both"  >--}}
        <div class="layui-form-item aa" id = "aa" style="float:left ;width: 190px;margin-left:30px;">
            <label class="layui-form-label" style="padding: 9px 3px;width:30px;text-align: center;float: left"  >省</label>
            <div class="layui-input-inline" style="float:left;width:140px;">
                <select name="parentId" class = "a select"  lay-filter="encrypt"  >
                <option value="0">请选择</option>
                    @foreach($parent as $v)
                <option value="{{$v['id']}}">{{$v['area_name']}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item aa"  id = "aa" style="float: left ;width: 190px;">
            <label class="layui-form-label" style="padding: 9px 3px;width:30px;text-align: center;float: left"  >市</label>
            <div class="layui-input-inline" style="float:left;width:140px;">
                <select name="parentId"  class = "b select" lay-filter="encrypt" >
                    <option value="0">请选择</option>
                    <option value="1">1231</option>
                    {{--<option value="1">&#x4E2A;&#x6027;&#x5316;</option>--}}
                </select>
            </div>
        </div>
            <div class="layui-form-item aa"  id = "aa" style="float: left ;width: 190px;">
                <label class="layui-form-label" style="padding: 9px 3px;width:30px;text-align: center;float: left"  >区</label>
                <div class="layui-input-inline" style="float:left;width:140px;">
                    <select name="parentId">
                        <option value="0">请选择</option>
                        {{--<option value="1">&#x4E2A;&#x6027;&#x5316;</option>--}}
                    </select>
                </div>
            </div>
        <div style="clear:both;"  ></div>
        <div class="layui-form-item">
        <label class="layui-form-label">商品</label>
        <div class="layui-input-block">
        <select name="parentId">
        <option value="0">请选择上级菜单</option>
        <option value="1">&#x4E2A;&#x6027;&#x5316;</option>
        <option value="3">&#x6253;&#x8D4F;&#x4F5C;&#x8005;</option>
        <option value="4">&#x57FA;&#x672C;&#x8BF4;&#x660E;</option>
        <option value="23">&#x7CFB;&#x7EDF;&#x8BBE;&#x7F6E;</option>
        <option value="27">Font Awesome&#x56FE;&#x6807;&#x5C55;&#x793A;</option>
        <option value="43">Font Awesome&#x7B2C;&#x4E09;&#x65B9;LOGO</option>
        <option value="53">&#x81EA;&#x5B9A;&#x4E49;&#x56FE;&#x7247;&#x83DC;&#x5355;</option>
        <option value="60">&#x7CFB;&#x7EDF;&#x65E5;&#x5FD7;</option>
        <option value="62">&#x70B9;&#x8D5E;</option>
        <option value="63">123</option>
        <option value="66">&#x4F5C;&#x8005;&#x535A;&#x5BA2;</option>
        </select>
        </div>
        </div>
        <div class="layui-form-item">
        <label class="layui-form-label">职位</label>
        <div class="layui-input-block">
            <select name="parentId">
                <option>医生</option>
                <option>老师</option>
                <option>工人</option>
                <option>程序员</option>
                <option>保姆</option>
                <option>销售</option>
                <option>理发师</option>
            </select>
        </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">详细地址</label>
            <div class="layui-input-block">
                <input type="text" name="pageurl" placeholder="详细地址" autocomplete="off" class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="winui-btn" lay-submit lay-filter="formAddMenu">确定</button>
                <button class="winui-btn" onclick="winui.window.close('addMenu'); return false;">取消</button>
            </div>
        </div>
    </form>
    <div class="tips">Tips：1.系统菜单不可以删除 2.窗口标题若不填则默认和菜单名称相同</div>
</div>
{{--<script src = "https://code.jquery.com/jquery-3.2.1.js"  ></script>--}}
<script src="/window10/lib/layui/jquery-3.2.1.min.js"></script>
<script>

//    $('.select').change(function(){
//        alert(1);
//    });
    layui.use(['form','layer'], function (form) {
        var $ = layui.$
                , msg = winui.window.msg;
        form.on('select(encrypt)', function(data){
//            console.log(data.elem); //得到select原始DOM对象
//            console.log(data.value); //得到被选中的值
//            console.log(data.othis); //得到美化后的DOM对象
//            console.log(typeof(data.elem.classList[0]));
            var cla = data.elem.classList[0];
//            console.log(data.elem.classList[0]);
//            console.log(data);
            if(cla=='a'){
//                alert(1);
                //查找市
//                console.log(data.value);
                var  val = data.value;
                    $.ajax({
                        'url':'/finds',
                        'data':'val='+val,
                        'dataType':'json',
                        'type':'get',
                        success:function( json_data ){
                            var str = '';
                                for(var i in json_data.info){
                                    str += "<option  value = '"+json_data.info[i].id+"'    >"+json_data.info[i].area_name+"</option>";
                                }
                                console.log(str);
                        }
                    });
            }else{
                //查找区
            }
        });
        form.render();
        form.on('switch(isNecessary)', function (data) {
            $(data.elem).val(data.elem.checked);
        });
        form.on('submit(formAddMenu)', function (data) {
            //表单验证
            if (winui.verifyForm(data.elem)) {
                layui.$.ajax({
                    type: 'get',
                    url: 'json/resfailed.json',
                    async: false,
                    data: data.field,
                    dataType: 'json',
                    success: function (json) {
                        if (json.isSucceed) {
                            msg('添加成功');
                        } else {
                            msg(json.message)
                        }
                        winui.window.close('addMenu');
                    },
                    error: function (xml) {
                        msg('添加失败');
                        console.log(xml.responseText);
                    }
                });
            }
            return false;
        });

    });

</script>