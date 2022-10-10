<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã loại thiết bị</th>
            <th>Tên loại thiết bị</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($deviceTypesList))
            @foreach ($deviceTypesList as $item)
                <tr>
                    <td>{{$item->deviceTypeId}}</td>
                    <td>{{$item->deviceTypeName}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td style="text-align: center;">
                        <a href="/admins/device_types/edit/{{$item->deviceTypeId}}">Cập nhật
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                    <td style="text-align: center;">
                        <a href="/admins/device_types/delete/{{$item->deviceTypeId}}">Xóa
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">Không có loại thiết bị</td>
            </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end" id="pagination">
    {!! $deviceTypesList->links() !!}
</div>
