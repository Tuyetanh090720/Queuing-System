<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã thiết bị</th>
            <th>Tên thiết bị</th>
            <th>Địa chỉ IP</th>
            <th>Trạng thái hoạt động</th>
            <th>Trạng thái kết nối</th>
            <th>Dịch vụ sử dụng</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($devicesList))
            @foreach ($devicesList as $item)
                <tr>
                    <td>{{$item->deviceId}}</td>
                    <td>{{$item->deviceName}}</td>
                    @if ($item->deviceActiveST == "Hoạt động")
                        <td><i class="fa fa-circle" style="color: #34CD26"></i> {{$item->deviceActiveST}}</td>
                    @else
                        <td><i class="fa fa-circle" style="color: #EC3740"></i> {{$item->deviceActiveST}}</td>
                    @endif
                    @if ($item->deviceConnectST == "Hoạt động")
                        <td><i class="fa fa-circle" style="color: #34CD26"></i> {{$item->deviceConnectST}}</td>
                    @else
                        <td><i class="fa fa-circle" style="color: #EC3740"></i> {{$item->deviceConnectST}}</td>
                    @endif
                    <td>{{$item->serviceName}}</td>
                    <td style="text-align: center;">
                        <a href="/admins/devices/detail/{{$item->deviceId}}">Chi tiết
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                    <td style="text-align: center;">
                        <a href="/admins/devices/edit/{{$item->deviceId}}">Cập nhật
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">Không có thiết bị</td>
            </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end" id="pagination">
    {!! $devicesList->links() !!}
</div>
