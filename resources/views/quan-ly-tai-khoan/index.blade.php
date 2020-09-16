@extends('layouts.main')
@section('title', "Quản tài khoản")
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
                                        <label class="col-lg-2 col-form-label">Loại</label>
                                        <div class="col-lg-8">
                                            <select class="form-control" name="loai_hinh" id="loai_hinh">
                                                <option value="0" selected>Quản trị viên</option>
                                                <option value="0" >Giáo viên</option>
                                                <option value="0" >Học sinh</option>


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
                                        <label class="col-lg-2 col-form-label">Email, Sđt, Username, ...</label>
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

    <div class="m-portlet">
        <div class="m-portlet__body table-responsive">
        <div class="col-sm-12 col-md-6"><div class="dataTables_length" id="m_table_2_length"><label>Show <select name="m_table_2_length" aria-controls="m_table_2" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div>
            <table class="table m-table m-table--head-bg-success">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Họ và Tên</th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Jhon</td>
                        <td>Stone</td>
                        <td>@jhon</td>
                        <td>phuc@gmail.com</td>
                        <td>
                        <div class="col-3">
																	<span class="m-switch m-switch--outline m-switch--icon m-switch--success">
																		<label>
																			<input type="checkbox" checked="checked" name="">
																			<span></span>
																		</label>
																	</span>
																</div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection