@extends('layouts.main')
@section('title', 'Quản lý lớp')
@section('style')
    <style>
        .m-table th,
        td {
            text-align: center;
        }

        .m-table ul li {
            list-style: none;
        }

        .js-example-basic-single {
            padding-right: 20px;
        }

        .select2-selection__arrow {
            margin-left: 30px;
        }

    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
@endsection
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
                                            <label for="" class="col-lg-2 col-form-label">Tên lớp</label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="co_so_id" id="co_so_id">
                                                    <option value="">Chọn lớp</option>
                                                </select>
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

            <div class="col-lg-6">
            </div>
            <div class="col-lg-6 " style="text-align: right">
                <button type="button" data-toggle="modal" data-target="#m_select2_modal" class="btn btn-info .bg-info">Thêm
                    mới</button>
            </div>

            <div class="modal fade" id="m_select2_modal" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="">Thêm lớp</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="la la-remove"></span>
                            </button>
                        </div>
                        <form class="m-form m-form--fit m-form--label-align-right">
                            <div class="modal-body">
                                <div class="form-group m-form__group row m--margin-top-20">
                                    <label class="col-form-label col-lg-3 col-sm-12">Tên lớp</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <input type="text" class="form-control m-input m-input--square"
                                            id="exampleInputPassword1" placeholder="Nhập tên lớp">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">Khối</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select style="width: 100%" class="form-control m-select2" id="m_select2_2_modal" name="param">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row m--margin-bottom-20">
                                    <label class="col-form-label col-lg-3 col-sm-12">Giáo viên chủ nhiệm</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select style="width: 100%" class="form-control m-select2" id="m_select2_4_modal" name="param">
    
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">Giáo viên phụ</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select style="width: 100%" class="form-control m-select2" id="m_select2_3_modal" name="param"
                                            multiple="multiple">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK" selected>Alaska</option>
                                                <option value="HI">Hawaii</option>
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-brand m-btn" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-secondary m-btn">Thêm mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="cap-nhat-lop" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Cập nhật</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="la la-remove"></span>
                        </button>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="modal-body">
                            <div class="form-group m-form__group row m--margin-top-20">
                                <label class="col-form-label col-lg-3 col-sm-12">Tên lớp</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control m-input m-input--square"
                                        id="exampleInputPassword1" placeholder="Nhập tên lớp">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Khối</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <select style="width: 100%" class="form-control m-select2" id="select1-lop" name="param">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row m--margin-bottom-20">
                                <label class="col-form-label col-lg-3 col-sm-12">Giáo viên chủ nhiệm</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <select style="width: 100%" class="form-control m-select2" id="select2-lop" name="param">
                                      
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Giáo viên phụ</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <select style="width: 100%" class="form-control m-select2" id="select3-lop" name="param"
                                        multiple="multiple">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK" selected>Alaska</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-brand m-btn" data-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-secondary m-btn">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body table-responsive">
                <table class="table m-table m-table--head-bg-success">
                    <div class="col-12 form-group m-form__group d-flex justify-content-end">
                        <label class="col-lg-2 col-form-label">Kích thước:</label>
                        <div class="col-lg-2">
                            <select class="form-control" id="page-size">
                                <option value="10"> 10</option>
                                <option value="20"> 20</option>
                                <option value="50"> 50</option>
                            </select>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th> Stt</th>
                            <th> Tên lớp</th>
                            <th> Sĩ số</th>
                            <th> Giáo viên chủ nhiệm</th>
                            <th> Giáo viên phụ</th>
                            <th> Khối</th>
                            <th colspan="2">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td>Trần Thu Trang</td>
                            <td>
                                <ul>
                                    <li>Trần Thị Thu</li>
                                    <li>Lê Thị Trang</li>
                                    <li>Lê Thị Trang</li>
                                </ul>
                            </td>
                            <td>3</td>
                            <td><button data-toggle="modal" data-target="#cap-nhat-lop" class="btn btn-primary mr-3">Cập
                                    nhật</button><a class="btn btn-success"
                                    href="{{ route('quan-ly-lop-show', ['id' => 1]) }}">Chi tiết</a></td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td>Trần Thu Trang</td>
                            <td>
                                <ul>
                                    <li>Trần Thị Thu</li>
                                    <li>Lê Thị Trang</li>
                                    <li>Lê Thị Trang</li>
                                </ul>
                            </td>
                            <td>3</td>
                            <td><a href="" class="btn btn-primary mr-3">Cập
                                    nhật</a><a class="btn btn-success"
                                    href="{{ route('quan-ly-lop-show', ['id' => 1]) }}">Chi tiết</a></td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td>Trần Thu Trang</td>
                            <td>
                                <ul>
                                    <li>Trần Thị Thu</li>
                                    <li>Lê Thị Trang</li>
                                    <li>Lê Thị Trang</li>
                                </ul>
                            </td>
                            <td>3</td>
                            <td><a href="" class="btn btn-primary mr-3">Cập
                                    nhật</a><a class="btn btn-success"
                                    href="{{ route('quan-ly-lop-show', ['id' => 1]) }}">Chi tiết</a></td>


                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Hoa Hướng Dương</td>
                            <td>40</td>
                            <td>Trần Thu Trang</td>
                            <td>
                                <ul>
                                    <li>Trần Thị Thu</li>
                                    <li>Lê Thị Trang</li>
                                    <li>Lê Thị Trang</li>
                                </ul>
                            </td>
                            <td>3</td>
                            <td><a href="" class="btn btn-primary mr-3">Cập
                                    nhật</a><a class="btn btn-success"
                                    href="{{ route('quan-ly-lop-show', ['id' => 1]) }}">Chi tiết</a></td>


                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script
        src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $('#m_select2_2_modal').select2();
        $('#m_select2_3_modal').select2();
        $('#m_select2_4_modal').select2();

         $('#select1-lop').select2();
         $('#select2-lop').select2();
         $('#select3-lop').select2();



    </script>
@endsection
