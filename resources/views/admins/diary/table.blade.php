<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Tên đăng nhập</th>
            <th>Thời gian tác động</th>
            <th>Thao tác thực hiện</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($activityLogsList))
        @foreach ($activityLogsList as $item)
            <tr>
                <td>{{$accountLogin[$j++]}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->description}}</td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="4">Không có hoạt động</td>
            </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-end" id="pagination">
    {!! $activityLogsList->links() !!}
</div>
