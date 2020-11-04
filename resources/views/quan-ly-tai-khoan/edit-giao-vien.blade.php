@extends('layouts.main')
@section('title', "Thông tin cá nhân")
@section('content')
<div class="m-content">
						<div class="row">
							<div class="col-xl-12 col-lg-9">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
														Cập nhật hồ sơ
													</a>
												</li>
												<!-- <li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
														Messages
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
														Settings
													</a>
												</li> -->
											</ul>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-portlet__nav-item--last">
													<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
														<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
															<i class="la la-gear"></i>
														</a>
														<div class="m-dropdown__wrapper">
															<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
															<div class="m-dropdown__inner">
																<div class="m-dropdown__body">
																	<div class="m-dropdown__content">
																		<ul class="m-nav">
																			<li class="m-nav__section m-nav__section--first">
																				<span class="m-nav__section-text">Quick Actions</span>
																			</li>
																			<!-- <li class="m-nav__item">
																				<a href="{{route('doi-mat-khau', ['id' =>Auth::user()->id])}}" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-share"></i>
																					<span class="m-nav__link-text">Đổi Mật khẩu</span>
																				</a>
																			</li> -->
																			
																			
																			<li class="m-nav__section">
																				<span class="m-nav__section-text">Useful Links</span>
																			</li>
																			<li class="m-nav__item">
																				<a href="" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-info"></i>
																					<span class="m-nav__link-text">FAQ</span>
																				</a>
																			</li>
																			<li class="m-nav__item">
																				<a href="" class="m-nav__link">
																					<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																					<span class="m-nav__link-text">Trợ giúp</span>
																				</a>
																			</li>
																			<li class="m-nav__separator m-nav__separator--fit m--hide">
																			</li>
																			<li class="m-nav__item m--hide">
																				<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									
										

	<div class="tab-content">
	  <div class="tab-pane active" id="m_user_profile_tab_1">											
         <div class="col-md-12">
			<form class="m-form m-form--fit m-form--label-align-right" method="POST"
             action="{{route('update-giao-vien', ['id' =>$giao_vien->id])}}" enctype="multipart/form-data" >
								@csrf
					<div class="m-portlet__body">
						@auth
					<?php 
						$message = Session::get('message');
							if ($message) {
							echo '<div class="alert alert-success">'. $message .'</div>';
						Session::put('message', null);
												}
						?>
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
                                                                class="text-danger"></span> Mã Giáo viên: </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        @error('ma_gv')
															<small style="color:red">{{$message}}</small>
															@enderror
                                                            <input type="text" name="ma_gv" class="form-control m-input"
                                                                placeholder="" value="{{$giao_vien->ma_gv}}">
                                                        </div>
                                                    </div>
													<div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Họ và tên: </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        @error('ten')
															<small style="color:red">{{$message}}</small>
															@enderror
                                                            <input type="text" name="ten" class="form-control m-input"
                                                                placeholder="" value="{{$giao_vien->ten}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Ngày sinh:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        @error('ngay_sinh')
															<small style="color:red">{{$message}}</small>
															@enderror
                                                            <input type="date" name="ngay_sinh" class="form-control m-input"
                                                                placeholder="" value="{{$giao_vien->ngay_sinh}}">
                                                        </div>
                                                    </div>
													
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Điện thoại:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        @error('dien_thoai')
															<small style="color:red">{{$message}}</small>
															@enderror
                                                            <div class="input-group">
                                                           
                                                                <input type="text" name="dien_thoai"
                                                                    class="form-control m-input" placeholder="" value="{{$giao_vien->dien_thoai}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
												<div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Giới tính</label>
                                                        <div class="col-xl-3 col-lg-9">
                                                            <div class="m-radio-inline">
                                                            @if($giao_vien->gioi_tinh === 1)
                                                            
                                                            <label class="m-radio">
                                                                    <input type="radio"  name="gioi_tinh" value="1" checked> Nam
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio">
                                                                    <input type="radio"  name="gioi_tinh" value="0" >Nữ
                                                                    <span></span>
                                                                </label>
                                                            @else
                                                            <label class="m-radio">
                                                                    <input type="radio"  name="gioi_tinh" value="1" > Nam
                                                                    <span></span>
                                                                </label>
                                                                <label class="m-radio">
                                                                    <input type="radio"  name="gioi_tinh" value="0" checked >Nữ
                                                                    <span></span>
                                                                </label>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
											

													<div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Dân tộc</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        
                                                            <input type="text" name="dan_toc" class="form-control m-input"
                                                                placeholder="" value="{{$giao_vien->dan_toc}}">
                                                        </div>
                                                    </div>
                                                   
													<div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Email:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="input-group">
                                                            @error('email')
                                                            <small style="color:red">{{$message}}</small>
                                                               @enderror
                                                                <input type="text" name="email"
                                                                    class="form-control m-input" placeholder="" value="{{$giao_vien->email}}">
                                                            </div>
                                                        </div>
                                                    </div>
													<div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Trình độ:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="input-group">
                                                            @error('trinh_do')
                                                            <small style="color:red">{{$message}}</small>
                                                        @enderror
                                                                <input type="text" name="trinh_do"
                                                                    class="form-control m-input" placeholder="" value="{{$giao_vien->trinh_do}}">
                                                            </div>
                                                        </div>
                                                    </div>

													</div>
                                              
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
											
													<div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Chuyên môn:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="input-group">
                                                            @error('chuyen_mon')
                                                            <small style="color:red">{{$message}}</small>
                                                                  @enderror
                                                                <input type="text" name="chuyen_mon"
                                                                    class="form-control m-input" placeholder="" value="{{$giao_vien->chuyen_mon}}">
                                                            </div>
                                                        </div>
                                                    </div>
													 <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Nơi đào tạo:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="input-group">
                                                                    @error('noi_dao_tao')
                                                                    <small style="color:red">{{$message}}</small>
                                                                        @enderror
                                                                 <input type="text" name="noi_dao_tao"
                                                                    class="form-control m-input" placeholder="" value="{{$giao_vien->noi_dao_tao}}">
                                                            </div>
                                                        </div>
													 </div>

                                                     <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Năm tốt nghiệp:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <div class="input-group">
                                                            @error('nam_tot_nghiep')
                                                            <small style="color:red">{{$message}}</small>
                                                                  @enderror
                                                                <input type="text" name="nam_tot_nghiep"
                                                                    class="form-control m-input" placeholder="" value="{{$giao_vien->nam_tot_nghiep}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            </div> 
													 <div class="col-xl-6">
                                                      <div class="m-form__section m-form__section--first">
                                                       </div>
													<div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span> Ảnh:</label>
                                                                <img onClick="showModal()"
                                                        src= "{{  $giao_vien->anh ? asset('upload/' . $giao_vien->anh) : 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png'}}"
                                                        class="rounded mx-auto d-block mb-2" width="40%"
                                                       id="show_img">
                                                                <p>Click vào ảnh để lựa chọn ảnh khác!</p>

                                                    <div class="col-xl-9 col-lg-9 mt-4">
                                                        <div class="input-group ml-5 ">

                                                            <div class="custom-file ml-5 col-12">
                                                            @error('anh')
															<small style="color:red">{{$message}}</small>
															@enderror
                                                                <input type="file"  name="anh"
                                                                id="anh_gv" onClick="showModal()"onchange="showimages(this)"
                                                                    style="display:none" />
                                                                {{-- <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"> --}}

                                                            </div>
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
                                                                class="text-danger"></span>Tỉnh/Thành phố</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                       
                                                        <select class="form-control select2"
                                                            name="ho_khau_thuong_tru_matp" id="ho_khau_thuong_tru_matp">
                                                            <option value="">Chọn</option>
                                                            @foreach ($thanh_pho as $item)
                                                            <option {{($giao_vien->ho_khau_thuong_tru_matp == $item->matp) ? "selected" : ""}}
                                                             value="{{$item->matp}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Quận/Huyện</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="ho_khau_thuong_tru_maqh" id="ho_khau_thuong_tru_maqh">
                                                            <option value="">Chọn</option>
                                                            @foreach ($maqh_gv_hktt as $item)
                                                            <option {{($giao_vien->ho_khau_thuong_tru_maqh == $item->maqh) ? "selected" : "1"}}
                                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Phường/Xã/Thị trấn:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        
                                                        <select class="form-control select2"
                                                            name="ho_khau_thuong_tru_xaid" id="ho_khau_thuong_tru_xaid">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($xaid_gv_hktt as $item)
                                                            <option {{($giao_vien->ho_khau_thuong_tru_xaid == $item->xaid) ? "selected" : ""}}
                                                            value="{{$item->xaid}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Số nhà, đường </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        @error('so_nha')
															<small style="color:red">{{$message}}</small>
															@enderror
                                                            <input type="text" name="ho_khau_thuong_tru_so_nha"
                                                                class="form-control m-input" placeholder="" value="{{$giao_vien->ho_khau_thuong_tru_so_nha}}">

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
                                                                class="text-danger"></span>Tỉnh/Thành phố</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2" name="noi_o_hien_tai_matp"
                                                            id="noi_o_hien_tai_matp">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($thanh_pho as $item)
                                                            <option {{($giao_vien->noi_o_hien_tai_matp == $item->matp) ? "selected" : ""}}
                                                                value="{{$item->matp}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Quận/Huyện</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="noi_o_hien_tai_maqh" id="noi_o_hien_tai_maqh">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($maqh_gv_noht as $item)
                                                            <option {{($giao_vien->noi_o_hien_tai_maqh == $item->maqh) ? "selected" : ""}}
                                                            value="{{$item->maqh}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Phường/Xã/Thị trấn:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        <select class="form-control select2"
                                                            name="noi_o_hien_tai_xaid" id="noi_o_hien_tai_xaid">
                                                            <option value="" selected>Chọn</option>
                                                            @foreach ($xaid_gv_noht as $item)
                                                            <option {{($giao_vien->noi_o_hien_tai_xaid == $item->xaid) ? "selected" : ""}}
                                                            value="{{$item->xaid}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label"><span
                                                                class="text-danger"></span>Số nhà, đường </label>
                                                        <div class="col-xl-9 col-lg-9">
                                                        @error('so_nha')
															<small style="color:red">{{$message}}</small>
															@enderror
                                                            <input type="text" name="noi_o_hien_tai_so_nha"
                                                                class="form-control m-input" placeholder="" value="{{$giao_vien->noi_o_hien_tai_so_nha}}">

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                            </div>
                                      	  </div>
                              	      </div>					
									</div>
								</div>
								<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2">
															</div>
															<div class="col-7">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Cập nhật</button>&nbsp;&nbsp;
																<a href="{{route('account.ds-gv')}}">Quay lại</a>
															</div>
														</div>
													</div>
												</div>
                                            @endauth
                                            </form>
                                        </div> 
                                    </div>
                            </div>
										<div class="tab-pane " id="m_user_profile_tab_2">
										</div>
										<div class="tab-pane " id="m_user_profile_tab_3">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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

var url_get_maqh_by_matp = "{{route('get_quan_huyen_theo_thanh_pho')}}";
var url_get_xaid_by_maqh = "{{route('get_xa_phuong_theo_thi_tran')}}";
</script>
<script src="{!! asset('js/get_quan_huyen_xa.js') !!}"></script>
@endsection