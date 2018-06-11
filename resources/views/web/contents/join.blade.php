@extends('web.layouts.app')

@section('title', 'Main page')

@section('css')
@endsection

@section('content')
    <div class="join-div-1">
        喜豆销售合伙人申请
    </div>
    <div class="join-contain">
        <div class="join-input-1">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 form-container">
                        <h3>填写资料</h3>
                        <div class="form-group">
                            <label class="col-lg-3 join-label" for="name">姓名：</label>
                            <input type="text" class="col-lg-9 join-input" id="name">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 join-label" for="gender">性别：</label>
                            <input type="text" class="col-lg-9 join-input" id="gender">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 join-label" for="email">邮箱：</label>
                            <input type="text" class="col-lg-9 join-input" id="email">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 join-label" for="phone_num">手机号：</label>
                            <input type="text" class="col-lg-9 join-input" id="phone_num">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 join-label" for="type">销售合伙人类型：</label>
                            <select class="col-lg-9 join-input" id="type"></select>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 join-label" for="type">地域：</label>
                            <select class="col-lg-3 join-input" id="type"></select>
                            <select class="col-lg-3 join-input" id="type"></select>
                            <select class="col-lg-3 join-input" id="type"></select>
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
                        <div>
                            <p>金额：</p>
                            <p style="font-size: 24px"><b>123123123.00</b></p>
                        </div>
                        <div>
                            <p>付款方式：</p>
                            <!-- <p style="font-size: 24px"><b>123123123.00</b></p> -->
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
                            <label class="col-lg-3 join-label" for="phone_num">推荐人：</label>
                            <input type="text" class="col-lg-9 join-input" id="recommonder">
                        </div>
                        <!-- <div class="checkbox">
                             <label class="control-label">是否需要预约电话咨询？</label>
                             <div class="controls">
                                <label class="radio inline">
                                    <input type="radio" value="1"  name="group">是
                                </label>
                                <label class="radio inline">
                                    <input type="radio" value="2" name="group">否
                                </label>
                            </div>
                        </div> -->
                        <div class="checkbox">
                             <label class="control-label">是否需要预约电话咨询？</label>
                            <label>
                              <input type="radio" name="gender"> 是
                            </label>
                            <label>
                              <input type="radio" name="gender"> 否
                            </label>
                          </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
