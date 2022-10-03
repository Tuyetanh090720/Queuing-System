@extends('layouts.admins')
@section('right-list')
<div class="container-fluid">
    <div class="rights">
        <div class="container-block">
            <span class="title-page">Danh sách vai trò</span>
            <div class="filter-block search-rights">
                <div class="col-lg-4 col-md-4 col-sm 6">
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <div class="search">
                            <input type="text" required="required" name="Title"  class="form-control" id="txtTitle" placeholder="Nhập từ khóa">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên vai trò</th>
                            <th>Số người dùng</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="/admins/rights/edit/1">Cập nhật
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="">Cập nhật
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="">Cập nhật
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td style="text-align: center;">
                                <a href="">Cập nhật
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="btn-control">
            <button>
                <a href="{{route('admins.rights.add')}}">
                    <i class="fa fa-square-plus"></i>
                    <br/>
                    Thêm vai trò
                </a>
            </button>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
