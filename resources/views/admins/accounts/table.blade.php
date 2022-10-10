<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Tên đăng nhập</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Trạng thái hoạt động</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($accountsList))
                @foreach ($accountsList as $item)
                    <tr>
                        <td>{{$item->accountLogin}}</td>
                        <td>{{$item->accountName}}</td>
                        <td>{{$item->accountPhone}}</td>
                        <td>{{$item->accountEmail}}</td>
                        <td>{{$item->rightName}}</td>
                        @if ($item->accountActiveST == "Hoạt động")
                        <td><i class="fa fa-circle" style="color: #34CD26"></i> {{$item->accountActiveST}}</td>
                        @else
                        <td><i class="fa fa-circle" style="color: #EC3740"></i> {{$item->accountActiveST}}</td>
                        @endif
                        <td style="text-align: center;">
                            <a href="/admins/accounts/edit/{{$item->accountId}}">Cập nhật
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Không có người dùng</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-end" id="pagination">
        {!! $accountsList->links() !!}
    </div>
</div>
