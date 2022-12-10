@extends('layouts.admins')
@section('right-add')
<div class="container-fluid">
    <span class="title-page">Quản lý vai trò</span>
    <div class="container-white">
        <div class="right-add">
            <span class="title-add">Thêm vai trò</span>
            <form action="/admins/rights/add" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="rightName">Tên vai trò</label>
                            <input type="text" class="form-control" name="rightName" required>
                        </div>
                        <div class="form-group">
                            <label for="rightDescription">Mô tả</label>
                            <textarea name="rightDescription" class="form-control" cols="30" rows="6" required></textarea>
                        </div>
                        <div class="error-">
                            <i class="fa fa-star-of-life"></i>
                            <span>Là trường thông tin bắt buộc</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <label for="">Phân quyền chức năng</label>
                        <div class="function-block scrollbar" id="scroll-style">
                            <span class="title-add">Nhóm chức năng 1</span>
                            @foreach ($rightAndFunction1 as $item)
                                <div class="checkbox-group">
                                    <input type="checkbox" name="rightFunction[]" value="{{$item}}">
                                    <label for="right">{{$item}}</label>
                                </div>
                            @endforeach
                            <span class="title-add">Nhóm chức năng 2</span>
                            @foreach ($rightAndFunction2 as $item)
                                <div class="checkbox-group">
                                    <input type="checkbox" name="rightFunction[]" value="{{$item}}">
                                    <label for="right">{{$item}}</label>
                                </div>
                            @endforeach
                            <span class="title-add">Nhóm chức năng 3</span>
                            @foreach ($rightAndFunction3 as $item)
                                <div class="checkbox-group">
                                    <input type="checkbox" name="rightFunction[]" value="{{$item}}">
                                    <label for="right">{{$item}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="">Hủy</a>
                    </button>
                    <button class="btn btn-login" type="submit">
                        Thêm vai trò
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
