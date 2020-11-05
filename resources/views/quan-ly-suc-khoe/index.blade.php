@extends('layouts.main')
@section('title', "Quản lý sức khỏe")
@section('style')
<style>
  .thong-tin-hoc-sinh-cua-lop {
    font-size: 11px
  }

  .thong-tin-hoc-sinh-cua-lop th,
  .thong-tin-hoc-sinh-cua-lop td {
    padding: 0.22rem !important;
  }

  .search {
    padding: 0.35rem 0.8rem !important;
    height: 25px;
  }

  .style-button {
    padding: 0.45rem 1.15rem;
  }

  .thong-tin-hoc-sinh-cua-lop thead th {
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
    width: 85% !important;
  }

  .m-accordion .m-accordion__item {
    overflow: visible !important;
  }

  .m-accordion .m-accordion__item .m-accordion__item-head {
    overflow: visible !important;
  }

  .chuc-nang-lop {
    margin-bottom: 0px !important;
  }

  .thong-tin-xep-lop {
    padding: 0.2rem 2.2rem !important
  }

  .error {
    color: red;
  }

  .lop_hoc .m-nav__link {
    padding: 5px 0px !important
  }

  .lop_hoc .m-nav__link-text {
    padding-left: 23px !important;
  }
</style>
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> --}}
<link href="{!!  asset('css_loading/css_loading.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content">
  <div id="preload" class="preload-container text-center" style="display: none">
    <img id="gif-load" src="https://icon-library.com/images/loading-gif-icon/loading-gif-icon-17.jpg" alt="">
  </div>
  <div class="m-portlet">
    <div class="m-portlet__body row ">
      <div class="col-md-3 danh-sach-khoi-lop">
        <div class="m-portlet m-portlet--full-height">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <div class="row">
                  <h4 class="m-portlet__head-text col-md-10">
                    Năm học: {{$namhoc->name}} <input type="hidden" name="" id="nam_hoc" value="{{$namhoc->id}}">
                  </h4>
                  <i style="cursor: pointer" class="la la-refresh" data-toggle="modal"
                  data-target="#modal-nam-hoc"></i>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="m-portlet__body"> --}}
            {{-- Modal năm học --}}
            <div class="modal fade show" id="modal-nam-hoc" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Năm Học</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control form-control-sm" id="select-nam">
                            <option value="0">Chọn</option>
                            @foreach ($getAllNamHoc as $item)
                            <option value="{{$item->id}}">{{$item->name}} @if($item->type == 1)<span>(hiện tại)</span>@endif</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm"
                            data-dismiss="modal">Đóng</button>

                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal năm học --}}
          <!--begin::Section-->
          <div
            class="m-accordion m-accordion--default m-accordion--solid m-accordion--section  m-accordion--toggle-arrow"
            id="" role="tablist">
            <!--begin::Item-->
            <div id="danh_sach_khoi_lop">
              @foreach ($namhoc->Khoi as $item)
              <div class="m-accordion__item ">
                <div class="m-accordion__item-head collapsed" role="tab" id="tab{{$item->id}}_item_1_head"
                  data-toggle="collapse" href="#tab{{$item->id}}_item_1_body" aria-expanded="false">
                  <span class="m-accordion__item-mode "></span>&nbsp;&nbsp;&nbsp;&nbsp;
                  <span class="m-accordion__item-title">{{$item->ten_khoi}} ({{$item->do_tuoi}} tuổi)</span>
                </div>
                <div class="m-accordion__item-body collapse" id="tab{{$item->id}}_item_1_body" role="tabpanel"
                  aria-labelledby="tab{{$item->id}}_item_1_head">
                  <div class="">
                    <div class="m-dropdown__wrapper">
                      <span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
                      <div class="m-dropdown__inner">
                        <div class="m-dropdown__body">
                          <div class="m-dropdown__content">
                            <ul class="m-nav">
                              @foreach ($item->LopHoc as $lop_hoc)
                              <li class="m-nav__item pl-4 lop_hoc"  onclick="addColor(this)" id='lop_{{$lop_hoc->id}}'
                                style="cursor: pointer">
                                <span href="" class="m-nav__link" onclick="showHocSinhCuaLop({{$lop_hoc->id}}, {{$dot_id_gan_nhat}})">
                                  <span class="m-nav__link-text "> <span
                                      class="ten_lop"> {{$lop_hoc->ten_lop}} </span>
                                    </span>
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
           
          </div>
          <!--end::Section-->
          {{-- </div> --}}
        </div>
      </div>
      {{-- Modal Sức Khỏe --}}
      <div class="modal fade show" id="ShowChiTietSucKhoe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chi tiết sức khỏe</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-row" id="showChiTietSucKhoeCuaHocSinh">
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              
            </div>
          </div>
        </div>
      </div>
      {{-- EndModal Sức Khỏe --}}
      <div class="modal fade show" id="modal-them-dot-kham-suc-khoe" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới đợt khám sức khỏe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
              </div>

            <form method="POST" action="{{route('quan-ly-suc-khoe-them-dot-kham')}}">
              @csrf
              <div class="modal-body">
                <div class="form-group m-form__group row">
                  <label for="example-date-input" class="col-2 col-form-label">Tên đợt</label>
                  <div class="col-10">
                    <input class="form-control m-input" name="ten_dot" type="text" placeholder="Điền đợt khám sức khỏe">
                  </div>
                </div>

                <div class="form-group m-form__group row">
                  <label for="example-date-input" class="col-2 col-form-label">Thời gian</label>
                  <div class="col-10">
                    <input class="form-control m-input" name="thoi_gian" type="date" id="example-date-input">
                  </div>
                </div>
              </div>
          <div class="modal-footer">
            <button type="button" class="btn m-btn--square  btn-danger"
              data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn m-btn--square  btn-primary">Thêm mới</button>
          </div>
        </form>
        </div>
      </div>
    </div>
      <div class="col-md-9 table-responsive scoll-table">
        <div class="row mb-3">
          <div class="col-md-8 ">
            <input type="number" id="lop_id_hien_tai" hidden class="ml-3">
          <select class="form-control m-input select2" name="option" id="dot-kham-suc-khoe">
            @foreach($getAllDotKhamSucKhoe as $item)
            <option value={{$item->id}} disabled
            {{($item->id == $dot_id_gan_nhat) ? 'selected' : ''}}
              >{{$item->ten_dot}} - {{date("d/m/Y", strtotime($item->thoi_gian))}}</option>
            @endforeach
            @if(count($getAllDotKhamSucKhoe) == 0)
              <option value="0" disabled selected>Không có dữ liệu</option>
            @endif
          </select>
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-outline-brand" data-toggle="modal"
          data-target="#modal-them-dot-kham-suc-khoe">Thêm đợt khám sức khỏe mới</button>
        </div>
        </div>  
        
        
          
          <table id="table-hoc-sinh" class="table table-striped table-bordered m-table thong-tin-hoc-sinh-cua-lop   ">
            <thead>
              <tr align="center">
                
                <th style="width: 10%;">Số thứ tự</th>
                <th style="width: 15%;">Mã học sinh</th>
                <th style="width: 20%;">Họ tên</th>
                <th style="width: 15%;">Ngày sinh</th>
                <th style="width: 15%;">Giới tính</th>
                <th>Chiều cao (cm)</th>
                <th id="fidel_thoi_hoc">Cân nặng (kg)</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <thead class="filter">
              <tr>
                
                <td scope="row"><input class="form-control search m-input " type="hidden"></td>
                <td scope="row"><input class="form-control search m-input search-mahs" type="text"></td>
                <td scope="row"><input class="form-control search m-input search-ten" type="text"></td>
                <td scope="row"><input class="form-control search m-input search-ngaysinh" type="text"></td>
                <td scope="row" style="width:100px">
                  <select  class="form-control search m-input search-gioitinh m-input--square" id="exampleSelect1">
                    <option value="">Chọn</option>
                    <option>Nam</option>
                    <option>Nữ</option>
                  </select>
                </td>

                <td scope="row"><input class="search8" style="width: 70px;" type="hidden"></td>
                <td scope="row"><input class="search8" style="width: 70px;" type="hidden"></td>
                <td scope="row"><input class="search9" style="width: 70px;" type="hidden"></td>
              </tr>
            </thead>
            <tbody id="show-data-hoc-sinh" align="center">
            </tbody>
          </table>
        

      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
@if(SESSION('ThongBaoThemDot'))
<script>
  swal({title:"Thêm thành công",html:$("<div>")
                .addClass("some-class")
                .text("Đã thêm đợt mới thành công"),animation:!1,customClass:"animated tada"})
                
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const html_danh_sach_lop = $('#id_lop_chuyen').html();
  var dtable;
  // $(document).ready( function () {
  //   dataTable()   
  //   });

   
    function dataTable(){
      dtable= $('#table-hoc-sinh').DataTable( 
           {
        'paging': false,
        "aoColumnDefs": [
             { "bSortable": false, "aTargets": [ 0,1,2,3,4,5,6,7] }, 
         ]
         }
    );
        $('.search-mahs').on('keyup change', function() {
        dtable
        .column(1).search(this.value)
        .draw();
        });
    
        $('.search-ten').on('keyup change', function() {
        dtable
        .column(2).search(this.value)
        .draw();
        });
        
        $('.search-gioitinh').on('change', function() {
        dtable
        .column(4).search(this.value)
        .draw();    
        });

        $('.search-ngaysinh').on('keyup change', function() {
        dtable
        .column(3).search(this.value)
        .draw();
        });
        // $('#table-hoc-sinh').parents('div.dataTables_wrapper').first().hide();
    } 

</script>
<script>
  var url_SucKhoeTheoNam = "{{route('quan-ly-suc-khoe-index', ['id'])}}"
  var url_ShowSucKhoeHocSinh = "{{route('quan-ly-suc-khoe-show-sk-hs')}}"
  var url_ShowChiTietSucKhoe = "{{route('quan-ly-suc-khoe-show-chi-tiet')}}"
  $(document).ready(function(){
        $('.select2').select2();
    })
    $('#table-hoc-sinh').css('display', 'none');
    const addColor = (e) => {
        var list_element_lop = document.querySelectorAll('.lop_hoc')
        list_element_lop.forEach(element => {
            $(element).css('background', 'transparent')
        });
        $(e).css('background', '#bafac8')
    }
    var check = false;
    function showHocSinhCuaLop(lop_id, dot_id_gan_nhat){
      if(check){
        dtable.destroy();
      
      }
      check=true
      $('#lop_id_hien_tai').val(lop_id)
      $('#preload').css('display', 'block');
      $("#dot-kham-suc-khoe").select2('destroy'); 
      var disabled_sk = $('#dot-kham-suc-khoe option')
      for (const key in disabled_sk) {
        if (disabled_sk.hasOwnProperty(key)) {
          const element = disabled_sk[key];
         $(element).removeAttr('disabled')
          
        }
      }
      $("#dot-kham-suc-khoe").select2(); 
   
        axios.post(url_ShowSucKhoeHocSinh, {lop_id:lop_id, dot_id_gan_nhat:dot_id_gan_nhat})
        .then(function(response){
          
          $('#table-hoc-sinh').css('display', 'block');
          var html_show = "";
          var i = 1;
          response.data.forEach(element => {
            if(element.gioi_tinh == 0){
              element.gioi_tinh = "Nam"
            }
            else{
              element.gioi_tinh = "Nữ"
            }
            var date = new Date(element.ngay_sinh),
            yr = date.getFullYear(),
            month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
            day = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
            newDate = day + '-' + month + '-' + yr;
            html_show+=`
            <tr>
              <th scope="row">${i++}</th>
              <td>${element.ma_hoc_sinh}</td>
              <td>${element.ten}</td>
              <td>${newDate}</td>
              <td>${element.gioi_tinh}</td>
              <td>${element.chieu_cao}</td>
              <td>${element.can_nang}</td>
              <td><i style="cursor: pointer" class="la la-eye" onclick="ShowChiTietSucKhoe(${element.hoc_sinh_id})" data-toggle="modal" data-target="#ShowChiTietSucKhoe"></i></td>  
            </tr>
            `
          })
          $('#show-data-hoc-sinh').html(html_show);
          $('#preload').css('display', 'none');
          dataTable()
        })
    }

    function ShowChiTietSucKhoe(hoc_sinh_id){
      $('#preload').css('display', 'block');
      axios.post(url_ShowChiTietSucKhoe , {
        hoc_sinh_id:hoc_sinh_id
      }).then(function(response){
        //
        var i = 1;
        var html_modal = 
        `
        <div class="col-md-12 mb-3">
          <label for="validationTooltip01"><b>Học sinh:</b> ${response.data[0].ten}</label>
        </div>
        <div class="col-md-12 mb-3">
          <label for="validationTooltip01"><b>Mã học sinh:</b> ${response.data[0].ma_hoc_sinh}</label>
        </div>
        <div class="col-md-12 mb-3">
          <label for="validationTooltip01"><b>Biểu đồ</b></label>
        </div>
        <div class="col-md-12 mb-3">
          <table class="table m-table m-table--head-bg-success table-bordered">
          <thead>
               <tr>
                   <th>Số thứ tự</th>
                   <th>Đợt</th>
                   <th>Thời gian</th>
                   <th>Lớp</th>
                   <th>Chiều cao (cm)</th>
                   <th>Cân nặng (kg)</th>
               </tr>
          </thead>
          <tbody>
        `
        response.data.forEach(element => {
          var date = new Date(element.thoi_gian),
            yr = date.getFullYear(),
            month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
            day = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
            newDate = day + '-' + month + '-' + yr;

          if(element.chieu_cao == 0){
            element.chieu_cao = `<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded">Không có dữ liệu</span>`
          }
          if(element.can_nang == 0){
            element.can_nang = `<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded">Không có dữ liệu</span>`
          }
          html_modal += 
          `
          <tr>
               <th scope="row">${i++}</th>
               <td>${element.ten_dot}</td>
               <td>${newDate}</td>
               <td>${element.ten_lop}</td>
               <td>${element.chieu_cao}</td>
               <td>${element.can_nang}</td>
          </tr>
           
           
          `
        })
        html_modal += 
        `
        </tbody></table></div>
        `
        $('#showChiTietSucKhoeCuaHocSinh').html(html_modal);
        $('#preload').css('display', 'none');
        $('#ShowChiTietSucKhoe').modal('show');
        
      })
    }

    $('#dot-kham-suc-khoe').change(function(){
      var DotSucKhoe = Number($('#dot-kham-suc-khoe').val())
      var LopId = Number($('#lop_id_hien_tai').val())
      showHocSinhCuaLop(LopId, DotSucKhoe)
      // dataTable()
    })

    $("#select-nam").change(function(){
       $('#select_display').css('display', 'block')
       var id = $("#select-nam").val();
       var url_moi = url_SucKhoeTheoNam.replace('id',id)
       window.location.href = url_moi;
       
    })
</script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection