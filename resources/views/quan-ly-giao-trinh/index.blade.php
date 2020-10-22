@extends('layouts.main')
@section('title', "Danh sách giáo trình")
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
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
                                    {{-- <h3 class="m-portlet__head-text col-md-10">
                    Năm học: {{$namhoc->name}} <input type="hidden" name="" id="nam_hoc" value="{{$namhoc->id}}">
                                    </h3>
                                    @if ($namhoc->type == 1)
                                    <span class="col-md-2"><i class="la la-plus " data-toggle="modal"
                                            data-target="#modal-add-khoi"></i></span>
                                    @endif --}}
                                    <h4 class="m-portlet__head-text col-md-10">
                                        Năm học: 
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="m-portlet__body"> --}}
                    <!--begin::Section-->
                    <div class="m-accordion m-accordion--default m-accordion--solid m-accordion--section  m-accordion--toggle-arrow"
                        id="" role="tablist">
                        <!--begin::Item-->
                        <div id="danh_sach_khoi_lop">
                            
                            <div class="m-accordion__item ">
                                <div class="m-accordion__item-head collapsed" role="tab"
                                    id="tab_item_1_head" data-toggle="collapse"
                                    href="#tab_item_1_body" aria-expanded="false">
                                    <span class="m-accordion__item-mode "></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="m-accordion__item-title">
                                        tuổi)</span>
                                </div>
                                <div class="m-accordion__item-body collapse" id="tab_item_1_body"
                                    role="tabpanel" aria-labelledby="tab_item_1_head">
                                    <div class="">
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--left"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">
                                                            
                                                            <li class="m-nav__item pl-4 lop_hoc"
                                                                onclick="addColor(this)"
                                                                style="cursor: pointer">
                                                                <span href="" class="m-nav__link">
                                                                    <span
                                                                        onclick="showDiemDanhCuaLop(, 0)"
                                                                        class="m-nav__link-text ">
                                                                        <span class="ten_lop"> 
                                                                        </span>
                                                                        <span
                                                                            class="sl_hs_cua_lop">()</span></span>
                                                                    <div class="dropdown">
                                                                        <i style="cursor: pointer;font-size: 25px;"
                                                                            class="la la-ellipsis-v"
                                                                            id="dropdownMenuButton"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false"></i>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">
                                                                        </div>
                                                                    </div>
                                                                </span>
                                                            </li>
                                                            

                                                        </ul>
                                                        <!--end::Nav-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!--end::Section-->
                    {{-- </div> --}}
                </div>
            </div>
            <div class="col-md-9 ">
                <div class="m-portlet m-portlet--full-height">
                    
                    {{-- <div class="m-portlet__body"> --}}
                    <!--begin::Section-->
                    
                    <!--end::Section-->
                    {{-- </div> --}}
                </div>
            </div>
            
            
        </div>
        <div class="m-portlet__body row">
            <div class="d-flex flex-row-reverse bd-highlight col align-self-end">
                <div class="p-2 bd-highlight"><a href="">Xuất Excel</a></div>
                <div class="p-2 bd-highlight"><a href="">Nhập Excel</a></div>
                <div class="p-2 bd-highlight"><a href="">Tải Biểu Mẫu</a></div>
              </div>
            <table class="table table-bordered m-table m-table--border-grey m-table--head-bg-success mt-2">
                <thead>
                    <tr >
                        <th style=" font-weight:bold; text-align:center">Tên hoạt động</th>
                        <th style=" font-weight:bold; text-align:center">Thứ 2</th>
                        <th style=" font-weight:bold; text-align:center">Thứ 3</th>
                        <th style=" font-weight:bold; text-align:center">Thứ 4</th>
                        <th style=" font-weight:bold; text-align:center">Thứ 5</th>
                        <th style=" font-weight:bold; text-align:center">Thứ 6</th>
                        <th style=" font-weight:bold; text-align:center">Thứ 7</th>
                        <th style=" font-weight:bold; text-align:center">Chủ nhật</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"  style="width:120px;background:#5dc0a4;color: #fff; font-weight:bold">Đón trẻ & ăn sáng</th>
                        <td style="width:150px">Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td style="width:150px">Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td style="width:150px">Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td style="width:150px">Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td style="width:150px">Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td style="width:150px">Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td style="width:150px">Xếp hàng nhảy theo điệu nhạc chất</td>

                    </tr>
                    <tr>
                        <th scope="row" style="width:120px;background:#5dc0a4;color: #fff; font-weight:bold">Hoạt động góc </th>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width:120px;background:#5dc0a4;color: #fff ; font-weight:bold">Hoạt động học</th>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width:120px;background:#5dc0a4;color: #fff; font-weight:bold ">Hoạt động học</th>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width:120px;background:#5dc0a4;color: #fff; font-weight:bold ">Hoạt động học</th>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width:120px;background:#5dc0a4;color: #fff; font-weight:bold" >Hoạt động học</th>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Cô đón trẻ, trò chuyện với các bé và cho ăn sáng </td>
                        <td>Các bé chơi cùng với các đồ chơi trong lớp</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                        <td>Xếp hàng nhảy theo điệu nhạc chất</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const addColor = (e) => {
        var list_element_lop = document.querySelectorAll('.lop_hoc')
        list_element_lop.forEach(element => {
            $(element).css('background', 'transparent')
        });
        $(e).css('background', '#bafac8')
    }
</script>
{{-- Show diem danh den theo lop --}}

{{-- EndShow diem danh den theo lop --}}
@endsection