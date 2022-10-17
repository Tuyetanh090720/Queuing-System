<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($serviceDetail as $item)
            <tr>
                <td>{{$item->numberSerial}}</td>
                @if ($item->numberST == 'Đã hoàn thành')
                    <td><i class="fa fa-circle" style="color: #34CD26"></i> Đã hoàn thành</td>
                @endif
                @if ($item->numberST == 'Đang thực hiện')
                    <td><i class="fa fa-circle" style="color: #5490EB"></i> Đang thực hiện</td>
                @endif
                @if ($item->numberST == 'Vắng')
                    <td><i class="fa fa-circle" style="color: #6C7585"></i> Vắng</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end" id="pagination">
    {!! $serviceDetail->links() !!}
</div>
