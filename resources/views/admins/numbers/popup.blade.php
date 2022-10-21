@extends('layouts.admins')
@section('number-popup')
<div class="popup-block container-fluid">
    <div class="pop-up">
        <a href="/admins/numbers/list"><i class="fa fa-xmark" id="fa-xmark"></i></a>
        <div class="content-popup">
            <span class="title-popup">Số thứ tự được cấp</span>
            <span class="number-popup">2222222</span><br/>
            <span class="service-popup">2222222</span><br/>
        </div>
        <div class="time-popup">
            <span>Thời gian cấp: 09:30 11/10/2021</span><br/>
            <span>Thời gian cấp: 09:30 11/10/2021</span>
        </div>
    </div>
</div>
@endsection
