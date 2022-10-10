@extends('layouts.admins')
@section('device-type-list')
<div class="container-fluid">
    <div class="device-types">
        <div class="container-block">
            <span class="title-page">Danh sách loại thiết bị</span>
            <div class="table-responsive"  id="pagination-ajax">
                @include('admins/device_types/table')
                <script>
                    $(document).ready(function() {
                        $(document).on('click', '.pagination a', function(event) {
                            event.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            getMore(page);
                        });
                    });

                    function getMore(page) {
                        var search = $('#keywords').val();

                        var accountActiveST = $('#accountActiveST').val();

                        $.ajax({
                            type: "GET",
                            url: "{{ route('admins.device_types.getMore') }}"+ "?page=" + page,
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
                <a href="{{route('admins.device_types.add')}}">
                    <i class="fa fa-square-plus"></i>
                    <br/>
                    Thêm thiết bị
                </a>
            </button>
        </div>
    </div>
</div>
<script src='{{asset('assets/admins/js/option.js')}}'></script>
@endsection
