@extends('layouts.main')
@section('title', "Chi tiết đơn dặn thuốc")
@section('content')



<div class="m-content">
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="m-portlet" id="m_portlet">
                <div class="m-portlet" >
                    <div class="m-portlet__body m-portlet__body--no-padding" style="background-color: #f3f3e1">
                        <div class="m-invoice-2">
                            <div class="m-invoice__wrapper">
                                <div class="m-invoice__head">
                                    <div class="m-invoice__container m-invoice__container--centered">
                                        <div class="m-invoice__logo">
                                            <center><h1>CHI TIẾT ĐƠN DẶN THUỐC </h1></center>
                                        </div>
                                        <div class="m-divider">
                                            <span></span>
                                          
                                            <span></span>
                                        </div>
                                        <div class="m-invoice__items" style="border-top: none !important">
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Họ và Tên:</span>
                                                <span class="m-invoice__text">{{$data->HocSinh->ten}}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Học sinh lớp:</span>
                                                <span class="m-invoice__text">{{$data->Lop->ten_lop}}</span>
                                            </div>
                                           
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Dặn uống thuốc từ ngày:</span>
                                                <span class="m-invoice__text">{{$data->ngay_bat_dau}}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Đến hết ngày:</span>
                                                <span class="m-invoice__text">{{$data->ngay_ket_thuc}}</span>
                                            </div>
                                            
                                        </div>
                                        <div class="m-invoice__items" style="border-top: none !important">
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Tên Thuốc:</span>
                                                @foreach($data->ChiTietDonThuoc as $item)
                                                <span class="m-invoice__text">{{$item->ten_thuoc}}</span>
                                            </div>
                                           
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Liều lượng:</span>
                                                <span class="m-invoice__text">{{$item->lieu_luong}} {{$item->don_vi}}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Ghi chú:</span>
                                                <span class="m-invoice__text">{{$item->ghi_chu}}</span>
                                            </div>
                                            <div class="m-invoice__item">
                                                <span class="m-invoice__subtitle">Phản hồi giáo viên:</span>
                                                <span class="m-invoice__text">{{$item->phan_hoi_giao_vien}}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="m-invoice__body m-invoice__body--centered">
                                    <b>Nội dung đơn:</b>
                                    <hr>
                                    <p style="text-indent: 1.5rem">
                                        <em>{{$data->noi_dung}}</em>
                                    </p>
                                </div>
                                <div class="m-invoice__body m-invoice__body--centered">
                                    <b>Hình ảnh:</b>
                                    
                                    <p style="text-indent: 1.5rem">
                                       <img src="{{ $data->anh ? asset($data->anh) : 'https://costaseafood.com.vn/uploads/no-image.jpg' }}" alt="" width="80%"  style="padding-left: 150px;">
                                    </p>
                                </div>
                                <div class="m-invoice__footer" style="background-color: #f3f3e1">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
