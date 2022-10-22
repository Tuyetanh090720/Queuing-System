@extends('layouts.admins')
@section('diary')
<div class="container-fluid">
    <div class="accounts-diary">
        <div class="container-block">
            <span class="title-page">Danh sách dịch vụ</span>
            <div class="filter-block">
                <div class="row justify-content-sb">
                    <div class="col-lg-4 col-md-4 col-sm 6">
                        <div class="form-group">
                            <label>Từ khóa</label>
                            <div class="search">
                                <input type="text" required="required" class="form-control" id="keywords" value="{{request()->keywords}}" placeholder="Từ khóa">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="pagination-ajax">
                @include('admins/diary/table')
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
                            url: "{{ route('admins.diary.getMore') }}"+ "?page=" + page,
                            success:function(data) {
                            $('#pagination-ajax').html(data);
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
