@extends('layouts.main')
@section('title', 'Thêm mới học sinh')
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--full-height">

                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Thông tin học sinh đăng kí nhập học
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="#" data-toggle="m-tooltip"
                                        class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left"
                                        data-width="auto" title="" data-original-title="Get help with filling up this form">
                                        <i class="flaticon-info m--icon-font-size-lg3"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-wizard m-wizard--2 m-wizard--success m-wizard--step-first" id="m_wizard">
                        <div class="m-wizard__form">
                            <form class="m-form m-form--label-align-left- m-form--state-" id="m_form"
                                action="{{ route('submit-edit-hs-dang-ky-nhap-hoc') }}" method="POST" enctype="multipart/form-data">
                                <div class="m-portlet__body">
                                    @csrf
                                    <div class=" m-wizard__form-step--current" id="m_wizard_form_step_1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-5">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title">
                                                            Thông tin
                                                            <i data-toggle="m-tooltip" data-width="auto"
                                                                class="m-form__heading-help-icon flaticon-info" title=""
                                                                data-original-title="Some help text goes here"></i>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span> Họ và tên: </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="ten" class="form-control m-input"
                                                                placeholder="" value="{{$hs_dk->ten}}">
                                                        </div>

                                                        @error('ten')
                                                                  {{ $message }}
                                                        @enderror
													<!-- <p class="text-danger text-small error" id="ten_error"></p> -->

                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Ngày sinh:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="input-group date">
                                                                <input type="text" value="{{$hs_dk->ngay_sinh}}" readonly name="ngay_sinh"   id="m_datepicker_2" class="form-control m-input"
                                                                placeholder="" >
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar-check-o"></i>
                                                                    </span>
                                                                </div>
															</div>
                                               
                                                          
                                                        </div>
                                                        @error('ngay_sinh')
                                                                  {{ $message }}
                                                        @enderror
                                                        <!-- <p class="text-danger text-small error" id="ngay_sinh_error"></p> -->

                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Dân tộc</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="dan_toc" class="form-control m-input"
                                                                placeholder="" value="{{$hs_dk->dan_toc}}">
                                                        </div>

                                                        @error('dan_toc')
                                                                  {{ $message }}
                                                        @enderror
                                                    <!-- <p class="text-danger text-small error" id="dan_toc_error"></p> -->

                                                    </div>

                                                    <input type="text" hidden name="id_hs_dk" id="id_hs_dk" value="{{$hs_dk->id}}">


                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Đối tượng chính sách</label>
                                                        <div class="col-xl-9 col-lg-9">

                                                        <select class="form-control" name="doi_tuong_chinh_sach_id" id="doi_tuong_chinh_sach_id">
															<option value="" selected>Chọn</option>
															@foreach ($doi_tuong_chinh_sach as $item)
                                                            <option @if($item->id == $hs_dk->doi_tuong_chinh_sach_id) selected @endif
                                                                 value="{{ $item->id }}">{{ $item->ten_chinh_sach }}</option>
															@endforeach
														</select>
                                                        
                                                        
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Học sinh khuyết tật</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="m-radio-inline">
                                                                <label class="m-radio">
                                                                    <input type="radio"
                                                                    @if($hs_dk->hoc_sinh_khuyet_tat == '1') checked @endif
                                                                     name="hoc_sinh_khuyet_tat"
                                                                        value="1"> Có
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio">
                                                                    <input type="radio"
                                                                    @if($hs_dk->hoc_sinh_khuyet_tat == '0') checked @endif
                                                                      name="hoc_sinh_khuyet_tat"
                                                                      value="0">
                                                                    Khống
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

<!--                                                     
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Ngày vào trường</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="input-group date">
                                                                <input type="text" class="form-control m-input" readonly=""
                                                                    placeholder="Select date" id="m_datepicker_2">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-calendar-check-o"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                               

                                                </div>
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            </div>
                                            <div class="col-xl-6 ">

                                               <div class="form-group m-form__group row offset-1">
                                                    <img id="showimg"  src="{!! asset('storage'.$hs_dk  ->avatar) !!}"  width="290" />
                                               </div>

                                               <div class="form-group m-form__group row offset-1">
                                                    <label class="col-lg-2 col-form-label">Ảnh bé:</label>
                                                    <div class="col-md-5">

                                                        <div class="custom-file">
                                                            <input type="file" 
                                                                name="avatar" class="custom-file-input"
                                                                onchange="showimages(this)"
                                                                id="customFileGiayPhep">
                                                            <label class="custom-file-label"
                                                                for="customFileGiayPhep">Choose file</label>
                                                        </div>
                                                        <p class="text-danger text-small" id="avatar_error" class="error"></p>
                                                    </div>
												</div>

                                               <div class="form-group m-form__group row  offset-1">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Trạng thái</label>
                                                        <div class="col-xl-4 col-lg-10">
                                                            <select class="form-control" id="status" name="status">
                                                                <option @if($hs_dk->status == 2) selected @endif  value="2"  > Chưa xem</option>
                                                                <option  @if($hs_dk->status == 3) selected @endif value="3"  > Đang xem</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-2 m--align-right">
                                                            <button type="button" onclick="capNhapTrangThai()" class="btn btn-info">
                                                                <span>
                                                                    <span>Cập nhập</span>
                                                                </span>
                                                            </button>
                                                          </div> 
                                               </div>
 
                                            
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="form-group m-form__group row  offset-1">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Giới tính</label>
                                                        <div class="col-xl-3 col-lg-9">
                                                            <div class="m-radio-inline">
                                                                <label class="m-radio">
                                                                    <input type="radio"
                                                                    @if($hs_dk->gioi_tinh == '1') checked @endif
                                                                     name="gioi_tinh" value="1"> Nam
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio">
                                                                    <input type="radio"
                                                                    @if($hs_dk->gioi_tinh == '2') checked @endif
                                                                    name="gioi_tinh" value="2">
                                                                    Nữ
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                </div>
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Hộ khẩu thường chú
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
                                                        <select class="form-control" name="ho_khau_thuong_tru_matp" id="ho_khau_thuong_tru_matp">
															<option value="" selected>Chọn</option>
															@foreach ($tp as $item)
                                                            <option @if($item->matp == $hs_dk->ho_khau_thuong_tru_matp) selected @endif
                                                                 value="{{ $item->matp }}">{{ $item->name }}</option>
															@endforeach
														</select>
                                                        </div>

                                                        @error('ho_khau_thuong_tru_matp')
                                                                  {{ $message }}
                                                        @enderror
														<!-- <p class="text-danger text-small error" id="ho_khau_thuong_tru_matp_error"></p> -->

                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Quận/Huyện</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control" name="ho_khau_thuong_tru_maqh" id="ho_khau_thuong_tru_maqh">
															<option value="{{$ho_khau_qh->maqh}}" selected>{{$ho_khau_qh->name}}</option>
                                                        </select>
                                                        
                                                        </div>

                                                        @error('ho_khau_thuong_tru_maqh')
                                                                  {{ $message }}
                                                        @enderror
													<!-- <p class="text-danger text-small error" id="ho_khau_thuong_tru_maqh_error"></p> -->

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Phường/Xã/Thị trấn:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <select class="form-control" name="ho_khau_thuong_tru_xaid" id="ho_khau_thuong_tru_xaid">
                                                                        <option value="{{$ho_khau_xaid->xaid}}" selected>{{$ho_khau_xaid->name}}</option>
                                                            </select>
                                                        </div>

                                                        @error('ho_khau_thuong_tru_xaid')
                                                                  {{ $message }}
                                                        @enderror
													<!-- <p class="text-danger text-small error" id="ho_khau_thuong_tru_xaid_error"></p> -->

                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Số nhà, đường </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text"
                                                            value="{{$hs_dk->ho_khau_thuong_tru_so_nha}}" name="ho_khau_thuong_tru_so_nha"
                                                                class="form-control m-input" placeholder="" value="">


                                                                @error('ho_khau_thuong_tru_so_nha')
                                                                  {{ $message }}
                                                                 @enderror
													<!-- <p class="text-danger text-small error" id="ho_khau_thuong_tru_so_nha_error"></p> -->


                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
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
                                                         <select class="form-control" name="noi_o_hien_tai_matp" id="noi_o_hien_tai_matp">
															<option value="" selected>Chọn</option>
															@foreach ($tp as $item)
                                                            <option @if($item->matp == $hs_dk->noi_o_hien_tai_matp) selected @endif
                                                                 value="{{ $item->matp }}">{{ $item->name }}</option>
															@endforeach
														</select>

                                                        @error('noi_o_hien_tai_matp')
                                                                  {{ $message }}
                                                          @enderror
													<!-- <p class="text-danger text-small error" id="noi_o_hien_tai_matp_error"></p> -->

                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Quận/Huyện</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                             <select class="form-control" name="noi_o_hien_tai_maqh" id="noi_o_hien_tai_maqh">
                                                                        <option value="{{$noi_o_qh->maqh}}" selected>{{$noi_o_qh->name}}</option>
                                                            </select>

                                                            @error('noi_o_hien_tai_maqh')
                                                                   {{ $message }}
                                                          @enderror


													<!-- <p class="text-danger text-small error" id="noi_o_hien_tai_maqh_error"></p> -->

                                                        </div>
                                                     <div class="m-separator m-separator--dashed m-separator--lg"></div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Phường/Xã/Thị trấn:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <select class="form-control" name="noi_o_hien_tai_xaid" id="noi_o_hien_tai_xaid">
                                                                        <option value="{{$noi_o_xaid->xaid}}" selected>{{$noi_o_xaid->name}}</option>
                                                            </select>


                                                            @error('noi_o_hien_tai_xaid')
                                                                   {{ $message }}
                                                              @enderror


													<!-- <p class="text-danger text-small error" id="noi_o_hien_tai_xaid_error"></p> -->

                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Số nhà, đường </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text"
                                                            value="{{$hs_dk->noi_o_hien_tai_so_nha}}" name="noi_o_hien_tai_so_nha"
                                                                class="form-control m-input" placeholder="" value="">


                                                                @error('noi_o_hien_tai_so_nha')
                                                                   {{ $message }}
                                                                @enderror

                                                                <!-- <p class="text-danger text-small error" id="noi_o_hien_tai_so_nha_error"></p> -->

                                                        </div>
                                                    </div>

                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Thông tin cha:
                                                        <i data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info" title=""
                                                            data-original-title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                            </div>

												<div class="col-lg-4">
													<label>Họ tên (Cha) : </label>
													<div class="input-group m-input-group m-input-group--square">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
														<input type="text" name="ten_cha" 
                                                        value="{{$hs_dk->ten_cha}}"
                                                        class="form-control m-input" placeholder="">


                                                        @error('ten_cha')
                                                                   {{ $message }}
                                                         @enderror

													<!-- <p class="text-danger text-small error" id="ten_cha_error"></p> -->
                                                    
														   
													</div>
                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>

												</div>

												<div class="col-lg-4">
													<label class="">Số điện thoại (Cha) : </label>
													<input type="number" class="form-control m-input"  name="dien_thoai_cha" 
                                                    value="{{$hs_dk->dien_thoai_cha}}"
                                                    placeholder="SĐT cha">
												
                                                    @error('dien_thoai_cha')
                                                                   {{ $message }}
                                                         @enderror

													<!-- <p class="text-danger text-small error" id="dien_thoai_cha_error"></p> -->
													   
                                                     <div class="m-separator m-separator--dashed m-separator--lg"></div>

													<!-- <span class="m-form__help">Please enter your email</span> -->
												</div>
												<div class="col-lg-4">
													<label>Số chứng minh nhân dân (Cha) : </label>
													<input type="number" class="form-control m-input" name="cmtnd_cha"
                                                    value="{{$hs_dk->cmtnd_cha}}"
                                                     placeholder="Số chứng minh cha">
													   
                                                    @error('cmtnd_cha')
                                                                   {{ $message }}
                                                         @enderror
                                                         <!-- <p class="text-danger text-small error" id="cmtnd_cha_error"></p> -->

                                                     <div class="m-separator m-separator--dashed m-separator--lg"></div>

													<!-- <span class="m-form__help">Please enter your username</span> -->
												</div>

                                         
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Thông tin mẹ:
                                                        <i data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info" title=""
                                                            data-original-title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
													<label>Họ tên (Mẹ) : </label>
													<div class="input-group m-input-group m-input-group--square">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
														<input type="text" name="ten_me" 
                                                         value="{{$hs_dk->ten_me}}"
                                                        class="form-control m-input" placeholder="">
													</div>

                                                    @error('ten_me')
                                                                   {{ $message }}
                                                         @enderror
													<!-- <p class="text-danger text-small error" id="ten_me_error"></p> -->

                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>

												</div>
												<div class="col-lg-4">
													<label class="">Số điện thoại (Mẹ) : </label>
													<input type="number" class="form-control m-input"
                                                    name="dien_thoai_me" 
                                                    value="{{$hs_dk->dien_thoai_me}}"
                                                    placeholder="SĐT mẹ">


                                                    @error('dien_thoai_me')
                                                                   {{ $message }}
                                                         @enderror
													<!-- <p class="text-danger text-small error" id="dien_thoai_me_error"></p> -->

                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>

													<!-- <span class="m-form__help">Please enter your email</span> -->
												</div>
												<div class="col-lg-4">
													<label>Số chứng minh nhân dân (Mẹ) : </label>
													<input type="number" class="form-control m-input" name="cmtnd_me" 
                                                    value="{{$hs_dk->cmtnd_me}}"
                                                    placeholder="Số chứng minh mẹ">
														   

                                                    @error('cmtnd_me')
                                                                   {{ $message }}
                                                    @enderror
													<!-- <p class="text-danger text-small error" id="cmtnd_me_error"></p> -->

													<!-- <span class="m-form__help">Please enter your username</span> -->
                                                     <div class="m-separator m-separator--dashed m-separator--lg"></div>

												</div>
                                                
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="m-form__heading">
                                                    <h3 class="m-form__heading-title">
                                                        Thông tin liên lạc:
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
                                                                class="text-danger">*</span> Số điện thoại đăng ký: </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="dien_thoai_dang_ki" 
                                                            class="form-control m-input"
                                                              value="{{$hs_dk->dien_thoai_dang_ki}}"
                                                               placeholder="">

                                                               @error('dien_thoai_dang_ki')
                                                                   {{ $message }}
                                                             @enderror
													<!-- <p class="text-danger text-small error" id="dien_thoai_dang_ki_error"></p> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="email_dang_ky" class="form-control m-input"
                                                              value="{{$hs_dk->email_dang_ky}}"
                                                                placeholder="" >


                                                                @error('email_dang_ky')
                                                                   {{ $message }}
                                                                @enderror
													<!-- <p class="text-danger text-small error" id="email_dang_ky_error"></p> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-lg-10"></div>
                                          
                                            <div class="col-lg-2 m--align-right">
                                                <button type="submit" class="btn btn-success">
                                                    <span>
                                                        <i class="la la-check"></i>&nbsp;&nbsp;
                                                        <span>Phê Duyệt</span>
                                                    </span>
                                                </button>
                                            
                                            </div>
                                            
                                            <div class="col-lg-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

@endsection
@section('script')
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="{!!  asset('assets/demo/custom/crud/forms/widgets/bootstrap-datepicker.js') !!}"></script>
    <script>
     var url_quan_huyen_theo_thanh_pho= "{{route('get_quan_huyen_theo_thanh_pho')}}";
	 var url_phuong_xa_theo_quan_huyen= "{{route('get_xa_phuong_theo_thi_tran')}}";
	 var url_submit_edit= "{{route('submit-edit-hs-dang-ky-nhap-hoc')}}";

     function showimages(element) {
           		 var file = element.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#showimg').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
     }

     let capNhapTrangThai = () => {
			axios.post(url_submit_edit, {
                status : $('#status').val(),
                id_hs_dk : $('#id_hs_dk').val()
             }
            )
			.then(function (response) {
				console.log(response.data);
                alert('Cap nhạp thanh cong')
			})
			.catch(function (error) {
				console.log(error);
			})
		}

     let submitDuyet = () => {
			let myForm = document.getElementById('m_form');
			var formData = new FormData(myForm)
			axios.post(url_submit_edit ,formData)
			.then(function (response) {
				console.log(response.data);
                alert('Cap nhạp thanh cong')
			})
			.catch(function (error) {
				$('.error').text(' ')
				 for (const key in error.response.data.errors) {
                            $('#'+key+'_error').html(error.response.data.errors[key]);
                   }
			})
		}


      $("#ho_khau_thuong_tru_matp").change(function() {
				axios.post(url_quan_huyen_theo_thanh_pho, {
							matp:  $("#ho_khau_thuong_tru_matp").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.maqh}" >${element.name}</option>`
					});

					$('#ho_khau_thuong_tru_maqh').html(htmldata);
					$('#ho_khau_thuong_tru_xaid').html('');
				})
				.catch(function (error) {
					console.log(error);
				});
			});


			$("#ho_khau_thuong_tru_maqh").change(function() {
				axios.post(url_phuong_xa_theo_quan_huyen, {
					maqh:  $("#ho_khau_thuong_tru_maqh").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.xaid}" >${element.name}</option>`
					});

					$('#ho_khau_thuong_tru_xaid').html(htmldata);
				})
				.catch(function (error) {
					console.log(error);
				});
			});



			$("#noi_o_hien_tai_matp").change(function() {
				axios.post(url_quan_huyen_theo_thanh_pho, {
							matp:  $("#noi_o_hien_tai_matp").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.maqh}" >${element.name}</option>`
					});

					$('#noi_o_hien_tai_maqh').html(htmldata);
					$('#noi_o_hien_tai_xaid').html('');
				})
				.catch(function (error) {
					console.log(error);
				});
			});


			$("#noi_o_hien_tai_maqh").change(function() {
				axios.post(url_phuong_xa_theo_quan_huyen, {
					maqh:  $("#noi_o_hien_tai_maqh").val(),
				})
				.then(function (response) {
					var htmldata = '<option value="" selected  >Chọn</option>'
						response.data.forEach(element => {
						htmldata+=`<option value="${element.xaid}" >${element.name}</option>`
					});

					$('#noi_o_hien_tai_xaid').html(htmldata);
				})
				.catch(function (error) {
					console.log(error);
				});
			});

            </script>
@endsection
