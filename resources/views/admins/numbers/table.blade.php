<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Tên dịch vụ</th>
            <th>Thời gian cấp</th>
            <th>Hạn sử dụng</th>
            <th>Trạng thái</th>
            <th>Nguồn cấp</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($numbersList))
            @foreach ($numbersList as $item)
                <tr>
                    <td>{{$item->numberSerial}}</td>
                    <td>{{$item->customerName}}</td>
                    <td>{{$item->serviceName}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->numberExpiry}}</td>
                    @if ($item->numberST == 'Đã hoàn thành')
                    <td><i class="fa fa-circle" style="color: #34CD26"></i> Đã hoàn thành</td>
                    @endif
                    @if ($item->numberST == 'Đang thực hiện')
                        <td><i class="fa fa-circle" style="color: #5490EB"></i> Đang thực hiện</td>
                    @else
                        <td><i class="fa fa-circle" style="color: #6C7585"></i> Vắng</td>
                    @endif
                    <td>{{$item->numberSupply}}</td>
                    <td style="text-align: center;">
                        <a href="/admins/numbers/edit/{{$item->numberId}}">Cập nhật
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">Không có số</td>
            </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end" id="pagination">
    {!! $numbersList->links() !!}
</div>
