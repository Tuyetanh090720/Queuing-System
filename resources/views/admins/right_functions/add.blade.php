@extends('layouts.admins')
@section('right-function-add')
<div class="container-fluid">
    <span class="title-page">Quản lý quyền vai trò</span>
    <div class="container-white">
        <div class="right-function-add">
            <span class="title-add">Thêm quyền vai trò</span>
            <form action="/admins/right_functions/add" method="POST">
                @csrf
                <div class="form-group">
                    <label for="rightFunctionName">Tên quyền vai trò</label>
                    <input type="text" class="form-control" name="rightFunctionName" required>
                </div>
                <div class="form-group">
                    <label for="rightFunctionType">Loại quyền vai trò</label>
                    <input type="number" class="form-control" name="rightFunctionType" min="1" max="3" required>
                </div>
                <div class="error">
                    <i class="fa fa-star-of-life"></i>
                    <span>Là trường thông tin bắt buộc</span>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="">Hủy</a>
                    </button>
                    <button class="btn btn-login" type="submit">
                        Thêm quyền vai trò
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
