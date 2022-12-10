@extends('layouts.admins')
@section('service-edit')
<div class="container-fluid">
    <span class="title-page">Quản lý dịch vụ</span>
    <div class="container-white">
        <div class="service-add">
            <span class="title-add">Thông tin dịch vụ</span>
            <form method="POST" action="/admins/services/edit/{{$service->serviceId}}">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="serviceId">Mã dịch vụ</label>
                            <input type="text" class="form-control" name="serviceId" value="{{$service->serviceCode}}" required>
                        </div>
                        <div class="form-group">
                            <label for="serviceName">Tên dịch vụ</label>
                            <input type="text" class="form-control" name="serviceId" value="{{$service->serviceName}}" required>
                        </div>
                        <div class="select-input">
                            <div class="dropdown">
                                <div class="form-group">
                                    <label for="serviceActiveST">Trạng thái hoạt động</label>
                                    <input type="text" id="serviceActiveST" name="serviceActiveST" placeholder="Tất cả" value="{{$service->serviceActiveST}}" readonly>
                                    <div class="option serviceActiveST">
                                        <div class="option-item active" onclick="chooseOption('serviceActiveST', 0)">Tất cả</div>
                                        <div class="option-item" onclick="chooseOption('serviceActiveST', 1)">Hoạt động</div>
                                        <div class="option-item" onclick="chooseOption('serviceActiveST', 2)">Ngưng hoạt động</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="password">Mô tả</label>
                            <textarea name="service-description" class="form-control" cols="30" rows="6">{{$service->serviceDescription}}</textarea>
                        </div>
                    </div>
                </div>
                <span class="title-add">Quy tắc cấp số</span>
                @if (in_array("increment", $serviceRuleNumber))
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="increment" checked>
                        <label for="increment">Tăng tự động từ:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                        <span>đến</span>
                        <div class="numb-block">
                            <span>999</span>
                        </div>
                    </div>
                @else
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="increment">
                        <label for="increment">Tăng tự động từ:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                        <span>đến</span>
                        <div class="numb-block">
                            <span>999</span>
                        </div>
                    </div>
                @endif
                @if (in_array("prefix", $serviceRuleNumber))
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="prefix" checked>
                        <label for="prefix">Prefix:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                    </div>
                @else
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="prefix">
                        <label for="prefix">Prefix:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                    </div>
                @endif
                @if (in_array("surfix", $serviceRuleNumber))
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="surfix" checked>
                        <label for="surfix">Surfix:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                    </div>
                @else
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="surfix">
                        <label for="surfix">Surfix:</label>
                        <div class="numb-block">
                            <span>001</span>
                        </div>
                    </div>
                @endif
                @if (in_array("reset", $serviceRuleNumber))
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="reset" checked>
                        <label for="reset">Reset mỗi ngày</label>
                    </div>
                @else
                    <div class="checkbox-group">
                        <input type="checkbox" name="serviceRuleNumber[]" value="reset">
                        <label for="reset">Reset mỗi ngày</label>
                    </div>
                @endif
                <div class="error-required">
                    <i class="fa fa-star-of-life"></i>
                    <span>Là trường thông tin bắt buộc</span>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="/admins/services/list">Hủy</a>
                    </button>
                    <button class="btn btn-login" type="submit">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
<script src='{{asset('assets/admins/js/input-tag.js')}}'></script>
@endsection
