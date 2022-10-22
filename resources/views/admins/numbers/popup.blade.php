@extends('layouts.admins')
@section('number-popup')
<div class="popup-block container-fluid">
    <div class="pop-up">
        <a href="/admins/numbers/list"><i class="fa fa-xmark" id="fa-xmark"></i></a>
        <div class="content-popup">
            <span class="title-popup">Số thứ tự được cấp</span>
            <span class="number-popup">{{$numberNew->numberSerial}}</span><br/>
            <span class="service-popup">{{$numberNew->serviceName}}</span><br/>
        </div>
        <div class="time-popup">
            <span>Thời gian cấp: {{$numberNew->created_at}}</span><br/>
            <span>Thời gian hạn: {{$numberNew->numberExpiry}}</span>
        </div>
    </div>
</div>
@endsection
