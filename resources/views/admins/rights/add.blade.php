@extends('layouts.admins')
@section('right-add')
<div class="container-fluid">
    <span class="title-page">Quản lý dịch vụ</span>
    <div class="container-white">
        <div class="right-add">
            <span class="title-add">Thêm vai trò</span>
            <form action="">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="rightId">Tên vai trò</label>
                            <input type="text" class="form-control" name="rightId" required>
                        </div>
                        <div class="form-group">
                            <label for="rightName">Mô tả</label>
                            <textarea name="right-description" class="form-control" cols="30" rows="6"></textarea>
                        </div>
                        <div class="error-required">
                            <i class="fa fa-star-of-life"></i>
                            <span>Là trường thông tin bắt buộc</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <label for="">Phân quyền chức năng</label>
                        <div class="function-block scrollbar" id="scroll-style">
                            <span class="title-add">Nhóm chức năng A</span>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <span class="title-add">Nhóm chức năng A</span>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <span class="title-add">Nhóm chức năng A</span>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                            <div class="checkbox-group">
                                <input type="checkbox" name="right" required>
                                <label for="right">Chức năng x</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="">Hủy</a>
                    </button>
                    <button class="btn btn-login">
                        <a href="">Thêm vai trò</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
