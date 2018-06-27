@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
<link rel="stylesheet" type="text/css" href="./css/bootstrapValidator.css" />
@endsection

@section('content')
<style>
@media (max-width: 1366px) {
    .form-group {
        margin-bottom: 50px;
    }
    .location-group{
        margin-bottom: 140px;
    }
    .phone-group{
        margin-bottom:80px;
    }
}
</style>
    <div class="join-div-1">
        <!-- 喜豆销售合伙人申请 -->
        <div class="parHd parHd-join clearfix">
            <ul>
                <li class="toggle"><p class="step-pending">信息提交</p></li>
                <li class="toggle"><p class="step-pending">合同确认</p></li>
                <li class="toggle"><p class="step-pending">选择支付</p></li>
                <li class="toggle"><p class="step-pending">完成支付</p></li>

            </ul>
        </div>
    </div>
            <form id="join-form" class="form-horizontal">
    <div class="join-contain " >
        <div class="join-input-1">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class=" form-container" style="padding:20px 10px 50px 10px">
                        <h3>填写资料</h3>
                        <div class="form-group  ">
                            <label class="col-lg-3 control-label" for="name">用户名：</label>
                            <div class="col-lg-9">
                                <input type="text" class="  form-control" id="name" name="name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="pw">密码：</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control" name="password" id="pw">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="gender">性别：</label>
                            <div class="col-lg-9">
                                <select class="form-control" id="gender" name="gender">
                                    <option value="">请选择性别</option>
                                    <option value="male">男</option>
                                    <option value="female">女</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="email">邮箱：</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group phone-group">
                            <label class="col-lg-3 control-label" for="phone_num">手机号：</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="phone_num" name="phone_num">
                            </div>
                            <div class="col-lg-2">
                                <span class="btn btn-success get-certification">获取验证码</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="certification">验证码：</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="certification" name="certification">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="type">销售合伙人类型：</label>
                            <div class="col-lg-9">
                                <select class="form-control" id="type" name="type">
                                    <option value="">请选择类型</option>
                                    <option value="P">省级合伙人代表</option>
                                    <option value="D">市级合伙人代表</option>
                                    <option value="A">区(县)级合伙人代表</option>
                                    <option value="S">零售代表</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group location-group">
                                <label class="col-lg-3 control-label" >地域：</label>
                                <div class="col-lg-9">
                                    <select class="form-control" id="province" name="province">
                                        <option value="">选择省份</option>
                                    </select><select class="form-control" id="city" name="city">
                                        <option value="">选择城市</option>
                                    </select><select class="form-control" id="area" name="area">
                                        <option value="">选择地区</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="recommender">推荐人：</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="recommender" name="recommender">
                            </div>
                        </div>
                        <div class="alert alert-success" style="display:none;text-align:center">成功！很好地完成了提交。</div>
                        <div class="alert alert-danger" style="display:none;text-align:center">错误！请进行一些更改。</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="join-contain" style="text-align:center;margin-bottom:50px;margin-top:30px">
        <button class="btn btn-warning btn-submit"  style="padding: 6px 25px;border-radius: 13px;">提交申请</button>
    </div>
</form>
@endsection

@section('scripts')
<script src="./js/bootstrapValidator.min.js"></script>
<script>
        $('#join-form').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: '用户名不能为空'
                        },
                        stringLength: {
                            min: 4,
                            max: 30,
                            message: '用户名长度必须在4到30之间'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '密码不能为空'
                        },
                        different: {
                            field: 'name',
                            message: '密码和用户名不能相同'
                        },
                        stringLength: {
                            min: 6,
                            message: '最少6位密码'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\.]+$/,
                            message: '密码由数字字母下划线和.组成'
                        }
                    }
                },
                gender: {
                    validators: {
                        notEmpty: {
                            message: '性别不能为空'
                        },
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: '邮箱不能为空'
                        },
                        emailAddress: {
                            message: '邮箱地址格式有误'
                        }
                    }
                },
                phone_num: {
                    validators: {
                        notEmpty: {
                         message: '手机号码不能为空'
                        },
                        stringLength: {
                            min: 11,
                            max: 11,
                            message: '请输入11位手机号码'
                        },
                        regexp: {
                            regexp: /^1[3|5|8]{1}[0-9]{9}$/,
                            message: '请输入正确的手机号码'
                        }
                    }
                },
                certification:{
                    validators: {
                        notEmpty: {
                         message: '验证码不能为空'
                        },
                        stringLength: {
                            min: 6,
                            max: 6,
                            message: '请输入6位验证码'
                        },
                    }
                },
                type: {
                    validators: {
                        notEmpty: {
                            message: '合伙人类型不能为空'
                        },
                    }
                },
                province: {
                    validators: {
                        notEmpty: {
                            message: '省份不能为空'
                        },
                    }
                },
            }
        });
        $('input.timepicker').timepicker({
            timeFormat: "HH:mm",
        });
        var setProvince=function(countryValue){
            var country_val = countryValue
            var province = $('#province');
            var city = $('#city');
            var area = $('#area');
            if (country_val === '') {
                province.html('<option value>省份</option>');
                city.html('<option value>城市</option>');
                area.html('<option value>地区</option>');
                return false;
            }
            $.ajax({
                url: '/api/location?type=province&seq='+country_val,
                dataType: 'json',
                type: 'GET',
                success: function(response){
                    var row = response.data.data;
                    var html = '';
                    var html = "<option value=''>选择省份</option>";
                    for(var i=0; i<row.length; i++){
                        html +="<option value='"+row[i].seq+"'>"+row[i].name+"</option>";
                    }
                    province.html(html);
                    $('#province').val('');
                },
                error: function(e) {
                    console.log(e);
                    province.html('<option value>省份</option>');
                }
            },'get');
        }

        var setCity=function(provinceValue){
            var province_val = provinceValue
            var city = $('#city');
            var area = $('#area');
            if (province_val === '') {
                city.html('<option value>城市</option>');
                area.html('<option value>地区</option>');
                return false;
            }
            $.ajax({
                url: '/api/location?type=city&seq='+province_val,
                dataType: 'json',
                type: 'GET',
                success: function(response){
                    var row = response.data.data;
                    var html = '';
                    var html = "<option value=''>选择城市</option>";
                    for(var i=0; i<row.length; i++){
                        html +="<option value='"+row[i].seq+"'>"+row[i].name+"</option>";
                    }
                    city.html(html);
                    $('#city').val('');
                    setArea('');
                },
                error: function(e) {
                    console.log(e);
                    city.html('<option value>城市</option>');
                }
            },'get');
        }

        var setArea=function(cityValue){
            var city_val = cityValue
            var area = $('#area');
            if (city_val === '') {
                area.html('<option value>地区</option>');
                return false;
            }
            var area = $('#area');
            $.ajax({
                url: '/api/location?type=area&seq='+city_val,
                dataType: 'json',
                type: 'GET',
                success: function(response){
                    var row = response.data.data;
                    var html = '';
                    var html = '<option value="">选择地区</option>';
                    for(var i=0; i<row.length; i++){
                        html +="<option value='"+row[i].seq+"'>"+row[i].name+"</option>";
                    }
                    area.html(html);
                },
                error: function(e) {
                    console.log(e);
                    city.html('<option value>地区</option>');
                }
            },'get');
        }
        
        $('#country').change(function(){
            var countrySeq = $('#country').val();
            setProvince(countrySeq);
        });

        $("#province").bind("change",function(){
            var provinceSeq = $('#province').val();
            setCity(provinceSeq);
        });  

        $("#city").bind("change",function(){
            var citySeq = $('#city').val();
            setArea(citySeq);
        }); 
        setProvince(1);
        $('#type').change(function(){
            switch ($('#type option:selected').val()) {
                case "P":
                    $('#city').attr('disabled',true);
                    remove_city_validation();
                    $('#area').attr('disabled',true);
                    remove_area_validation();
                    break;
                case "D":
                    $('#city').attr('disabled',false);
                    add_city_validation();
                    $('#area').attr('disabled',true);
                    remove_area_validation();
                    add_area_validation();
                    break;
                case "A":
                    $('#city').attr('disabled',false);
                    add_city_validation();
                    $('#area').attr('disabled',false);
                    add_area_validation();
                    break;
                case "S":
                    $('#city').attr('disabled',false);
                    add_city_validation();
                    $('#area').attr('disabled',false);
                    add_area_validation();
                    break;
            }
        })
        var remove_area_validation = function(){
            $('#join-form').bootstrapValidator('removeField','area'); 
        }
        var remove_city_validation = function(){
            $('#join-form').bootstrapValidator('removeField','city'); 
        } 
        var add_area_validation = function(){
            $('#join-form').bootstrapValidator("addField", "area", {  
                validators: {  
                    notEmpty: {  
                        message: '地区不能为空'  
                    },  
                }  
            });
        }
        var add_city_validation = function(){
            $('#join-form').bootstrapValidator("addField", "city", {  
                validators: {  
                    notEmpty: {  
                        message: '城市不能为空'  
                    },  
                }  
            });
        } 
        $('.btn-submit').click(function(){
            var data = $('form').serialize();
            if($('#join-form').data('bootstrapValidator').isValid()){  
                $('.btn-submit').attr('disabled',true);
                $.ajax({
                    url: '/api/join',
                    dataType: 'json',
                    type: 'POST',
                    data:data,
                    success: function(response){
                        window.location.href='/joinTerm';
                    },
                    error: function(e,response) {
                        $('.btn-submit').attr('disabled',false);
                        if(typeof(jQuery.parseJSON(e.responseText).message)=='string'){
                            $('.alert-danger').text(jQuery.parseJSON(e.responseText).message);
                            $('.alert-danger').show();
                        }
                    }
                });
            } 
        })
        $('.get-certification').click(function(){
            $('.alert-danger').hide();
            if(!$('#phone_num').val()||$('#phone_num').val().length!=11){
                $('.phone-group').addClass('has-feedback');
                $('.phone-group').addClass('has-error');
                $('#phone_num').next().show()
                $('#phone_num').next().next().show();
                return false;
            }
            $.ajax({
                url: '/api/join/send_sms',
                dataType: 'json',
                type: 'post',
                data:{phone_num:$('#phone_num').val(),country:1,lang:'zh'} ,
                success: function(response){
                    var countdown=60;
                    var obj = $('.get-certification');

                    function settime(obj) {
                        if (countdown == 0) {
                            $(obj).attr("disabled",false);
                            $(obj).attr("mark","1");
                            $(obj).html("获取验证码");
                            countdown = 60;
                            return;
                        } else {
                            $(obj).attr("disabled", true);
                            $(obj).attr("mark","0");
                            $(obj).html("重新发送(" + countdown + ")");
                            countdown--;
                        }
                        setTimeout(function() {
                            settime(obj) 
                            }
                            ,1000)   
                    }
                    settime(obj)
                },
                error: function(e) {
                    console.log(e);
                    var msg  = '发送短信失败';
                    if(typeof(jQuery.parseJSON(e.responseText).message)=='string'){
                        msg = jQuery.parseJSON(e.responseText).message;
                    }
                    $('.alert-danger').text(msg);
                    $('.alert-danger').show();
                }
            },'get');
        })

</script>
        
@endsection