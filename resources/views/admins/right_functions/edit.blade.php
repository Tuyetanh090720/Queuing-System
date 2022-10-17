@extends('layouts.admins')
@section('right-function-edit')
<div class="container-fluid">
    <span class="title-page">Quản lý dịch vụ</span>
    <div class="container-white">
        <div class="right_function-edit">
            <span class="title-add">Thêm vai trò</span>
            <form action="/admins/right_functions/edit/{{$rightFunction->rightFunctionId}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="rightFunctionName">Tên quyền vai trò</label>
                    <input type="text" class="form-control" name="rightFunctionName" value="{{$rightFunction->rightFunctionName}}" required>
                </div>
                <div class="form-group">
                    <label for="rightFunctionType">Loại quyền vai trò</label>
                    <input type="number" class="form-control" name="rightFunctionType" min="1" max="3" value="{{$rightFunction->rightFunctionType}}" required>
                </div>
                <div class="error">
                    <i class="fa fa-star-of-life"></i>
                    <span>Là trường thông tin bắt buộc</span>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="/admins/right_functions/list">Hủy</a>
                    </button>
                    <button class="btn btn-login">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
