@extends('layouts.admins')
@section('right-list')
<div class="container-fluid">
    <div class="rights">
        <div class="container-block">
            <span class="title-page">Danh sách vai trò</span>
            <div class="filter-block search-rights">
                <div class="d-flex justify-content-end">
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <div class="search">
                            <input type="text" required="required" name="Title"  class="form-control" id="txtTitle" placeholder="Nhập từ khóa">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="pagination-ajax">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã quyền vai trò</th>
                            <th>Tên quyền vai trò</th>
                            <th>Loại quyền vai trò</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($rightFunctionList))
                            @foreach ($rightFunctionList as $item)
                            <tr>
                                <td>{{$item->rightFunctionId}}</td>
                                <td>{{$item->rightFunctionName}}</td>
                                <td>{{$item->rightFunctionType}}</td>
                                <td style="text-align: center;">
                                    <a href="/admins/right_functions/edit/{{$item->rightFunctionId}}">Cập nhật
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="/admins/right_functions/delete/{{$item->rightFunctionId}}">Xóa
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4">Không có vai trò</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="btn-control">
            <button>
                <a href="{{route('admins.right_functions.add')}}">
                    <i class="fa fa-square-plus"></i>
                    <br/>
                    Thêm quyền vai trò
                </a>
            </button>
        </div>
    </div>
</div>
@endsection
