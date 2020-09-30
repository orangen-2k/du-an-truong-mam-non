@extends('layouts.main')
@section('title', "Quản lý học sinh")
@section('style')
<style>
  .m-table {
    font-size: 11px
  }

  .m-table th,
  .m-table td {
    padding: 0.22rem !important;
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

  .bottom {
    position: fixed;
    bottom: 50px;
  }

  table.dataTable thead td {
    border-bottom: 1px solid #d1cccc;
  }

  #table-hoc-sinh_wrapper>.row:first-child {
    display: none;
  }

  .danh-sach-khoi-lop .m-accordion__item-title,
  .m-accordion__item-mode,
  .m-dropdown__content ul li span {
    color: black;
    font-size: 12px !important;
  }

  .danh-sach-khoi-lop .m-accordion__item {
    color: black;

    border-bottom: 1px solid #eee5e5 !important;
    margin-bottom: 0rem !important
  }

  .la-plus {
    font-size: 20px;
    font-weight: bold;
    color: #19be19;
    cursor: pointer;
  }

  .m-accordion .m-accordion__item .m-accordion__item-head {
    padding: 0.5rem 1rem;
  }

  .collapsed {
    position: relative;
  }

  .la-ellipsis-v:hover .dropdown__wrapper {
    display: block !important;
  }

  .m-nav .m-nav__item>.m-nav__link .m-nav__link-text {
    width: 96% !important;
  }

  .m-accordion .m-accordion__item {
    overflow: visible !important;
  }

  .m-accordion .m-accordion__item .m-accordion__item-head {
    overflow: visible !important;
  }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="m-content">
  <div class="m-portlet">
    <div class="m-portlet__body row ">
      <div class="col-md-3 danh-sach-khoi-lop">
        <div class="m-portlet m-portlet--full-height">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <div class="row">
                  <h3 class="m-portlet__head-text col-md-10">
                    Năm học: {{$namhoc->name}} <input type="hidden" name="" id="nam_hoc" value="{{$namhoc->id}}">
                  </h3>
                  <span class="col-md-2"><i class="la la-plus " data-toggle="modal"
                      data-target="#modal-add-khoi"></i></span>
                  {{-- start modal add khối --}}
                  <div class="modal fade" id="modal-add-khoi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm khối</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Tên khối</span>
                              </div>
                              <input type="text" class="form-control" id="ten_khoi" name="ten_khoi"
                                aria-describedby="basic-addon3">
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Độ tuổi</span>
                              </div>
                              <input type="number" class="form-control" aria-describedby="basic-addon3" id="do_tuoi"
                                name="do_tuoi">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                          <span onclick="addKhoi()" class="btn btn-primary">Thêm</span>
                        </div>
                      </div>

                    </div>
                  </div>
                  {{-- end modal add khối --}}
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="m-portlet__body"> --}}

          <!--begin::Section-->
          <div
            class="m-accordion m-accordion--default m-accordion--solid m-accordion--section  m-accordion--toggle-arrow"
            id="danh_sach_khoi_lop" role="tablist">
            {{-- start modal sửa khối --}}
            <div class="modal fade" id="modal-sua-khoi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa khối</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon3">Tên khối</span>
                        </div>
                        <input type="hidden" id="id_khoi_sua">
                        <input type="text" class="form-control" id="sua_ten_khoi" name="ten_khoi"
                          aria-describedby="basic-addon3">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon3">Độ tuổi</span>
                        </div>
                        <input type="number" class="form-control" aria-describedby="basic-addon3" id="sua_do_tuoi"
                          name="do_tuoi">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <span onclick="capNhatKhoi()" class="btn btn-primary">Cập nhật</span>
                  </div>
                </div>

              </div>
            </div>
            {{-- end modal sửa khối  --}}
            {{-- start modal add lớp --}}
            <div class="modal fade" id="modal-add-lop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo mới lớp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="m-portlet__body">
                          <div class="form-group m-form__group">
                            <input type="hidden" id="khoi_id">
                            <label for="exampleInputEmail1">Tên lớp</label>
                            <input type="text" name="ten_lop" class="form-control m-input m-input--square" id="ten_lop"
                              placeholder="Nhập tên lớp">
                            @error('ten_lop')
                            <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                              {{ $message }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            @enderror
                          </div>
                          <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Giáo viên chủ nhiệm</label>
                            <select style="width: 100%" class="form-control" name="giao_vien_cn" id="id_giao_vien_cn">
                              <option value="">Chọn giáo viên</option>
                              {{-- @foreach ($giao_vien as $item)
                              <option value={{ $item->id }}>{{ $item->ma_gv}}-{{$item->ten }}</option>
                              @endforeach --}}
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="m-portlet__body">

                          <div class="form-group m-form__group">
                            <label for="exampleInputPassword1">Giáo viên phụ</label>
                            <select style="width: 100%" disabled class="form-control m-select2" id="id_giao_vien_phu"
                              name="giao_vien_phu[]" multiple="multiple">
                              {{-- @foreach ($giao_vien as $item)
                              <option value={{ $item->id }}>{{ $item->ma_gv}}-{{ $item->ten }}</option>
                              @endforeach --}}
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <span onclick="addLop()" class="btn btn-primary">Thêm mới</span>
                  </div>
                </div>

              </div>
            </div>
            {{-- end modal add lớp  --}}

                {{-- start modal sửa lớp --}}
                <div class="modal fade" id="modal-cap-nhat-lop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
  
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cập nhật lớp</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                              <input type="hidden" id="sua_lop_id">
                              <label for="exampleInputEmail1">Tên lớp</label>
                              <input type="text" name="ten_lop" class="form-control m-input m-input--square" id="sua_ten_lop"
                                placeholder="Nhập tên lớp">
                              @error('ten_lop')
                              <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              @enderror
                            </div>
                            <div class="form-group m-form__group">
                              <label for="exampleInputEmail1">Giáo viên chủ nhiệm</label>
                              <select style="width: 100%" class="form-control" name="giao_vien_cn" id="id_sua_giao_vien_cn">
                               
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="m-portlet__body">
  
                            <div class="form-group m-form__group">
                              <label for="exampleInputPassword1">Giáo viên phụ</label>
                              <select style="width: 100%"  class="form-control m-select2" id="id_sua_giao_vien_phu"
                                name="giao_vien_phu[]" multiple="multiple">
                             
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                      <span onclick="suaLop()" class="btn btn-primary">Cập nhật</span>
                    </div>
                  </div>
  
                </div>
              </div>
              {{-- end modal sửa lớp  --}}
            <!--begin::Item-->
            @foreach ($namhoc->Khoi as $item)
            <div class="m-accordion__item">
              <div class="m-accordion__item-head collapsed" role="tab" id="tab{{$item->id}}_item_1_head"
                data-toggle="collapse" href="#tab{{$item->id}}_item_1_body" aria-expanded="false">
                <span class="m-accordion__item-mode "></span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="m-accordion__item-title">{{$item->ten_khoi}} ({{$item->do_tuoi}} tuổi)</span>
                <div class="dropdown">
                  <i style="cursor: pointer;font-size: 25px;" class="la la-ellipsis-v" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true"></i>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <span class="dropdown-item" data-toggle="modal" onclick="getDataSuaKhoi({{$item->id}})"
                      data-target="#modal-sua-khoi">Sửa</span>
                    <span class="dropdown-item" onclick="deleteKhoi({{$item->id}})">Xóa</span>
                    <span class="dropdown-item" data-toggle="modal" onclick="getIdKhoi({{$item->id}})"
                      data-target="#modal-add-lop">Thêm lớp</span>
                  </div>
                </div>
              </div>
              <div class="m-accordion__item-body collapse" id="tab{{$item->id}}_item_1_body" role="tabpanel"
                aria-labelledby="tab{{$item->id}}_item_1_head">
                <div class="m-accordion__item-content">
                  <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
                    <div class="m-dropdown__inner">
                      <div class="m-dropdown__body">
                        <div class="m-dropdown__content">
                          <ul class="m-nav">
                            @foreach ($item->LopHoc as $lop_hoc)
                          <li class="m-nav__item pl-4" id='lop_{{$lop_hoc->id}}' style="cursor: pointer">
                              <span href="" class="m-nav__link">
                                <span onclick="showHocSinhCuaLop({{$lop_hoc->id}})"
                                  class="m-nav__link-text "> <span class="ten_lop"> {{$lop_hoc->ten_lop}} </span>
                                  ({{ $lop_hoc->tong_so_hoc_sinh }})</span>
                                <div class="dropdown">
                                  <i style="cursor: pointer;font-size: 25px;" class="la la-ellipsis-v"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></i>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <span class="dropdown-item" data-toggle="modal"
                                      data-target="#modal-cap-nhat-lop" onclick="getDataCapNhatLop({{$lop_hoc->id}})">Sửa</span>
                                    <span class="dropdown-item" >Xóa</span>
                                    <span class="dropdown-item" >Chi tiết</span>
                                  </div>
                                </div>
                              </span>
                            </li>
                            @endforeach


                          </ul>

                          <!--end::Nav-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>

          <!--end::Section-->
          {{-- </div> --}}
        </div>
      </div>
      <div class="col-md-9 table-responsive scoll-table">
        <table id="table-hoc-sinh" class="table table-striped table-bordered m-table">
          <thead>
            <tr>
              <th style="width: 5%;"><input type="checkbox" id="" onclick="checkAll(this)"></th>
              <th style="width: 10%;">Stt</th>
              <th style="width: 15%;">Mã học sinh</th>
              <th style="width: 20%;">Họ tên</th>
              <th style="width: 15%;">Ngày sinh</th>
              <th style="width: 15%;">Giới tính</th>
              <th>Chức năng</th>
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
          <tbody id="show-data-hoc-sinh">
            {{-- @if (count($hocsinh)>0)
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
            <td><a class="btn btn-secondary style-button" href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Cập
                nhật</a>
              <a class="btn btn-secondary style-button" href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Xóa</a>
            </td>
            </tr>
            @endforeach --}}

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  var dtable;
  $(document).ready( function () {
         dtable= $('#table-hoc-sinh').DataTable( {
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

<script>
  const checkAll = (e) => {
    $(e).parents('table').find('.checkbox').not(e).prop('checked', e.checked);
    };
//start route khối
var url_create_khoi = "{{route('quan-ly-khoi-post_create')}}";
var url_find_khoi = "{{route('quan-ly-khoi-show')}}";
var url_update_khoi = "{{route('quan-ly-khoi-update')}}";
var url_destroy_khoi = "{{route('quan-ly-khoi-destroy')}}";
// end route khối

//start route lớp
var url_store_lop = "{{route('quan-ly-lop-phan-store')}}";
var url_get_data_lop = "{{route('quan-ly-lop-edit')}}";
var url_update_lop = "{{route('quan-ly-lop-update')}}";
var url_giao_vien_chua_co_lop = "{{route('quan-ly-giao-vien-chua-co-lop')}}";

// end route lớp

//start route hoc sinh
var url_get_hs_lop = "{{route('quan-ly-lop-show-data-hoc-sinh')}}";
//end route hoc sinh

// start crud khối
const addKhoi = () => {
    axios.post(url_create_khoi, {
      'ten_khoi': $('#ten_khoi').val(),
      'do_tuoi': $('#do_tuoi').val(),
      'nam_hoc_id': $('#nam_hoc').val()
    })
    .then(function (response) {
      console.log(response.data)
      $('#danh_sach_khoi_lop').append(`
      <div class="m-accordion__item">
        <div class="m-accordion__item-head collapsed" role="tab" id="tab${response.data}_item_1_head" data-toggle="collapse" href="#tab${response.data}_item_1_body" aria-expanded="false">
                <span class="m-accordion__item-mode "></span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="m-accordion__item-title">${$('#ten_khoi').val()} (${$('#do_tuoi').val()} tuổi)</span>  
                <div class="dropdown">
                  <i style="cursor: pointer;font-size: 25px;" class="la la-ellipsis-v" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true"></i>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <span class="dropdown-item" data-toggle="modal" onclick="getDataSuaKhoi(${response.data})"
                      data-target="#modal-sua-khoi">Sửa</span>
                    <span class="dropdown-item" onclick="deleteKhoi(${response.data})">Xóa</span>
                    <span class="dropdown-item" data-toggle="modal"  data-target="#modal-add-lop" onclick="getIdKhoi(${response.data})">Thêm lớp</span>
                  </div>
                </div>
            </div>
            <div class="m-accordion__item-body collapse" id="tab${response.data}_item_1_body" role="tabpanel" aria-labelledby="tab${response.data}_item_1_head" >
                <div class="m-accordion__item-content">
                    <div class="m-dropdown__wrapper">
                        <span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
                        <div class="m-dropdown__inner">
                            <div class="m-dropdown__body">
                                <div class="m-dropdown__content">
                                    <ul class="m-nav">                               
                                    </ul>
                                    <!--end::Nav-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      `)
      $('#modal-add-khoi').modal('hide')
    })
    .catch(function (error) {
      console.log(error);
    });
};

const getDataSuaKhoi = (id) =>{
  axios.post(url_find_khoi, {
      'id': id,
    })
    .then(function (response) {
      $('#id_khoi_sua').val(response.data.id)
      $('#sua_ten_khoi').val(response.data.ten_khoi)
      $('#sua_do_tuoi').val(response.data.do_tuoi)
     
    })
    .catch(function (error) {
      console.log(error);
    });
};

const capNhatKhoi = (id) =>{
  axios.post(url_update_khoi, {
      'id':$('#id_khoi_sua').val(),
      'ten_khoi': $('#sua_ten_khoi').val(),
      'do_tuoi': $('#sua_do_tuoi').val(),
    })
    .then(function (response) {
     var id_box_khoi_update = 'tab'+$('#id_khoi_sua').val()+'_item_1_head'
     var testgetid = $(`#${id_box_khoi_update}`).find('.m-accordion__item-title').html(`${response.data.ten_khoi} (${response.data.do_tuoi+" tuổi"})`)
     $('#modal-sua-khoi').modal('hide')
    })
    .catch(function (error) {
      console.log(error);
    });
};

const deleteKhoi = (id) =>{
  Swal.fire({
      title: 'Bạn có chắc chắn xóa ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa',
      cancelButtonText: "Đóng"
  }).then((result) => {
      if (result.value) {
        axios.post(url_destroy_khoi,{
            'id': id
          }).then(function(response){
        var id_box_khoi_update = 'tab'+id+'_item_1_head'
        $(`#${id_box_khoi_update}`).parents('.m-accordion__item').remove();
        swal({
          title: "Xóa thành công",
          text: "You clicked the button!",
          icon: "success",
        });
      })
      }
  })
};
// end crud khối

// start show học sinh theo lớp
const showHocSinhCuaLop = (id) => {
  axios.post(url_get_hs_lop, {
      'id': id,
    })
    .then(function (response) {
      console.log(response.data)
      var html_thong_tin_hs = "";
      var i = 0;
      response.data.forEach(element => {
        html_thong_tin_hs+=`
        <tr>
              <th><input class="checkbox" type="checkbox" id=""></th>
              <th scope="row">${i++}</th>
              <td>${element.ma_hoc_sinh}</td>
              <td>${element.ten}</td>
              <td>${element.ngay_sinh}</td>
              <td>1</td>
              <td><a class="btn btn-secondary style-button" href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Cập
                  nhật</a>
                <a class="btn btn-secondary style-button" href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Xóa</a>
              </td>
            </tr>
        `
      });
      dtable.destroy();
     $('#show-data-hoc-sinh').html(html_thong_tin_hs);
    
    dtable= $('#table-hoc-sinh').DataTable( {
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
    })
    .catch(function (error) {
      console.log(error);
    });
};
// end show học sinh theo lớp
// start quản lý lớp crud
$('#id_giao_vien_cn').select2();
        $('#id_giao_vien_phu').select2();
        $('#id_giao_vien_cn').change(() => {
            var id_giao_vien_cn = $('#id_giao_vien_cn').val()
            if (id_giao_vien_cn > 0) {
                $('#id_giao_vien_phu').removeAttr('disabled')
                var list_giao_vien_phu = document.querySelectorAll('#id_giao_vien_phu option')
                list_giao_vien_phu.forEach(element => {
                    $(element).removeAttr('disabled')
                    if (id_giao_vien_cn == $(element).val()) {
                        $(element).attr('disabled', true)
                        $("#id_giao_vien_phu").select2("destroy");
                        $("#id_giao_vien_phu").select2();
                        $("#id_giao_vien_phu").select2().val('').trigger('change');
                    }
                })
            } else {
                $("#id_giao_vien_phu").select2().val('').trigger('change');
                $('#id_giao_vien_phu').attr('disabled', true)
            }
        });

const getIdKhoi = (id) => {
  var html_giao_vien=""
  axios.get(url_giao_vien_chua_co_lop)
  .then(function (response) {
  response.data.forEach(element => {
  html_giao_vien+=`
    <option value="${element.id}">${element.ten}</option>
  `
  });
  $('#id_giao_vien_cn').append(html_giao_vien)
  $('#id_giao_vien_phu').append(html_giao_vien)

  
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });
  $('#khoi_id').val(id)
};
const addLop = () =>{
  axios.post(url_store_lop, {
      'khoi_id': $('#khoi_id').val(),
      'ten_lop': $('#ten_lop').val(),
      'giao_vien_cn': $('#id_giao_vien_cn').val(),
      'giao_vien_phu': $('#id_giao_vien_phu').val()
    })
    .then(function (response) {
      console.log(response.data)
      $('#modal-add-lop').modal('hide')

      var id_box_khoi_them_lop = 'tab'+$('#khoi_id').val()+'_item_1_body'
      $(`#${id_box_khoi_them_lop}`).find('ul').append(`
      <li class="m-nav__item pl-4" id='lop_${response.data.id}' style="cursor: pointer">
        <span href="" class="m-nav__link">
          <span onclick="showHocSinhCuaLop(${response.data.id})" class="m-nav__link-text ten_lop">${response.data.ten_lop}
            (0)</span>
          <div class="dropdown">
            <i style="cursor: pointer;font-size: 25px;" class="la la-ellipsis-v" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Sửa</a>
              <a class="dropdown-item" href="#">Xóa</a>
              <a class="dropdown-item" href="#">Chi tiết</a>
            </div>
          </div>
        </span>
      </li>
      `)
      swal({
          title: "Thêm mới lớp thành công",
          icon: "success",
        });

      
    })
    .catch(function (error) {
      console.log(error);
    });
};

//start show data lop edit 
$('#id_sua_giao_vien_cn').select2();
    $('#id_sua_giao_vien_phu').select2();
    $('#id_sua_giao_vien_cn').change(() => {
        var id_sua_giao_vien_cn = $('#id_sua_giao_vien_cn').val()
        var danh_sach_giao_vien_phu = $('#id_sua_giao_vien_phu').val()
        var pos = danh_sach_giao_vien_phu.indexOf(id_sua_giao_vien_cn);
        danh_sach_giao_vien_phu.splice(pos, 1);
        $('#id_sua_giao_vien_phu').val(danh_sach_giao_vien_phu).trigger("change");
            $('#id_sua_giao_vien_phu').removeAttr('disabled')
            var list_giao_vien_phu = document.querySelectorAll('#id_sua_giao_vien_phu option')
            list_giao_vien_phu.forEach(element => {
                $(element).removeAttr('disabled')
                if (id_sua_giao_vien_cn == $(element).val()) {
                    $(element).attr('disabled', true)
                    $("#id_sua_giao_vien_phu").select2("destroy");
                    $("#id_sua_giao_vien_phu").select2();
                }
            })
});

const getDataCapNhatLop = (id) =>{
  axios.post(url_get_data_lop, {
      'id': id,
    })
    .then(function (response) {
      console.log(response.data)
      $('#sua_ten_lop').val(response.data.lop.ten_lop)
      $('#sua_lop_id').val(response.data.lop.id)
      
      $('#id_sua_giao_vien_cn').append(htmlGiaoVien(1,response.data.giao_vien_phu,response.data.giao_vien_cn,response.data.giao_vien))
      $('#id_sua_giao_vien_phu').append(htmlGiaoVien(2,response.data.giao_vien_phu,response.data.giao_vien_cn,response.data.giao_vien))
      
    })
    .catch(function (error) {
      console.log(error);

    });
};

const htmlGiaoVien = (type,giao_vien_phu,giao_vien_cn,giao_vien) =>{
      var html_giao_vien_cn = '';
      var html_giao_vien_phu = '';
      var html_giao_vien = '';
      var select_cn = '';
      var select_phu = '';

      if(type==1){
        select_cn = 'selected'
      }else{
        select_phu = 'selected'
      }
      giao_vien_phu.forEach(element => {
        html_giao_vien_phu+=`
        <option ${select_phu} value="${element.id}">${element.ten}</option>
        `
      });

      giao_vien.forEach(element => {
        html_giao_vien+=`
        <option value="${element.id}">${element.ten}</option>
        `
      });

      html_giao_vien_cn_phu =`<option ${select_cn} value="${giao_vien_cn.id}">${giao_vien_cn.ten}</option>`+html_giao_vien_phu+html_giao_vien

      return html_giao_vien_cn_phu;
};
// end show data lop edit

const suaLop = () =>{
  axios.post(url_update_lop, {
      'lop_id': $('#sua_lop_id').val(),
      'ten_lop': $('#sua_ten_lop').val(),
      'giao_vien_cn': $('#id_sua_giao_vien_cn').val(),
      'giao_vien_phu': $('#id_sua_giao_vien_phu').val()
    })
    .then(function (response) {
      var id_box_lop = 'lop_'+$('#sua_lop_id').val()
      $(`#${id_box_lop}`).find('.ten_lop').html($('#sua_ten_lop').val())
      $('#modal-cap-nhat-lop').modal('hide')
    })
    .catch(function (error) {
      console.log(error);
    });
};

// end quản lý lớp crud
</script>
@endsection