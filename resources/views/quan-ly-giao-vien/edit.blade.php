@extends('layouts.main')
@section('title', "Chi tiết giáo viên")
@section('style')
<link href="{!!  asset('css_loading/css_loading.css') !!}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-content">
    <form method="post" action="{{route('quan-ly-giao-vien-update', ['id' => $data->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Chi tiết giáo viên: {{$data->ten}}
                            </h3>
                        </div>
                    </div>
                </div>
                <div id="preload" class="preload-container text-center" style="display: none">
                    <img id="gif-load" src="{!! asset('images/loading2.gif') !!}" alt="">
                </div>
                
                <div class="m-portlet__body">
                    <div class="m-section">
                        <div class="m-section__content">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Khối</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2" name="khoi" id="khoi">
                                                <option value="" selected>Chọn</option>
                                                @foreach ($khoi as $item)
                                                <option @if (isset($data->khoi_id))
                                                    {{($item->id == $data->khoi_id  ) ? 'selected' : ''}}
                                                @endif 
                                                 value={{$item->id}}>{{$item->ten_khoi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-lg-2 col-form-label">Lớp</label>
                                        <div class="col-lg-8">
                                            <select class="form-control select2" name="lop_id" id="lop">
                                                <option value="" selected>Chọn</option>
                                                @foreach ($lop as $item)
                                               
                                                <option {{($item->id == $data->lop_id  ) ? 'selected' : ''}}
                                                value="{{$item->id}}">{{$item->ten_lop}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">
                    <div class="m-wizard__form">

                        <div class="m-form m-form--label-align-left- m-form--state-" id="m_form"
                            >


                            <div class="m-portlet__body">


                                <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="m-form__heading">
                                                <h3 class="m-form__heading-title">
                                                    Thông tin
                                                    <i data-toggle="m-tooltip" data-width="auto"
                                                        class="m-form__heading-help-icon flaticon-info" title=""
                                                        data-original-title="Some help text goes here"></i>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span> Họ và tên: </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="ten" class="form-control m-input"
                                                        placeholder="Điền họ và tên" value="{{$data->ten}}">
                                                        @error('ten')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Ngày sinh:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="date" name="ngay_sinh" class="form-control m-input"
                                                        placeholder="Điền ngày sinh" value="{{$data->ngay_sinh}}">
                                                        @error('ngay_sinh')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Giới tính</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="m-radio-inline">
                                                            <label class="m-radio">
                                                                <input type="radio" {{($data->gioi_tinh == 1  ) ? 'checked' : ''}} name="gioi_tinh" value="1"> Nam
                                                                <span></span>
                                                            </label>
                                                            <label class="m-radio">
                                                                <input type="radio" {{($data->gioi_tinh == 2  ) ? 'checked' : ''}} name="gioi_tinh" value="2"> Nữ
                                                                <span></span>
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Dân tộc</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="dan_toc" class="form-control m-input"
                                                        placeholder="Điền dân tộc" value="{{$data->dan_toc}}">
                                                        @error('dan_toc')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span> Số điện thoại:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                    class="input-group-text"><i
                                                                        class="la la-phone"></i></span></div>
                                                            <input type="text" name="dien_thoai"
                                                                class="form-control m-input"
                                                                placeholder="Điền số điện thoại" value="{{$data->dien_thoai}}">
                                                        </div>
                                                        @error('dien_thoai')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class=""></div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="m-form__section m-form__section--first">


                                                <div class="form-group m-form__group row">
                                                    <img onClick="showModal()"
                                                        src= {{($data->anh == "") ? 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png' :  Storage::url($data->anh) }}
                                                        class="rounded mx-auto d-block mb-2" width="250px"
                                                        height="255px" id="show_img">
                                                    <div class="col-xl-9 col-lg-9 mt-4">
                                                        <div class="input-group ml-5 ">

                                                            <div class="custom-file ml-5 col-12">
                                                                <input type="file" accept="images/*" name="anh"
                                                                id="anh_gv" onClick="showModal()"onchange="showimages(this)"
                                                                    style="display:none" />
                                                                {{-- <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"> --}}

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class=""></div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="m-form__heading">
                                                <h3 class="m-form__heading-title">
                                                    Hộ khẩu thường trú
                                                    <i data-toggle="m-tooltip" data-width="auto"
                                                        class="m-form__heading-help-icon flaticon-info" title=""
                                                        data-original-title="Some help text goes here"></i>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Tỉnh/Thành phố</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="ho_khau_thuong_tru_matp" id="ho_khau_thuong_tru_matp">
                                                            <option value="">Chọn</option>
                                                            @foreach ($thanhpho as $item)
                                                            <option {{($data->ho_khau_thuong_tru_matp == $item->matp) ? "selected" : ""}}
                                                             value="{{$item->matp}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('ho_khau_thuong_tru_matp')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Quận/Huyện</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="ho_khau_thuong_tru_maqh" id="ho_khau_thuong_tru_maqh">
                                                            <option value="">Chọn</option>
                                                            @foreach ($maqh_gv_hktt as $item)
                                                            <option {{($data->ho_khau_thuong_tru_maqh == $item->maqh) ? "selected" : ""}}
                                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('ho_khau_thuong_tru_maqh')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">

                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Phường/Xã/Thị trấn:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="ho_khau_thuong_tru_xaid" id="ho_khau_thuong_tru_xaid">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($xaid_gv_hktt as $item)
                                                            <option {{($data->ho_khau_thuong_tru_xaid == $item->xaid) ? "selected" : ""}}
                                                            value="{{$item->xaid}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('ho_khau_thuong_tru_xaid')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Số nhà, đường </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="ho_khau_thuong_tru_so_nha" class="form-control m-input"
                                                        placeholder="Điền số nhà, đường" value="{{$data->ho_khau_thuong_tru_so_nha}}">
                                                        @error('ho_khau_thuong_tru_so_nha')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="m-form__heading">
                                                <h3 class="m-form__heading-title">
                                                    Nơi ở hiện tại
                                                    <i data-toggle="m-tooltip" data-width="auto"
                                                        class="m-form__heading-help-icon flaticon-info" title=""
                                                        data-original-title="Some help text goes here"></i>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Tỉnh/Thành phố</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2" name="noi_o_hien_tai_matp"
                                                            id="noi_o_hien_tai_matp">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($thanhpho as $item)
                                                            <option {{($data->noi_o_hien_tai_matp == $item->matp) ? "selected" : ""}}
                                                                value="{{$item->matp}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('noi_o_hien_tai_matp')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Quận/Huyện</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="noi_o_hien_tai_maqh" id="noi_o_hien_tai_maqh">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($maqh_gv_noht as $item)
                                                            <option {{($data->noi_o_hien_tai_maqh == $item->maqh) ? "selected" : ""}}
                                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('noi_o_hien_tai_maqh')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">

                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Phường/Xã/Thị trấn:</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="noi_o_hien_tai_xaid" id="noi_o_hien_tai_xaid">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($xaid_gv_noht as $item)
                                                            <option {{($data->noi_o_hien_tai_xaid == $item->xaid) ? "selected" : ""}}
                                                            value="{{$item->xaid}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('noi_o_hien_tai_xaid')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Số nhà, đường </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="noi_o_hien_tai_so_nha" class="form-control m-input"
                                                            placeholder="Điền số nhà, đường" value="{{$data->noi_o_hien_tai_so_nha}}">
                                                        @error('noi_o_hien_tai_so_nha')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="m-form__heading">
                                                <h3 class="m-form__heading-title">
                                                    Trình độ
                                                    <i data-toggle="m-tooltip" data-width="auto"
                                                        class="m-form__heading-help-icon flaticon-info" title=""
                                                        data-original-title="Some help text goes here"></i>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Trình độ</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="trinh_do" class="form-control m-input"
                                                        placeholder="Điền trình độ" value="{{$data->trinh_do}}">
                                                        @error('trinh_do')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Chuyên môn</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="chuyen_mon" class="form-control m-input"
                                                        placeholder="Điền chuyên môn" value="{{$data->chuyen_mon}}">
                                                        @error('chuyen_mon')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="m-form__section m-form__section--first">
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Nơi đào tạo</label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="text" name="noi_dao_tao" class="form-control m-input"
                                                        placeholder="Điền nơi đào tạo" value="{{$data->noi_dao_tao}}">
                                                        @error('noi_dao_tao')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group m-form__group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                            class="text-danger">*</span>Năm tốt nghiệp </label>
                                                    <div class="col-xl-9 col-lg-9">
                                                        <input type="number" name="nam_tot_nghiep" class="form-control m-input"
                                                        placeholder="Điền năm tốt nghiệp" value="{{$data->nam_tot_nghiep}}">
                                                        @error('nam_tot_nghiep')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class=""></div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-md-12 d-flex justify-content-end">
                                    <div class="m-form__actions">
                                    <a href="{{route('quan-ly-giao-vien-index')}}"><button type="button" class="btn btn-info">Hủy</button></a>
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                    </div>
                                </div>



                            </div>


                            
                    </div>

                </div>
                </div>
                

            </div>
        </div>
        
    </div>
</form>
</div>

@endsection
@section('script')
<script>
function showimages(element) {
           		 var file = element.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#show_img').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }
$(document).ready(function() {
    $('.select2').select2();
});
var url_get_lop_theo_khoi = "{{route('quan-ly-giao-vien-get-lop-theo-khoi')}}";
var url_get_maqh_by_matp = "{{route('get_quan_huyen_theo_thanh_pho')}}";
var url_get_xaid_by_maqh = "{{route('get_xa_phuong_theo_thi_tran')}}";
</script>
<script src="{!! asset('js/get_quan_huyen_xa.js') !!}"></script>
@endsection