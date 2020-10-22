@extends('layouts.main')
@section('title', 'Chi tiết học sinh')
@section('content')
    <div class="m-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--full-height">

                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Chi tiết học sinh : {{$data->ten}}
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
                            action="{{route('quan-ly-hoc-sinh-update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
                                <div class="m-portlet__body">
                                    @csrf
                                    <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
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
                                                                class="text-danger">*</span> Mã học sinh </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text"  name="ma_hoc_sinh" class="form-control m-input"
                                                            placeholder="" value="{{$data->ma_hoc_sinh}}" disabled>
                                                        </div>

                                                        @error('ten')
                                                                  {{ $message }}
                                                        @enderror
													<!-- <p class="text-danger text-small error" id="ten_error"></p> -->

                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span> Họ và tên </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="ten" class="form-control m-input"
                                                            placeholder="Điên họ và tên" value="{{$data->ten}}">
                                                        </div>

                                                        @error('ten')
                                                                  {{ $message }}
                                                        @enderror
													<!-- <p class="text-danger text-small error" id="ten_error"></p> -->

                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Tên hay gọi </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="ten_thuong_goi" class="form-control m-input"
                                                        placeholder="Điền tên hay gọi (nếu có)" value="{{$data->ten_thuong_goi}}">
                                                        </div>

                                                        @error('ten')
                                                                  {{ $message }}
                                                        @enderror
													<!-- <p class="text-danger text-small error" id="ten_error"></p> -->

                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span> Ngày sinh </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="date" name="ngay_sinh" class="form-control m-input"
                                                         value="{{$data->ngay_sinh}}">
                                                        </div>

                                                        @error('ngay_sinh')
                                                                  {{ $message }}
                                                        @enderror
													<!-- <p class="text-danger text-small error" id="ten_error"></p> -->

                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Dân tộc</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="dan_toc" class="form-control m-input"
                                                        placeholder="Điền dân tộc" value="{{$data->dan_toc}}">
                                                        </div>

                                                        @error('dan_toc')
                                                                  {{ $message }}
                                                        @enderror
                                                    <!-- <p class="text-danger text-small error" id="dan_toc_error"></p> -->

                                                    </div>

                                                   


                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger">*</span>Đối tượng chính sách</label>
                                                        <div class="col-xl-9 col-lg-9">

                                                        <select class="form-control select2" name="doi_tuong_chinh_sach_id" id="doi_tuong_chinh_sach_id">
                                                            <option value="">Chọn</option>
                                                            @foreach ($doi_tuong_chinh_sach as $item)
                                                            <option {{($item->id == $data->doi_tuong_chinh_sach_id)? "selected" : ""}}
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
                                                                    
                                                                     name="hoc_sinh_khuyet_tat"
                                                                        value="1" {{($data->hoc_sinh_khuyet_tat == 1) ? 'checked' : ''}}> Có
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio">
                                                                    <input type="radio"
                                                                   
                                                                      name="hoc_sinh_khuyet_tat"
                                                                      value="0" {{($data->hoc_sinh_khuyet_tat == 0) ? 'checked' : ''}}>
                                                                    Không
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            </div>
                                            <div class="col-xl-6 ">

                                               <div class="form-group m-form__group row offset-1">
                                                    <img id="showimg"  src= {{($data->avatar == "") ? 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png' :  Storage::url($data->avatar) }}  width="250px" height="250px" />
                                               </div>

                                               <div class="form-group m-form__group row offset-1">
                                                    <label class="col-lg-2 col-form-label">Ảnh</label>
                                                    <div class="col-md-5">

                                                        <div class="custom-file">
                                                            <input type="file" 
                                                                name="avatar" class="custom-file-input"
                                                                onchange="showimages(this)"
                                                                id="customFileGiayPhep">
                                                            <label class="custom-file-label"
                                                                for="customFileGiayPhep">Chọn ảnh</label>
                                                        </div>
                                                        <p class="text-danger text-small" id="avatar_error" class="error"></p>
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
                                                                   
                                                                     name="gioi_tinh" value="1" {{($data->gioi_tinh == 1) ? 'checked' : ''}}> Nam
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio">
                                                                    <input type="radio"
                                                                    
                                                                    name="gioi_tinh" value="2" {{($data->gioi_tinh == 2) ? 'checked' : ''}} >
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
                                                        <select class="form-control select2" name="ho_khau_thuong_tru_matp" id="ho_khau_thuong_tru_matp">
                                                            <option value="">Chọn</option>
                                                            @foreach ($thanhpho as $item)
                                                            <option {{($data->ho_khau_thuong_tru_matp == $item->matp) ? "selected" : ""}}
                                                             value="{{$item->matp}}">{{$item->name}}</option>
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
                                                        <select class="form-control select2" name="ho_khau_thuong_tru_maqh" id="ho_khau_thuong_tru_maqh">
															<option value="">Chọn</option>
                                                            @foreach ($maqh_hs_hktt as $item)
                                                            <option {{($data->ho_khau_thuong_tru_maqh == $item->maqh) ? "selected" : ""}}
                                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                                            @endforeach
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
                                                                class="text-danger">*</span>Phường/Xã/Thị trấn</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <select class="form-control select2" name="ho_khau_thuong_tru_xaid" id="ho_khau_thuong_tru_xaid">
                                                                <option value="">Chọn</option>
                                                                @foreach ($xaid_hs_hktt as $item)
                                                                <option {{($data->ho_khau_thuong_tru_xaid == $item->xaid) ? "selected" : ""}}
                                                                value="{{$item->xaid}}">{{$item->name}}</option>
                                                                @endforeach
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
                                                             name="ho_khau_thuong_tru_so_nha"
                                                                class="form-control m-input" placeholder="Điền số nhà, đường" value="{{$data->ho_khau_thuong_tru_so_nha}}">


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
                                                            <select class="form-control select2" name="noi_o_hien_tai_matp"
                                                            id="noi_o_hien_tai_matp">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($thanhpho as $item)
                                                            <option {{($data->noi_o_hien_tai_matp == $item->matp) ? "selected" : ""}}
                                                                value="{{$item->matp}}">{{$item->name}}</option>
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
                                                            <select class="form-control select2"
                                                            name="noi_o_hien_tai_maqh" id="noi_o_hien_tai_maqh">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($maqh_hs_noht as $item)
                                                            <option {{($data->noi_o_hien_tai_maqh == $item->maqh) ? "selected" : ""}}
                                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                                            @endforeach
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
                                                                class="text-danger">*</span>Phường/Xã/Thị trấn</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <select class="form-control select2"
                                                            name="noi_o_hien_tai_xaid" id="noi_o_hien_tai_xaid">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($xaid_hs_noht as $item)
                                                            <option {{($data->noi_o_hien_tai_xaid == $item->xaid) ? "selected" : ""}}
                                                            value="{{$item->xaid}}">{{$item->name}}</option>
                                                            @endforeach
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
                                                             name="noi_o_hien_tai_so_nha"
                                                                class="form-control m-input" placeholder="Điền số nhà, đường" value="{{$data->noi_o_hien_tai_so_nha}}">


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
                                                        Thông tin cha
                                                        <i data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info" title=""
                                                            data-original-title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                            </div>

												<div class="col-lg-4">
													<label>Họ tên (Cha)  </label>
													<div class="input-group m-input-group m-input-group--square">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
														<input type="text" name="ten_cha" 
                                                        value="{{$data->ten_cha}}"
                                                        class="form-control m-input" placeholder="Điền họ tên cha">


                                                        @error('ten_cha')
                                                                   {{ $message }}
                                                         @enderror

													<!-- <p class="text-danger text-small error" id="ten_cha_error"></p> -->
                                                    
														   
													</div>
                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>

												</div>

												<div class="col-lg-4">
													<label class="">Số điện thoại (Cha)  </label>
													<input type="text" class="form-control m-input"  name="dien_thoai_cha" 
                                                    value="{{$data->dien_thoai_cha}}"
                                                    placeholder="SĐT cha">
												
                                                    @error('dien_thoai_cha')
                                                                   {{ $message }}
                                                         @enderror

													<!-- <p class="text-danger text-small error" id="dien_thoai_cha_error"></p> -->
													   
                                                     <div class="m-separator m-separator--dashed m-separator--lg"></div>

													<!-- <span class="m-form__help">Please enter your email</span> -->
												</div>
												<div class="col-lg-4">
													<label>Số chứng minh nhân dân (Cha)  </label>
													<input type="text" class="form-control m-input" name="cmtnd_cha"
                                                    value="{{$data->cmtnd_cha}}"
                                                     placeholder="Số chứng minh nhân dân cha">
													   
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
                                                        Thông tin mẹ
                                                        <i data-toggle="m-tooltip" data-width="auto"
                                                            class="m-form__heading-help-icon flaticon-info" title=""
                                                            data-original-title="Some help text goes here"></i>
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
													<label>Họ tên (Mẹ)  </label>
													<div class="input-group m-input-group m-input-group--square">
														<div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
														<input type="text" name="ten_me" 
                                                        value="{{$data->ten_me}}"
                                                        class="form-control m-input" placeholder="Điền họ tên mẹ">
													</div>

                                                    @error('ten_me')
                                                                   {{ $message }}
                                                         @enderror
													<!-- <p class="text-danger text-small error" id="ten_me_error"></p> -->

                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>

												</div>
												<div class="col-lg-4">
													<label class="">Số điện thoại (Mẹ)  </label>
													<input type="text" class="form-control m-input"
                                                    name="dien_thoai_me" 
                                                    value="{{$data->dien_thoai_me}}"
                                                    placeholder="SĐT mẹ">


                                                    @error('dien_thoai_me')
                                                                   {{ $message }}
                                                         @enderror
													<!-- <p class="text-danger text-small error" id="dien_thoai_me_error"></p> -->

                                                    <div class="m-separator m-separator--dashed m-separator--lg"></div>

													<!-- <span class="m-form__help">Please enter your email</span> -->
												</div>
												<div class="col-lg-4">
													<label>Số chứng minh nhân dân (Mẹ)  </label>
													<input type="text" class="form-control m-input" name="cmtnd_me" 
                                                    value="{{$data->cmtnd_me}}"
                                                    placeholder="Số chứng minh thư nhân dân mẹ">
														   

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
                                                        Thông tin liên lạc
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
                                                                class="text-danger"></span> Số điện thoại đăng ký </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="dien_thoai_dang_ki" 
                                                            class="form-control m-input"
                                                            value="{{$data->dien_thoai_dang_ki}}"
                                                               placeholder="Điền số điện thoại đăng kí">

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
                                                            value="{{$data->email_dang_ky}}"
                                                                placeholder="Điền email" >
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
                                            <div class="col-lg-8"></div>
                                            <div class="col-lg-1">
                                                <a href="{{route('quan-ly-hoc-sinh-index',['id'=>125])}}"><div class="btn btn-danger">
                                                    <span>
                                                        <span>Hủy</span>
                                                    </span>
                                                </div></a>
                                            
                                            </div>
                                            <div class="col-lg-2 m--align-right">
                                                
                                                <button type="submit" class="btn btn-success">
                                                    <span>
                                                        
                                                        <span>Cập nhật</span>
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
    var url_get_lop_theo_khoi = "{{route('quan-ly-giao-vien-get-lop-theo-khoi')}}";
    var url_get_maqh_by_matp = "{{route('get_quan_huyen_theo_thanh_pho')}}";
    var url_get_xaid_by_maqh = "{{route('get_xa_phuong_theo_thi_tran')}}";
    function showimages(element) {
           		 var file = element.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#showimg').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
            }
    $(document).ready(function() {
        $('.select2').select2();
    });
    </script>
    <script src="{!! asset('js/get_quan_huyen_xa.js') !!}"></script>
@endsection
