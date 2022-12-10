@extends('layouts.admins')
@section('right-edit')
<div class="container-fluid">
    <span class="title-page">Quản lý vai trò</span>
    <div class="container-white">
        <div class="right-edit">
            <span class="title-add">Sửa vai trò</span>
            <form action="/admins/rights/edit/{{$right->rightId}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-right:25px">
                        <div class="form-group">
                            <label for="rightName">Tên vai trò</label>
                            <input type="text" class="form-control" name="rightName" value="{{$right->rightName}}" required>
                        </div>
                        <div class="form-group">
                            <label for="rightDescription">Mô tả</label>
                            <textarea name="rightDescription" class="form-control" cols="30" rows="6" required>{{$right->rightDescription}}</textarea>
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
                                @if (count($functionName1)>0 && $x<count($functionName1) && $functionName1[$x]==$item)
                                    <div class="checkbox-group">
                                        <input type="checkbox" name="rightFunction[]" value="{{$item}}" checked>
                                        <label for="right">{{$item}}</label>
                                    </div>
                                    @php
                                        $x++
                                    @endphp
                                @else
                                    <div class="checkbox-group">
                                        <input type="checkbox" name="rightFunction[]" value="{{$item}}">
                                        <label for="right">{{$item}}</label>
                                    </div>
                                @endif
                            @endforeach
                            <span class="title-add">Nhóm chức năng 2</span>
                            @foreach ($rightAndFunction2 as $item)
                                @if (count($functionName2)>0 && $y<count($functionName2) && $functionName2[$y]==$item)
                                    <div class="checkbox-group">
                                        <input type="checkbox" name="rightFunction[]" value="{{$item}}" checked>
                                        <label for="right">{{$item}}</label>
                                    </div>
                                    @php
                                        $y++
                                    @endphp
                                @else
                                    <div class="checkbox-group">
                                        <input type="checkbox" name="rightFunction[]" value="{{$item}}">
                                        <label for="right">{{$item}}</label>
                                    </div>
                                @endif
                            @endforeach
                            <span class="title-add">Nhóm chức năng 3</span>
                            @foreach ($rightAndFunction3 as $item)
                                @if (count($functionName3)>0 && $z<count($functionName3) && $functionName3[$z]==$item)
                                    <div class="checkbox-group">
                                        <input type="checkbox" name="rightFunction[]" value="{{$item}}" checked>
                                        <label for="right">{{$item}}</label>
                                    </div>
                                    @php
                                        $z++
                                    @endphp
                                @else
                                    <div class="checkbox-group">
                                        <input type="checkbox" name="rightFunction[]" value="{{$item}}">
                                        <label for="right">{{$item}}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-cancel">
                        <a href="/admins/rights/list">Hủy</a>
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
@endsection
