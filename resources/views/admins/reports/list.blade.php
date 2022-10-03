@extends('layouts.admins')
@section('report-list')
<div class="container-fluid">
    <div class="reports">
        <div class="container-block">
            <span class="title-page">Danh sách báo cáo</span>
            <div class="filter-block" style="width: 50%">
                <div class="form-group">
                    <label>Chọn thời gian</label>
                    <div class="filter-time">
                        <input type="text" name="start-at"  class="form-control"  placeholder="10/10/1995" required>
                        <i class="fa fa-caret-right"></i>
                        <input type="text" name="start-at"  class="form-control"  placeholder="10/10/1995" required>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Tên dịch vụ</th>
                            <th>Thời gian cấp</th>
                            <th>Tình trạng</th>
                            <th>Nguồn cấp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #4277FF"></i> Đang chờ</td>
                            <td>192.168.1.10</td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Ngưng hoạt động</td>
                            </td>
                            <td>192.168.1.10</td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #7E7D88"></i> Đã sử dụng</td>
                            </td>
                            <td>192.168.1.10</td>
                        </tr>
                        <tr>
                            <td>KIO_01</td>
                            <td>Kiosk</td>
                            <td>192.168.1.10</td>
                            <td><i class="fa fa-circle" style="color: #EC3740"></i> Bỏ qua</td>
                            </td>
                            <td>192.168.1.10</td>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="btn-control">
            <button>
                <a href="{{route('admins.numbers.add')}}">
                    <i class="fa fa-file-arrow-down"></i>
                    <br/>
                    Tải về
                </a>
            </button>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
