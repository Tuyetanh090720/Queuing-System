<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Tên vai trò</th>
            <th>Số người dùng</th>
            <th>Mô tả</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($rightsList))
            @foreach ($rightsList as $item)
            <tr>
                <td>{{$item->rightName}}</td>
                <td>{{$countRightList[$i++]}}</td>
                <td>{{$item->rightDescription}}</td>
                <td style="text-align: center;">
                    <a href="/admins/rights/edit/{{$item->rightId}}">Cập nhật
                        <ion-icon name="create-outline"></ion-icon>
                    </a>
                </td>
                <td style="text-align: center;">
                    <a href="/admins/rights/delete/{{$item->rightId}}">Xóa
                        <ion-icon name="create-outline"></ion-icon>
                    </a>
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="4">Không có vai trò</td>
            </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end" id="pagination">
    {!! $rightsList->links() !!}
</div>
