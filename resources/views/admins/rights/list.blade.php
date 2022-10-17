@extends('layouts.admins')
@section('right-list')
<div class="container-fluid">
    <div class="rights">
        <div class="container-block">
            <span class="title-page">Danh sách vai trò</span>
            <div class="filter-block search-rights">
                <div class="d-flex justify-content-end">
                    <div class="form-group">
                        <label>Từ khóa</label>
                        <div class="search">
                            <input type="text" required="required" name="Title"  class="form-control" id="txtTitle" placeholder="Nhập từ khóa">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="pagination-ajax">
                @include('admins.rights.table')
                <script>
                    $(document).ready(function() {
                        $(document).on('click', '.pagination a', function(event) {
                            event.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            getMore(page);
                        });

                        $('#keywords').on('keyup', function() {
                            $value = $(this).val();
                            getMore();
                        });
                    });

                    function getMore(page) {
                        var search = $('#keywords').val();

                        $.ajax({
                            type: "GET",
                            data: {
                                'keywords':search,
                            },
                            url: "{{ route('admins.rights.getMore') }}"+ "?page=" + page,
                            success:function(data) {
                            $('#pagination-ajax').html(data);
                            }
                        });
                    }
                </script>
            </div>
        </div>
        <div class="btn-control">
            <button>
                <a href="{{route('admins.rights.add')}}">
                    <i class="fa fa-square-plus"></i>
                    <br/>
                    Thêm vai trò
                </a>
            </button>
        </div>
    </div>
</div>
@endsection
