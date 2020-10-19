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
														Update Profile
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
														Messages
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
														Settings
													</a>
												</li>
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
											<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('update-giao-vien', ['id' =>$giao_vien->id])}}" >
												@csrf
												<div class="m-portlet__body">
													<div class="form-group m-form__group m--margin-top-10 m--hide">
														<div class="alert m-alert m-alert--default" role="alert">
															
														</div>
														@auth
													</div>
													<?php 
															$message = Session::get('message');
															if ($message) {
																echo '<div class="alert alert-success">'. $message .'</div>';
																Session::put('message', null);
															}
														?>
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">Thông tin cá nhân</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input"  class="col-2 col-form-label">Mã giáo viên</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" name="ma_gv"  disabled  value="{{$giao_vien->ma_gv}}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input"  class="col-2 col-form-label">Họ tên</label>
														<div class="col-7">
														@error('ten')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="ten"  value="{{$giao_vien->ten}}">
														</div>
													</div>
												
													</div>
													<div class="form-group m-form__group row" >
														<label for="example-text-input" class="col-2 col-form-label" >Số điện thoại</label>
														<div class="col-7">
														@error('dien_thoai ')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input " type="text" name="dien_thoai"  value="{{$giao_vien->dien_thoai }}">
														</div>
													</div>
													

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Ngày sinh </label>
														<div class="col-7">
														@error('ngay_sinh')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="date" name="ngay_sinh" value="{{$giao_vien->ngay_sinh }}">
														</div>
													</div>
													<div class="form-group m-form__group row" >
														<label for="example-text-input" class="col-2 col-form-label" name="">Số điện thoại</label>
														<div class="col-7">
														
															<input class="form-control m-input " type="text" name="dien_thoai"  value="{{$giao_vien->dien_thoai }}">
														</div>
													</div>

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Dân tộc </label>
														<div class="col-7">
														@error('dan_toc')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="dan_toc" value="{{$giao_vien->dan_toc }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Trình độ </label>
														<div class="col-7">
														@error('trinh_do')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="trinh_do" value="{{$giao_vien->trinh_do }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Chuyên môn</label>
														<div class="col-7">
														@error('chuyen_mon')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="chuyen_mon" value="{{$giao_vien->chuyen_mon }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Nơi đào tạo </label>
														<div class="col-7">
														@error('noi_dao_tao')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="noi_dao_tao" value="{{$giao_vien->noi_dao_tao}}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Năm tốt nghiệp</label>
														<div class="col-7">
														@error('nam_tot_nghiep')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="nam_tot_nghiep" value="{{$giao_vien->nam_tot_nghiep }}">
														</div>
													</div>

												
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2">
															</div>
															<div class="col-7">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom" id="btnresult">Update</button>&nbsp;&nbsp;
																<a href="{{route('account.ds-gv')}}">Quay lại</a>
															</div>
														</div>
													</div>
												</div>
												@endauth
											</form>
											
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