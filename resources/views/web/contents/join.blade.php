@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
    <div class="join-div-1">
        喜豆销售合伙人申请
    </div>
    <form class="form-horizontal">
        <div class="join-contain">
            <div class="join-input form-control-1">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10 form-container">
                            <h3>填写资料</h3>
                            <div class="form-group has-error">
                                <label class="col-sm-3 join-label control-label" for="name">姓名：</label>
                                <div class="col-sm-9">
                                    <input type="text" class=" join-input form-control" id="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 join-label control-label" for="gender">性别：</label>
                                <div class="col-sm-9">
                                    <input type="text" class=" join-input form-control" id="gender">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 join-label control-label" for="email">邮箱：</label>
                                <div class="col-sm-9">
                                    <input type="text" class=" join-input form-control" id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 join-label control-label" for="phone_num">手机号：</label>
                                <div class="col-sm-9">
                                    <input type="text" class=" join-input form-control" id="phone_num">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 join-label control-label" for="type">销售合伙人类型：</label>
                                <div class="col-sm-9">
                                    <select class=" join-input form-control" id="type">
                                        <option value="">请选择类型</option>
                                        <option value="P">省级合伙人代表</option>
                                        <option value="D">市级合伙人代表</option>
                                        <option value="A">区(县)级合伙人代表</option>
                                        <option value="S">零售代表</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 join-label control-label" >地域：</label>
                                <select class="col-sm-3 join-input" id="province">
                                <option value="">省份</option>
                                </select>
                                <select class="col-sm-3 join-input" id="city">
                                <option value="">城市</option>
                                </select>
                                <select class="col-sm-3 join-input form-control" id="area">
                                <option value="">地区</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="join-contain">
            <div class="join-input-2">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10 form-container">
                            <div class="form-group">
                                <label class="col-sm-3 join-label control-label" for="phone_num">推荐人：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="join-input form-control" id="recommonder">
                                </div>
                            </div>
                            <div class="checkbox">
                                 <label class="control-label">是否需要预约电话咨询？</label>
                                <label>
                                  <input type="radio" name="gender"> 是
                                </label>
                                <label>
                                  <input type="radio" name="gender"> 否
                                </label>
                              </div>
                              <div>
                                  <i class="customer"></i>我们的服务专员可在什么时候联系您？
                              </div>
                            <div style="display:inline-block;max-width:81px">
                                <div class="input-group">
                                    <span class="input-group-addon">周</span>
                                    <input type="text" class="form-control" style="width:40px" value="一">
                                </div>
                            </div>
                            <span class="join-line"></span>
                            <div style="display:inline-block;max-width:81px">
                                <div class="input-group">
                                <span class="input-group-addon">周</span>
                                <input type="text" class="form-control" style="width:40px" value="五">
                                </div>
                            </div>
                            <div style="display:inline-block;width:100px"></div>
                            <div style="display:inline-block;max-width:100px">
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker" value="8:30">
                                </div>
                            </div>
                            <span class="join-line"></span>
                            <div style="display:inline-block;max-width:100px">
                                <div class="input-group">
                                    <input type="text" class="form-control timepicker" value="18:30" >
                                </div>
                            </div>                        
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="join-contain" style="text-align:center;margin-bottom:50px;margin-top:30px">
        <button class="btn btn-warning btn-submit" href="/UnionPay" style="padding: 6px 25px;border-radius: 13px;">提交申请</button>
    </div>
@endsection

@section('scripts')
<script>
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
        $('.btn-submit').click(function(){
            var name = $('#name').val();
            var gender = $('#gender').val();
            var email = $('#email').val();
            var phone_num = $('#phone_num').val();
            var type = $('#type').val();
            var province = $('#province').val();
            if(!name){
                $('#name').parent().addClass('has-error')
            }
            // $.ajax({
            //     url: '/api/location?type=area&seq='+city_val,
            //     dataType: 'json',
            //     type: 'POST',
            //     success: function(response){
            //         var row = response.data.data;
            //         var html = '';
            //         var html = '<option value="">选择地区</option>';
            //         for(var i=0; i<row.length; i++){
            //             html +="<option value='"+row[i].seq+"'>"+row[i].name+"</option>";
            //         }
            //         area.html(html);
            //     },
            //     error: function(e) {
            //         console.log(e);
            //         city.html('<option value>地区</option>');
            //     }
            // });
        })
</script>
        
@endsection
