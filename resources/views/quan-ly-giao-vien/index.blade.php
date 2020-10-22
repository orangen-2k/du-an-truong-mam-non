@extends('layouts.main')
@section('title', "Quản lý giáo viên")
@section('style')
<style>
    .paginate_button{
        /* background-color: red !important */
    }
</style>
@endsection
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div id="preload" class="preload-container text-center" style="display: none">
                    <img id="gif-load" src="{!! asset('image/icon-loading.gif') !!}" alt="">
                </div>
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Bộ lọc
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">

                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Khối</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2" name="khoi" id="khoi">
                                                <option value="0" selected>Chọn khối</option>
                                                @foreach ($khoi as $item)
                                                <option value="{{$item->id}}">{{$item->ten_khoi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-lg-2 col-form-label">Lớp</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2" name="lop" id="lop">
                                                <option value="0" selected>Chọn lớp</option>
                                                @foreach ($lop as $item)
                                                <option value="{{$item->id}}">{{$item->ten_lop}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Tên giáo viên</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control m-input m-input--square"
                                                id="exampleInputPassword1" placeholder="Tên giáo viên">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </div>

                    <!--end::Section-->
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    <section class="action-nav d-flex align-items-center justify-content-between mt-4 mb-4">

        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#exportBieuMauModal">
                <i class="fa fa-download" aria-hidden="true"></i>
                Tải xuống biểu mẫu
            </a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" id="upImport-file" data-target="#moDalImport"><i
                    class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#moDalExportData"><i class="fa fa-file-excel"
                    aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
        </div>
        <div class="col-lg-6 " style="text-align: right">

            <a href="{{route('quan-ly-giao-vien-create')}}">
                <button type="button" class="btn btn-info .bg-info">Thêm mới</button>
            </a>
        </div>

    </section>
    <div class="m-portlet">
        <div class="m-portlet__body table-responsive">
            
            <table id="myTable"  class="table m-table dataTable m-table--head-bg-success">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã giáo viên</th>
                        <th>Họ và tên</th>
                        <th>Ảnh</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Khối</th>
                        <th>Lớp</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td scope="row"><input class="search1" style="width: 70px;" type="text"></td>
                        <td scope="row"><input class="search2" style="width: 70px;" type="text"></td>
                        <td scope="row"><input class="search3" style="width: 70px;" type="text"></td>
                        <td scope="row"><input class="search4" style="width: 70px;" type="text"></td>
                        <td scope="row"><input class="search5" style="width: 70px;" type="text"></td>
                        <td scope="row">
                            <select name="" id="" class="search6">
                                <option value="">Chọn</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </td>
                        <td scope="row"><input class="search7" style="width: 70px;" type="text"></td>
                        <td scope="row"><input class="search8" style="width: 70px;" type="text"></td>
                        <td scope="row"><input class="search9" style="width: 70px;" type="text"></td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = !isset($_GET['page']) ? 1 : ($limit * ($_GET['page']-1) + 1)
                    @endphp
                    
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->ma_gv}}</td>
                        <td>{{$item->ten}}</td>
                        @if ($item->anh == "")
                        <td><img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png"
                                height="100px" width="85px" alt=""></td>
                        @else
                        <td><img src="{{ Storage::url($item->anh)}}" height="100px" width="75px" alt=""></td>
                        @endif
                        <td>{{date("d/m/Y", strtotime($item->ngay_sinh))}}</td>
                        @if ($item->gioi_tinh == 1)
                        <td>Nam</td>
                        @else
                        <td>Nữ</td>
                        @endif
                        <td>{{$item->ten_khoi}}</td>
                        <td>{{$item->ten_lop}}</td>
                        <td>
                            <a href="{{route('quan-ly-giao-vien-edit', ['lop_id'=>$item->lop_id, 'id' => $item->id])}}"><button
                                    type="button" class="btn btn-primary">Chi tiết</button></a>
                            <button type="button" onclick="delete_gv({{$item->id}})" class="btn btn-danger">Xóa</button>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-end  mt-3">{{$data->links()}}</div>

        </div>
    </div>


</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
    var url_destroy_gv = "{{route('quan-ly-giao-vien-destroy')}}";
    var url_get_lop_theo_khoi = "{{route('quan-ly-giao-vien-get-lop-theo-khoi')}}"
    $("#khoi").change(function(){
        $('#preload').css('display','block')
        axios.post(url_get_lop_theo_khoi, {
            id:  $("#khoi").val(),
        }).then(function(response){
            var data_html = '<option value="0" selected  >Chọn lớp</option>'
            response.data.forEach(element => {
                data_html+=`<option value="${element.id}" >${element.ten_lop}</option>`
            });
        $('#preload').css('display','none')
        $('#lop').html(data_html)
        }).catch(function (error) {
            console.log(error);
        });
    })
    function delete_gv(id_gv){
        Swal.fire({
            title: 'Bạn có chắc chắn xóa giáo viên ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Thu hồi',
            cancelButtonText: "Đóng"
        }).then((result) => {
            if (result.value) {
                axios.post(url_destroy_gv,{
                    id: id_gv
            }).then(function(response){
                    location.reload()
                })
            }
        })
    }
</script>
<script>
$(document).ready( function () {
//     $('#myTable').DataTable({
//     "pagingType": "full_numbers"
//   });
    var dtable = $('#myTable').DataTable();

    $('.search1').on('keyup change', function() {
    dtable
    .column(0).search(this.value)
    .draw();
    });

    $('.search2').on('keyup change', function() {
    dtable
    .column(1).search(this.value)
    .draw();
    });

    $('.search3').on('keyup change', function() {
    dtable
    .column(2).search(this.value)
    .draw();
    });

    $('.search4').on('keyup change', function() {
    dtable
    .column(3).search(this.value)
    .draw();
    });
    $('.search5').on('keyup change', function() {
    dtable
    .column(4).search(this.value)
    .draw();
    });

    $('.search6').on('change', function() {
    dtable
    .column(5).search(this.value)
    .draw();
    });

    $('.search7').on('keyup change', function() {
    dtable
    .column(6).search(this.value)
    .draw();
    });

    $('.search8').on('keyup change', function() {
    dtable
    .column(7).search(this.value)
    .draw();
    });
});
$(".dataTable").on("draw.dt", function (e) {                    
    setCustomPagingSigns.call($(this));
}).each(function () {
    setCustomPagingSigns.call($(this)); // initialize
});


// this should work with standard datatables styling - li.previous/li.next
function setCustomPagingSigns() {
    var wrapper = this.parent();
    wrapper.find("li.previous > a").text("<");
    wrapper.find("li.next > a").text(">");          
}

//  - a.previous/a.next
function setCustomPagingSigns() {
    var wrapper = this.parent();
    wrapper.find("a.previous").text("<");
    wrapper.find("a.next").text(">");           
}

// this one works with complex headers example, bootstrap style
function setCustomPagingSigns() {
    var wrap = this.closest(".dataTables_wrapper");
    var lastrow= wrap.find("div.row:nth-child(3)");
    lastrow.find("li.previous>a").text("<");
    lastrow.find("li.next>a").text(">");    
}

</script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 
@if (session('thong_bao'))
	<script>
		Swal.fire({
			position: 'top-center',
			icon: 'success',
			title: 'Thêm giáo viên thành công !',
			timer: 3000
		})
	</script>
@endif
@endsection
