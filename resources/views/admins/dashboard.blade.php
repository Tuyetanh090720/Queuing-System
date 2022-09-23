@extends('layouts.admins')
@section('dashboard')
<div class="container-fluid row">
    <div class="dashboard-chart col-lg-8 col-md-8 col-sm-8">
        <span>Biểu đồ cấp số</span>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body row">
                        <div class="card-icon col-lg-4 col-sm-4">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <span>Số thứ tự đã cấp</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>42000</span>
                        <div class="index">
                            <i class="fa fa-arrow-up"></i>
                            99%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-lg-4 col-sm-4">
                            <i class="fa fa-calendar-check"></i>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <span>Số thứ tự đã sử dụng</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>42000</span>
                        <div class="index">
                            <i class="fa fa-arrow-up"></i>
                            99%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-lg-4 col-sm-4">
                            <i class="fa fa-user-check"></i>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <span>Số thứ tự đang chờ</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>42000</span>
                        <div class="index">
                            <i class="fa fa-arrow-up"></i>
                            99%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-lg-4 col-sm-4">
                            <i class="fa fa-award"></i>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                            <span>Số thứ tự đã bỏ qua</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span>42000</span>
                        <div class="index">
                            <i class="fa fa-arrow-up"></i>
                            99.99%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="report-chart">
            <div class="content-chart">
                <span class="title-chart">Bảng thống kê theo ngày</span>
                <div class="package">
                    <span>Xem theo</span>
                    <select name="package-option" id="package-option" class="package-option">
                        <option value="">Ngày</option>
                        <option value="">Tuần</option>
                        <option value="">Tháng</option>
                    </select>
                </div>
            </div>
            <span>Tháng 11/2021</span>
            <div class="chart">
                <img src="{{asset('assets/admins/img/graphic.png')}}" alt="">
            </div>
        </div>
    </div>
    <div class="dashboard-overview col-lg-4 col-md-4 col-sm-4">
        <span class="title-overview">Tổng quan</span>
        <div class="device overview-items ">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="big-circle">
                    <div class="small-circle">
                        <span>90%</span>
                    </div>
                </div>
            </div>
            <div class="color-device col-lg-3 col-md-3 col-sm-3 ">
                <span class="overview-quantity">445</span>
                <div class="sb-nav-link-icon">
                    <i class="fa fa-desktop"></i>
                    <span>Thiết bị</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="device-information">
                    <span>Đang hoạt động</span><span class="color-device">452</span><br/>
                    <span>Ngưng hoạt động</span><span class="color-device">452</span>
                </div>
            </div>
        </div>
        <div class="service overview-items">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="big-circle">
                    <div class="small-circle">
                        <span>90%</span>
                    </div>
                </div>
            </div>
            <div class="color-service col-lg-3 col-md-3 col-sm-3">
                <span class="overview-quantity">445</span>
                <div class="sb-nav-link-icon">
                    <i class="fa fa-comments"></i>
                    <span>Dịch vụ</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="service-information ">
                    <span>Đang hoạt động</span><span class="color-service">452</span><br/>
                    <span>Ngưng hoạt động</span><span class="color-service">452</span>
                </div>
            </div>
        </div>
        <div class="progression overview-items">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="big-circle">
                    <div class="small-circle">
                        <span>90%</span>
                    </div>
                </div>
            </div>
            <div class="color-progression col-lg-3 col-md-3 col-sm-3">
                <span class="overview-quantity">445</span>
                <div class="sb-nav-link-icon">
                    <i class="fa fa-layer-group"></i>
                    <span>Cấp số</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="progression-information">
                    <span>Đã sử dụng</span><span class="color-progression">452</span><br/>
                    <span>Đang chờ</span><span class="color-progression">452</span><br/>
                    <span>Bỏ qua</span><span class="color-progression">452</span>
                </div>
            </div>
        </div>
        <div class="calendar" id="calendar">
            <div class="months">
                <ul>
                    <li class="prev" id="prev">&#10094;</li>
                    <li class="next" id="next">&#10095;</li>
                    <li style="text-align:center">
                        <span>Tháng </span>
                        <span class="month"></span>,
                        <span class="year"></span>
                    </li>
                </ul>
            </div>
            <hr/>

            <ul class="weekdays">
                <li>Mo</li>
                <li>Tu</li>
                <li>We</li>
                <li>Th</li>
                <li>Fr</li>
                <li>Sa</li>
                <li>Su</li>
            </ul>

            <ul class="days" id="days">
            </ul>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/calendar.js')}}'></script>
@endsection
