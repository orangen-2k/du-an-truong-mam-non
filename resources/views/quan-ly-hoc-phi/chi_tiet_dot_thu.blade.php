@extends('layouts.main') @section('title', "Quản lý khoản thu")
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<style>
    thead th,td {
        text-align: center
    }
     thead tr th{
        font-weight: bold !important
    }
    .quan_trong{
        font-weight: bold;
        color: red;
    }

    .dataTables_filter {
        display: none;
    }

    .chuc_nang i {
        cursor: pointer;
    }

    tbody td>.fa-check {
        color: #77d777
    }

    tbody td>.flaticon-circle {
        color: red
    }

    #form-add-khoan-thu label span {
        color: red
    }

    #form-edit-khoan-thu label span {
        color: red
    }
    .bat_buoc{
        color: red
    }
</style>
@endsection
@section('content')
<div class="m-content">
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-12">

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__body">
                    <div class="m-section m-section--last">
                        <div class="m-section__content">
                            <!--begin::Preview-->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="m-portlet__head justify-content-center">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title title_lap_dot_thu" data-toggle="modal"
                                                data-target="#modal_tao_dot_thu">
                                                <h3 class="m-portlet__head-text">
                                                    Đợt thu {{$dot_thu->thang_thu}}/{{$dot_thu->nam_thu}} -
                                                    {{$khoi_thu->ten_khoi}}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-demo">
                                        <div class="m-demo__preview">
                                            <div class="m-list-search">
                                                <div class="m-list-search__results">
                                                    @foreach ($dot_thu->ChiTietDotThuTien as $item)
                                                    <span
                                                        class="m-list-search__result-category m-list-search__result-category--first">
                                                        {{$item->ten_dot_thu}}
                                                    </span>
                                                    @foreach ($khoi_thu->LopHoc as $chi_tiet_lop)
                                                    <div onclick="getThongTinDongTienLop({{$item->id}},{{$chi_tiet_lop->id}})"
                                                        class="m-list-search__result-item">
                                                        <span class="m-list-search__result-item-icon"><i
                                                                class="flaticon-interface-3 m--font-warning"></i></span>
                                                        <span
                                                            class="m-list-search__result-item-text">{{$chi_tiet_lop->ten_lop}}</span>
                                                    </div>
                                                    @endforeach


                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="m-portlet__head d-flex justify-content-end">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <button type="button" id="button_chuyen_lop"
                                                    class="btn m-btn m-btn--gradient-from-success m-btn--gradient-to-accent mr-3"
                                                    data-toggle="modal"
                                                    data-target="#thong_bao_theo_lop"
                                                    >Thông báo cho
                                                    PH</button>


                                                <button style="display: block;" type="button"
                                                    id="button_xep_lop_tu_dong" onclick="showSlHocSinhChuaCoLop()"
                                                    data-toggle="modal" data-target="#modal-xep-lop-tu-dong"
                                                    class="btn btn-secondary">Xếp
                                                    lớp tự động</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">

                                   
                                    <table style="width: 1200px;" class="table table-striped m-table m-table--head-bg-success table-hover m-table--border-success">
                                        <thead class="thong_tin_tieu_de">
                                           
                                        </thead>
                                        <tbody class="thong_tin_chi_tiet">
                                         
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>


                            <!--end::Preview-->

                        </div>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
    <!--End::Section-->
</div>

     {{-- modal gửi thông báo theo khối --}}
     <div class="modal fade" id="thong_bao_theo_lop" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gửi thông báo (<span id="ten_dot_thu"></span>)</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" id="form_gui_thong_bao_theo_lop" method="post">
                    <div class="modal-body">
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Chọn học sinh <span
                                    class="bat_buoc">*</span></label>
                            <select name="danh_sach_hoc_sinh[]" multiple style="width: 100%;" id="danh_sach_hoc_sinh" class="form-control m-input m-input--square"
                                id="exampleSelect1">
                                {{-- @foreach ($nam_hoc_moi->Khoi as $item)
                                <option value="{{$item->id}}">{{$item->ten_khoi}}
                                </option>
                                @endforeach --}}
                            </select>
                        </div>
                        <input type="hidden" name="id_lop_chon" value="lop_id" id="id_lop_chon">
                        <input type="hidden" name="id_dot_chon" value="dot_id" id="id_dot_chon">

                        <div class="row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Thông báo thu tiền <span
                                        class="bat_buoc">*</span></label>
                                <select name="trang_thai_thong_bao" class="form-control m-input m-input--square"
                                    id="exampleSelect1">
                                    <option value="1">Thông báo thu tiền</option>
                                    <option value="2">Thông báo hủy thu tiền</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Dư kiến thu từ ngày
                                    <span class="bat_buoc">*</span></label>
                                <input name="ngay_bat_dau" type="date" class="form-control m-input"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Đến ngày <span
                                        class="bat_buoc">*</span></label>
                                <input name="ngay_ket_thuc" type="date" class="form-control m-input"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Đóng</button>
                        <button type="button" onclick="GuiThongBaoTheoLop()"
                            class="btn btn-primary">Gửi thông báo</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    {{-- end thông báo theo khối--}}




@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
     $(document).ready( function () {

$("body").addClass('m-aside-left--minimize m-brand--minimize')
$("#danh_sach_hoc_sinh").select2()
});
    const url_tao_dot_thu = "{{route('get-chi-tiet-dot-thu-theo-lop')}}";
    const url_gui_thong_bao_theo_lop = "{{route('gui-thong-bao-theo-lop')}}";
    
    const getThongTinDongTienLop =(dot,lop) =>{
        $('#id_lop_chon').val(lop)
        $('#id_dot_chon').val(dot)
     
    axios.post(url_tao_dot_thu,{
            'id_dot' : dot,
            'id_lop' : lop,
        }).then(function (response) {
            html_tieu_de= `
            <tr>
                <th>Số thứ tự</th>
                <th>Mã học sinh</th>
                <th>Họ tên </th>
                <th>Ngày sinh</th>
                <th>Tổng tiền phải thu</th>
            `

                response.data.khoan_thu_trong_dot.forEach(element => {
                    html_tieu_de+=`
                    <th>${element.ten_khoan_thu}</th>
                    `
                });

            html_tieu_de+=`
                <th>Đóng tiền</th>
                <th>Thông báo</th>
                <th>Hóa đơn</th>
            </tr>
            `

            html_chi_tiet = ""
            var thu_tu =1;
            response.data.khoan_thu_hoc_sinh.forEach(element => {
                if(element.trang_thai == 1){
                    html_trang_thai ='<i class="fa fa-check"></i>'
                }else{
                    html_trang_thai ='<i class="flaticon-circle"></i>'
                }

                if(element.thong_bao == 1){
                    html_thong_bao ='<i class="fa fa-check"></i>'
                }else{
                    html_thong_bao ='<i class="flaticon-circle"></i>'
                }

                html_chi_tiet +=`          
                    <tr>
                        <td scope="row">${thu_tu++}</td>
                        <td>${element.chi_tiet_hoc_sinh.ma_hoc_sinh}</td>
                        <td>${element.chi_tiet_hoc_sinh.ten}</td>
                        <td>${element.chi_tiet_hoc_sinh.ngay_sinh}</td>
                        <td class='quan_trong'>${element.so_tien_phai_dong.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}</td>
                        `
                        
                          response.data.khoan_thu_trong_dot.forEach(khoan_thu => { 
                              var check = 0;
                            element.chi_tiet_khoan_thu_hoc_sinh.forEach(chi_tiet_khoan_thu => {      
                                // console.log(khoan_thu.id, chi_tiet_khoan_thu.id_khoan_thu)
                                if(khoan_thu.id != chi_tiet_khoan_thu.id_khoan_thu){
                                    check++
                                }else{
                                    var so_tien = chi_tiet_khoan_thu.so_tien
                                }

                                if(check == element.chi_tiet_khoan_thu_hoc_sinh.length){
                                    html_chi_tiet +=` <td scope="row">0</td>`
                                }else if(khoan_thu.id == chi_tiet_khoan_thu.id_khoan_thu){
                                    html_chi_tiet +=`
                                         <td>${chi_tiet_khoan_thu.so_tien.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")}</td>
                                    `

                                }
                              
                            });


                        })
                        html_chi_tiet+=`
                        <td>${html_trang_thai}</td>
                        <td>${html_thong_bao}</td>
                        <td>Xuất hóa đơn</td>
                         </tr> `
            });

             
            $('.thong_tin_tieu_de').html(html_tieu_de)
            $('.thong_tin_chi_tiet').html(html_chi_tiet)
            
            $('#ten_dot_thu').html(response.data.dot_thu.ten_dot_thu)

            getDanhSachHocSinhGuiThongBao(response.data.khoan_thu_hoc_sinh)
            })
            .catch(function (error) {
                console.log(error);
            })
    };

    const GuiThongBaoTheoLop = () =>{
        let myForm = document.getElementById('form_gui_thong_bao_theo_lop');
        let formData = new FormData(myForm);
        axios.post(url_gui_thong_bao_theo_lop,formData)
            .then(function (response) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Gửi thông báo thành công!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(
                    ()=> location.reload()
                    )
            })
            .catch(function (error) {
                console.log(error);
            })
            .then(function () {
                // always executed
            });  
    };

    const getDanhSachHocSinhGuiThongBao =(data)=>{
        let html_danh_sach_hoc_sinh = `<option value = "0">Tất cả</option>`
        data.forEach(element => {
            html_danh_sach_hoc_sinh+=`
            <option value = "${element.chi_tiet_hoc_sinh.id}">${element.chi_tiet_hoc_sinh.ma_hoc_sinh+'-'+element.chi_tiet_hoc_sinh.ten}</option>
            `
        });
        console.log(data)

        $('#danh_sach_hoc_sinh').html(html_danh_sach_hoc_sinh)
        // $('#danh_sach_dot').html(html_danh_sach_dot)

    };
</script>
@endsection