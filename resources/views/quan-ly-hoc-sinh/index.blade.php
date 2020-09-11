@extends('layouts.main')
@section('title', "Quản lý học sinh")
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
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
                                            <select class="form-control" name="loai_hinh" id="loai_hinh">
                                                <option value="0" selected>Chọn khối</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-lg-2 col-form-label">Lớp</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="co_so_id" id="co_so_id">
                                                <option value="">Chọn lớp</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Tên học sinh</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control m-input m-input--square" id="exampleInputPassword1" placeholder="Tên học sinh">
                                        </div>
                                    </div>
                                </div>
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
            <a href="javascript:" data-toggle="modal" id="upImport-file" data-target="#moDalImport"><i class="fa fa-upload" aria-hidden="true"></i>
                Tải lên file Excel</a>
        </div>
        <div class="col-lg-2">
            <a href="javascript:" data-toggle="modal" data-target="#moDalExportData"><i class="fa fa-file-excel" aria-hidden="true"></i>
                Xuất dữ liệu ra Excel</a>
        </div>
        <div class="col-lg-6 " style="text-align: right">
            <a href="{{route('quan-ly-hoc-sinh-create')}}"><button type="button" class="btn btn-info .bg-info">Thêm mới</button></a>
        </div>

    </section>
    <div class="m-portlet">
        <div class="m-portlet__body table-responsive">
            <table class="table m-table m-table--head-bg-success">
            <div class="col-12 form-group m-form__group d-flex justify-content-end">
                    <label class="col-lg-2 col-form-label">Kích thước:</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="page-size">          
                            <option  value="10"> 10</option>
                            <option  value="20"> 20</option>
                            <option  value="50"> 50</option>
                        </select>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Họ tên</th>
                        <th>Ảnh</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Khối</th>
                        <th>Lớp</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Trần Thu Trang</td>
                        <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                        <td>6/6/2007</td>
                        <td>Nữ</td>
                        <td>3</td>
                        <td>3A</td>
                        <td><a href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Cập nhật</a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Trần Thu Trang</td>
                        <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                        <td>6/6/2007</td>
                        <td>Nữ</td>
                        <td>3</td>
                        <td>3A</td>
                        <td><a href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Cập nhật</a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Trần Thu Trang</td>
                        <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                        <td>6/6/2007</td>
                        <td>Nữ</td>
                        <td>3</td>
                        <td>3A</td>
                        <td><a href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Cập nhật</a></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Trần Thu Trang</td>
                        <td><img width="100px" src="https://znews-photo.zadn.vn/w660/Uploaded/neg_iflemly/2017_12_28/3_2_1.jpg" alt=""></td>
                        <td>6/6/2007</td>
                        <td>Nữ</td>
                        <td>3</td>
                        <td>3A</td>
                        <td><a href="{{route('quan-ly-hoc-sinh-edit',['id'=>1])}}">Cập nhật</a></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection