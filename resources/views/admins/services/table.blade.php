<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã dịch vụ</th>
            <th>Tên dịch vụ</th>
            <th>Mô tả</th>
            <th>Trạng thái hoạt động</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($servicesList))
            @foreach ($servicesList as $item)
                <tr>
                    <td>{{$item->serviceCode}}</td>
                    <td>{{$item->serviceName}}</td>
                    <td>{{$item->serviceDescription}}</td>
                    @if ($item->serviceActiveST == "Hoạt động")
                        <td><i class="fa fa-circle" style="color: #34CD26"></i> {{$item->serviceActiveST}}</td>
                    @else
                        <td><i class="fa fa-circle" style="color: #EC3740"></i> {{$item->serviceActiveST}}</td>
                    @endif
                    <td style="text-align: center;">
                        <a href="/admins/services/detail/{{$item->serviceId}}">Chi tiết
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                    <td style="text-align: center;">
                        <a href="/admins/services/edit/{{$item->serviceId}}">Cập nhật
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">Không có dịch vụ</td>
            </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end" id="pagination">
    {!! $servicesList->links() !!}
</div>
