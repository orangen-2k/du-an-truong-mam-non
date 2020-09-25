@extends('layouts.main')
@section('title', "Quản lý học sinh")
@section('style')
<style>
    .m-table {
        font-size: 12px
    }

    .m-table th,
    .m-table td {
        padding: 0.62rem !important;
    }

    .search {
        padding: 0.35rem 0.8rem !important;
        height: 25px;
    }

    .style-button {
        padding: 0.45rem 1.15rem;
    }

    .m-table thead th {
        border: 1px solid #f4f5f8 !important;
    }

    th[rowspan='2'] {
        text-align: center;
        line-height: 50px;
    }

    .btn {
        font-family: Arial, Helvetica, sans-serif
    }

    .scoll-table {
        height: 440px;
        overflow: auto;
    }
    .bottom{
        position: fixed;
        bottom: 50px;
    }
    table.dataTable thead td {
    border-bottom: 1px solid #d1cccc;
}
#table-hoc-sinh_wrapper>.row:first-child{
    display: none;
}
    
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="m-content">
    <div class="m-portlet">
        <div class="m-portlet__body row ">
            <div class="col-md-3"></div>
            <div class="col-md-9 table-responsive scoll-table">
                <table id="table-hoc-sinh" class="table table-striped table-bordered m-table">
                    <thead >
                        <tr>
                            <th ><input type="checkbox" id="" onclick="checkAll(this)"></th>
                            <th style="width: 50px;">Stt</th>
                            <th style="width: 100px;">Mã học sinh</th>
                            <th style="width: 150px;">Họ tên</th>
                            <th style="width: 100px;">Ngày sinh</th>
                            <th style="width: 100px;">Giới tính</th>
                            <th >Chức năng</th>
                        </tr>
                    </thead>
                    <thead class="filter">
                        <tr>
                            <td scope="row"><input class="form-control search m-input  " type="hidden"></td>
                            <td scope="row"><input class="form-control search m-input " type="hidden"></td>
                            <td scope="row"><input class="form-control search m-input search-mahs" type="text"></td>
                            <td scope="row"><input class="form-control search m-input search-ten" type="text"></td>
                            <td scope="row"><input class="form-control search m-input search-ngaysinh" type="text"></td>
                            <td scope="row">
                                <select class="form-control search m-input search-gioitinh m-input--square" id="exampleSelect1">
                                    <option value="">Chọn</option>
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                            </td>

                            <td scope="row"><input class="search8" style="width: 70px;" type="hidden"></td>
                            {{-- <td scope="row"><input class="search9" style="width: 70px;" type="text"></td> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($hocsinh)>0)
                        @php
                        $i = 1;
                        @endphp
                        @endif
                        @foreach ($hocsinh as $item)
                        <tr>
                            <th><input class="checkbox" type="checkbox" id=""></th>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$item->ma_hoc_sinh}}</td>
                            <td>{{$item->ten}}</td>
                            <td>{{$item->ngay_sinh}}</td>
                            <td>{{ config('common.gioi_tinh')[$item->gioi_tinh] }}</td>
                            <td><a class="btn btn-secondary style-button"
                                    href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Cập nhật</a>
                                <a class="btn btn-secondary style-button"
                                    href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Xóa</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready( function () {
        var dtable= $('#table-hoc-sinh').DataTable( {
        'paging': false,
        "aoColumnDefs": [
             { "bSortable": false, "aTargets": [ 0, 6 ] }, 
         ]
         }
    );
        $('.search-mahs').on('keyup change', function() {
        dtable
        .column(2).search(this.value)
        .draw();
        });
    
        $('.search-ten').on('keyup change', function() {
        dtable
        .column(3).search(this.value)
        .draw();
        });
        
        $('.search-gioitinh').on('change', function() {
        dtable
        .column(5).search(this.value)
        .draw();    
        });

        $('.search-ngaysinh').on('keyup change', function() {
        dtable
        .column(4).search(this.value)
        .draw();
        });
    });

    
</script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

<script >
    const checkAll = (e) => {
    $(e).parents('table').find('.checkbox').not(e).prop('checked', e.checked);
};
</script>
@endsection