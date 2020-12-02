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
														Cập nhật tài khoản
													</a>
												</li>
												
											</ul>
										</div>
										
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
											<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('update-admin', ['id' =>$user->id])}}" >
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
														<label for="example-text-input"  class="col-2 col-form-label">Họ tên</label>
														<div class="col-7">
														@error('name')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="name"   value="{{$user->name }}">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input"  class="col-2 col-form-label">User Name</label>
														<div class="col-7">
														@error('username')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" type="text" name="username"   value="{{$user->username }}">
														</div>
													</div>
													<div class="form-group m-form__group row" >
														<label for="example-text-input" class="col-2 col-form-label" name="email">Email</label>
														<div class="col-7">
														@error('email')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input " type="text" name="email"  value="{{$user->email }}">
														</div>
													</div>
													

													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">Số điện thoại</label>
														<div class="col-7">
														@error('phone_number')
															<small style="color:red">{{$message}}</small>
															@enderror
															<input class="form-control m-input" onkeypress="return isNumber(event)" type="text" name="phone_number" value="{{$user->phone_number }}"> 
														</div>
													</div>
													<div class="form-group m-form__group row" >
														<label for="example-text-input" class="col-2 col-form-label" name="avatar">Ảnh đại diện</label>
														<div class="col-7">
														@error('avatar')
															<small style="color:red">{{$message}}</small>
															@enderror
													
															<input value="{{$user->avatar }}" class="form-control m-input "onchange="showimages(this)" type="file" name="avatar" id="avatar"  accept="image/png, image/jpeg,image/jpg,image/jpeg,image/gif" >
															<img src="{{  $user->avatar ? asset('upload/' . $user->avatar) : 'https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png' }}" alt="" width="50%"  id="show_img">
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
																<a href="{{route('account.index')}}">Quay lại</a>
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
function isNumber(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

     return true;
  }			

</script>

@endsection