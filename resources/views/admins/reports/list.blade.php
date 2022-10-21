@extends('layouts.admins')
@section('report-list')
<div class="container-fluid">
    <div class="reports">
        <div class="container-block">
            <span class="title-page">Danh sách báo cáo</span>
            <div class="filter-block" style="width: 50%">
                <div class="form-group">
                    <label>Từ khóa</label>
                    <div class="search">
                        <input type="text" required="required" class="form-control" id="keywords" value="{{request()->keywords}}" placeholder="Từ khóa">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="table-responsive" id="pagination-ajax">
                @include('admins/reports/table')
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
                        var keywords = $('#keywords').val();

                        $.ajax({
                            type: "GET",
                            data: {
                                'keywords': keywords,
                            },
                            url: "{{ route('admins.reports.getMore') }}"+ "?page=" + page,
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
